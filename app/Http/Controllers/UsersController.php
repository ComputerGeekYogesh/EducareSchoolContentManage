<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\RoleUser;
use App\Models\User_role;
use App\Models\teacher;
use App\Models\Student;
use App\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public $successStatus = 200;
    public $ab = 200;

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => "failure", "code" => 422, "message" => 'Validation errors ', 'errors' => $validator->errors()->all()], 422);
        }
        $email_verified_at = User::where('email', '=', $request->email)->pluck('email_verified_at');

       if (is_null($email_verified_at))
         {
            return response()->json(["status" => "failure", "code" => 401, "message" => 'Must verify Email before login'], 401);
        }

        $user = User::where('email', '=', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $userTokens = $user->tokens;
                foreach ($userTokens as $hello) {
                    $hello->delete();
                }
                $token = $user->createToken('eduapp token')->accessToken;
                $success['token'] = $token;
                //$success['user'] = $user;
                return response()->json(["status" => "success", "code" => 200, "message" => 'User logged in successfully ', 'data' => $success], 200);
            } else {
                return response()->json(["status" => "failure", "code" => 401, "message" => 'User password wrong '], 401);
            }
        } else {
            return response()->json(["status" => "failure", "code" => 401, "message" => 'User not found '], 401);
        }

    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'role_id' => 'required|string',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => "failure", "code" => 201, "message" => 'Validation errors ', 'errors' => $validator->errors()->all()], 201);
        }
        $user = new User();
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->role_id = $request->role_id;
        $user->save();
       // User::create($request->getAttributes())->sendEmailVerificationNotification();

        if ($request->role_id == 2) {
            $user_role = new Student();
            $user_role->user_id = $user->id;
            $user_role->save();
        }

        if ($request->role_id == 3) {
            $user_role = new teacher();
            $user_role->user_id = $user->id;
            $user_role->email = $user->email;
            $user_role->save();
        }

        $token = $user->createToken('eduapp token')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        return response()->json(["status" => "success", "code" => 200, "message" => 'User registered successfully ', 'data' => $success], 200);

    }

    public function logout(Request $request)
    {
        $token = $request->user()->token();
        $token->delete();
        return response()->json(["status" => "success", "code" => 200, "message" => 'You have been successfully logged out!'], 200);
    }

    public function changepassword(Request $request)
    {
        $input = $request->all();
        $userid = Auth::guard('api')->user()->id;
        $rules = array(
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password',
        );
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            $arr = array("status" => 400, "message" => $validator->errors()->first(), "data" => array());
        } else {
            try {
                if ((Hash::check(request('current_password'), Auth::user()->password)) == false) {
                    $arr = array("status" => 400, "message" => "Check your current password.", "data" => array());
                } else if ((Hash::check(request('new_password'), Auth::user()->password)) == true) {
                    $arr = array("status" => 400, "message" => "Please enter a password which is not similar to current password.", "data" => array());
                } else {
                    User::where('id', $userid)->update(['password' => Hash::make($input['new_password'])]);
                    $arr = array("status" => 200, "message" => "Password updated successfully.", "data" => array());
                }
            } catch (\Exception $ex) {
                if (isset($ex->errorInfo[2])) {
                    $msg = $ex->errorInfo[2];
                } else {
                    $msg = $ex->getMessage();
                }
                $arr = array("status" => 400, "message" => $msg, "data" => array());
            }
        }
        return response()->json($arr);
    }




}
