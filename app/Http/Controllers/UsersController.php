<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public $successStatus = 200;

    public function login(Request $req)
    {
        //return $req;
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            return response()->json([
              'success' => true,
              'token' => $success,
              'user' => $user
          ]);
        } else {
          return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
        }
    }

    public function register(Request $request) 
    {    
          //$validator = $request->validate( [ 
          $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
            'password' => 'required', 
        ]);
    if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
       // return $user;
        $success['token'] =  $user->createToken('remember_token')->accessToken; 
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this-> successStatus); 
   }

    public function logout(Request $request)
    {
     
     $request->user()->token()->revoke();
     return response()->json([
          'message' => 'Logout successfully'
      ]);
    }
  
     
     
     
}


