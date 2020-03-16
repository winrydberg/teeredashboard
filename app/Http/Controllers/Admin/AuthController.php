<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

use Auth;
use Session;
use DB;
use Hash;
use Mail;
use App\Mail\AdminPasswordResetMail;
use App\Admin;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $r)
    {
        $credentials = $r->only('email', 'password');
        // return $credentials;
        // dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {

            //  Auth::guard('admin')->user()->assignRole('Super Admin');
            Session::flash('portal', 'WELCOME TO DISABILITY FUND MANAGEMENT PORTAL');
            // return $credentials;
             return redirect()->intended('/dashboard');
        }else{
            Session::flash('error', 'Invalid Login Credentials');
            return back();
        }
    }

    public function forgotPassword(){
        return view('admin.resetpassword');
    }

    public function resetPassword(Request $r){
       $admin = Admin::where('email',$r->email)->first();
       if($admin != null){
        $id = DB::table('admin_password_reset')->insertGetId([
            'email' => $r->email,
            'token' => $this->generateRandomString(),
            'admin_id' => $admin->id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $record = DB::table('admin_password_reset')->where('id', $id)->first();
        Mail::to($admin->email)->send(new AdminPasswordResetMail($admin, $record ));
        if(count(Mail::failures()) > 0 ) {
            Session::flash('error','Oops Something went wrong. Please try again');
            return back();
        }else{
            Session::flash('success','A password reset link was sent. Login to your email to reset password');
            return back();
        }
    
       }else{
           Session::flash('error','User Account Not Found');
           return back();
       }
    }

    public function newPasswordFormd($id, $token){
        $record = DB::table('admin_password_reset')->where('token', $token)->where('admin_id',$id)->first();
        if($record == null){
            return view('admin.notpermitted');
        }else{
            return view('admin.newpassword', compact('token','id'));
        }
    }

   public function saveNewPassword(Request $r){
        $validator = Validator::make($r->all(), [
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' =>'error',
                'message'=> $validator->errors()->first()
            ]);
        }
        $admin = Admin::where('id', $r->id)->first();
        if($admin != null){
            $admin->password = Hash::make($r->newpassword);
            $admin->save();
            return response()->json([
                'status' =>'success',
                'message' => 'Password has been successfully reset'
            ]);
        }else{
            return response()->json([
                'status' =>'error',
                'message' => 'Unable to reset password. Admin User not found'
            ]);
        }
    }


    public function generateRandomString($length = 60) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('/login');
    }

    public function changePassword(Request $r){
        $validator = Validator::make($r->all(), [
            
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        if($validator->fails()){
            return response()->json([
                'status' =>'error',
                'message'=> $validator->errors()->first()
            ]);
        }
        $authuser = Auth::guard('admin')->user();


        // return $authuser;
        if($authuser != null){
            $isMatched = Hash::check($r->oldpassword, $authuser->password);
            if($isMatched == true){
                $authuser->password = Hash::make($r->newpassword);
                $authuser->save();
                return response()->json([
                    'status' =>'success',
                    'message' => 'Password Changed Successfully'
                ]);
            }else{
                return response()->json([
                    'status' =>'error',
                    'message' => 'Unable to change password. Wrong Old Password Provided'
                ]);
            }
        }else{
            return response()->json([
                'status' =>'notloggedin',
                'message' => 'Session Expired'
            ]);
        }
        return  $r->all();
    }
}
