<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;


use Hash;
use DB;
use App\User;
use App\Device;
use App\Notifications\SMSNotification;

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
                'message' =>'Phone Number or Email has already been used',
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

        $device = new Device();
        $device->devicetoken = $request->devicetoken;
        $device->user_id = $user->id;
        $device->platform = $request->platform;
        $device->devicename = $request->devicename;
        $device->save();
 
        return response()->json([
            'success' => true,
            'data' => $user
        ], 200);
    }


    public function login(Request $request)
    {
        // return $request->phoneno;
        $input = $request->only('phoneno', 'password');
        $jwt_token = null;

        
 
        if (!$jwt_token = auth('api')->attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Phone No or Password',
            ], 401);
        }
        $user = User::where('phoneno',$request->phoneno)->first();

        $dev = Device::where('devicetoken', $request->devicetoken)->first();
        if($dev ==null){
            $device = new Device();
            $device->devicetoken = $request->devicetoken;
            $device->user_id = $user->id;
            $device->platform = $request->platform;
            $device->devicename = $request->devicename;
            $device->save();
        }
       

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
            auth('api')->invalidate($request->token);
 
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
 
        $user = auth('api')->authenticate($request->token);
 
        return response()->json(['user' => $user]);
    }

    public function forgotPassword(Request $r){
      $user = User::where('phoneno', $r->phoneno)->first();
      if($user ==null){
            return response()->json([
                'status' =>'error',
                'message' => 'User with phone no '.$r->phoneno.' does not exist'
            ]);
      }else{

        $code = mt_rand(1000,9999); 
        //Create Password Reset Token
            DB::table('password_resets')->insert([
                'email' => $r->phoneno,
                'token' => $code,
                'created_at' => date('Y-m-d H:i:s')
            ]);
         //send sms
        //  $phoneno = substr($r->phoneno, -9);
        //  $message ='Hello, Use the code '.$code.' to reset password';
        //  $user->notify(new SMSNotification($user,'233'.$phoneno, $message));
        return response()->json([
            'status' =>'success',
            'phoneno' => $r->phoneno,
            'message' => 'Password Reset Code Sent to your phone. Use the code to reset password'
        ]);
        }
    }

    public function resetPassword(Request $r){
        $user = User::where('phoneno', $r->phoneno)->first();

        $record = DB::table('password_resets')->where('email', $r->phoneno)->where('token', $r->code)->first();
        if($record ==null){
              return response()->json([
                  'status' =>'error',
                  'message' => 'Oops unable to reset password'
              ]);
        }else{
            $user->password = Hash::make($r->password);
            $user->save();
            return response()->json([
                'status' => 'success',
                'message' =>'Password reset successful.'
            ]);
           
        }
      }
}
