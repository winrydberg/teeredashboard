<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;


use Hash;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phoneno' => 'required|unique:users',
            'email' => 'unique:users',
            'firstname' =>'required',
            'lastname' =>'required',
            'password' =>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' =>'Password or Email has already been used',
                'data' => null,
            ], 200);
        }
        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phoneno = $request->phoneno;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
 
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }


    public function login(Request $request)
    {
        $input = $request->only('phoneno', 'password');
        $jwt_token = null;
 
        if (!$jwt_token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Phone No or Password',
            ], 401);
        }
        $user = User::where('phoneno',$request->phoneno)->first();
        return response()->json([
            'success' => true,
            'user' =>$user,
            'token' => $jwt_token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        try {
            JWTAuth::invalidate($request->token);
 
            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function getAuthUser(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);
 
        $user = JWTAuth::authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }
}
