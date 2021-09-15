<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Validator;


class ResetPasswordAPIController extends Controller
{
    use SendsPasswordResetEmails;
	public function forgot (Request $request)
	{
        $validator = Validator::make($request->only('email'), [
            'email' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "failure", "code" => 400, "message" => 'Email Address required', 'errors' => $validator->errors()->all()], 422);
        }
        else
        {
            $response = $this->broker()->sendResetLink($request->only('email'));

            return $response == Password::RESET_LINK_SENT
                ? response()->json(['message' => 'Reset Password Link Sent', 'status' => true], 201)
                : response()->json(['message' => 'Invalid Email Address', 'status' => false], 401);
        }

	}


    public function reset() {
        $credentials = request()->validate([
            'email' => 'required|email',
            'token' => 'required|string',
            'password' => 'required|string'
        ]);

        $reset_password_status = Password::reset($credentials, function ($user, $password) {
            $user->password = Hash::make($password);
            $user->save();
        });

        if ($reset_password_status == Password::INVALID_TOKEN) {
            return response()->json(["message" => "Invalid token"], 400);
        }

        return response()->json(["message" => "Password has been successfully changed"]);
    }

    }



