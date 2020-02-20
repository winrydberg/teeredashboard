<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Auth;
use Session;
use DB;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function authenticate(Request $r)
    {
        $credentials = $r->only('email', 'password');
        // dd($credentials);
        if (Auth::guard('admin')->attempt($credentials)) {
            //  Auth::guard('admin')->user()->assignRole('Super Admin');
             return redirect()->intended('/dashboard');
        }else{
            Session::flash('error', 'Invalid Login Credentials');
            return back();
        }
    }



    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->to('/login');
    }
}
