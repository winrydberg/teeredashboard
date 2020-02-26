<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;


use App\Monitor;
use App\District;
use App\Applicant;

class MonitoringOfficerController extends Controller
{
    //
    public function myMonitorings(){
        $monitorings = Monitor::where('admin1', Auth::guard('admin')->user()->id)
                        ->orWhere('admin2',Auth::guard('admin')->user()->id)
                        ->orWhere('admin3', Auth::guard('admin')->user()->id)
                        ->get();
        return view('admin.mymonitorings', compact('monitorings'));
    }


    public function disbursedApplicants(){
         $district = District::where('id', Auth::guard('admin')->user()->district_id)->first();
         $applicants = Applicant::where('fundreleased', true)->where('district', $district->name)->get();
         return view('admin.disbursedapplicants', compact('applicants'));
    }
}
