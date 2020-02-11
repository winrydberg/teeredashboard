<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use DB;
use Session;
use Hash;

use App\Admin;
use App\Applicant;
use App\User;

class AdminController extends Controller
{
    public function dashboard(){
        $approvedCount = Applicant::where('approved', true)->count();
        $unapprovedCount = Applicant::where('approved', false)->count();
        return view('admin.dashboard', compact('approvedCount','unapprovedCount'));
    }

    public function approvedApllications(){
        $applicants = Applicant::where('approved', true)->get();
        return view('admin.approved', compact('applicants'));
    }

    public function newAdmin(){
        return view('admin.newadmin');
    }

    public function saveAdmin(Request $r){
        $admin = new Admin();
        $admin->name = $r->name;
        $admin->email = $r->email;
        $admin->phoneno = $r->phoneno;
        $admin->password = Hash::make($r->password);
        $admin->role_id = $r->adminlevel;
        if($admin->save()){
            Session::flash('success', 'User account successfully created');
            return back();
        }else{
            Session::flash('error', 'Oops Something went wrong. Please try again');
            return back();
        }
    }

    public function getPassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 15; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return response()->json([
            'password'=> implode($pass)
        ]);//turn the array into a string
    }

    public function newapplications (){
        $applicants = Applicant::where('approved', false)->get();
        return view('admin.newapplication', compact('applicants'));
    }

    public function admins(){
        $admins = Admin::all();
        return view('admin.admins', compact('admins'));
    }
}
