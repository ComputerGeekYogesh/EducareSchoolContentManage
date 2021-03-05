<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\User_role;
use App\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request)
    {
        //return $request;
        $validator = Validator::make($request->all(), [ 
          'email' => 'required|string', 
          'password' => 'required|string', 
      ]);
      if ($validator->fails())
      {
          return response()->json(["status"=>"failure","code"=> 422, "message"=>'Validation errors ','errors'=>$validator->errors()->all()],422);
      }
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
              $userTokens = $user->tokens;
              foreach($userTokens as $hello) {
                  $hello->delete();
              }
              $token = $user->createToken('eduapp token')->accessToken;
              $success['token'] = $token;
              $success['user'] = $user;
              return response()->json(["status"=>"success","code"=> 200, "message"=>'User logged in successfully ','success'=>$success],200);
            }
            else{
              return response()->json(["status"=>"failure","code"=> 401, "message"=>'User password wrong '],401);
            }
        }
        else{
          return response()->json(["status"=>"failure","code"=> 401, "message"=>'User not found '],401);
        }
    }

    public function register(Request $request) 
    {    
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'role_id' => 'required|string'
        ]);
        if ($validator->fails())
        {
            return response()->json(["status"=>"failure","code"=> 422, "message"=>'Validation errors ','errors'=>$validator->errors()->all()],422);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('password');
        $user->isban = 1;
        $user->save();

        $user_role = new User_role();
        $user_role->user_id = $user->id;
        $user_role->role_id = $request->role_id;
        $user_role->save();

        $token = $user->createToken('eduapp token')->accessToken;
        $success['token'] = $token;
        $success['user'] = $user;
        $success['default_password'] = 'password';
        return response()->json(["status"=>"success","code"=> 200, "message"=>'User registered successfully ','success'=>$success],200);
   }

    public function logout(Request $request)
    {
      $token = $request->user()->token();
      $token->delete();
      return response()->json(["status"=>"success","code"=> 200, "message"=>'You have been successfully logged out!'],200);
    }
  
     
     
     
}


