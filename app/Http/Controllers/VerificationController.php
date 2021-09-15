<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\VerificationMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class VerificationController extends Controller
{  // public $mail;
    public function sendverificationmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => "failure", "code" => 422, "message" => 'Validation errors', 'errors' => $validator->errors()->all()], 422);
        }
         $toemail = $request->email;
        // $this->mail = $toemail;
        $user = User::where('email', '=', $toemail)->first();
        if($user)
        {
            $verification_code = rand(100000,999999);
            $user->verification_code =  $verification_code;
            $user->save();
        }
        else
        {
            return response()->json(["status" => "failure", "code" => 401, "message" => 'Invalid Email Address'], 401);
        }

        Mail::to($toemail)->send(new VerificationMail($verification_code));

        return response()->json(["status" => "success", "code" => 200, "message" => 'Email with Six digit verification code sent successfully'], 200);

   }

    public function verifyverificationcode(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'verification_code' => 'required|string',
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => "failure", "code" => 422, "message" => 'Validation errors', 'errors' => $validator->errors()->all()], 422);
        }
        $verifyverificationcode = $request->verification_code;
        $user = User::where('verification_code', '=', $verifyverificationcode )->first();
        if($user)
        {
            return response()->json(["status" => "success", "code" => 200, "message" => 'Verification code matched successfully'], 200);
        }

        else{

            return response()->json(["status" => "failure", "code" => 401, "message" => 'Invalid verification code'], 401);
        }

       // DB::table('users')->where('verification_code', '=', $verifyverificationcode )->update(['verification_code' => 0]);

    }

    public function newpassword(Request $request)
    {
       // return $this->mail;
       $validator = Validator::make($request->all(), [
        'email' => 'required|string',  'new_password' => 'required|string',
    ]);
    if ($validator->fails()) {
        return response()->json(["status" => "failure", "code" => 422, "message" => 'Validation errors', 'errors' => $validator->errors()->all()], 422);
    }
        $mail = $request->email;
        $result = DB::table('users')->where('email','=',$mail)->update(['password' => bcrypt($request->new_password)]);

        if ($result)
        {
            return response()->json(["status" => "success", "code" => 200, "message" => 'Password updated successfully'], 200);
        }
        else
        {
            return response()->json(["status" => "failure", "code" => 401, "message" => 'Password not updated successfully'], 401);
        }

    }

}
