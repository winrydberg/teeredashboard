<?php

namespace App\Http\Controllers\Admin;

use App\Applicant;
use App\District;
use App\Http\Controllers\Controller;
use App\Monitor;
use App\Region;
use Auth;
use Illuminate\Http\Request;
use Session;

class MonitoringOfficerController extends Controller
{
    //
    public function myMonitorings()
    {
        $monitorings = Monitor::where('admin1', Auth::guard('admin')->user()->id)
            ->orWhere('admin2', Auth::guard('admin')->user()->id)
            ->orWhere('admin3', Auth::guard('admin')->user()->id)
            ->get();
        return view('admin.mymonitorings', compact('monitorings'));
    }

    public function disbursedApplicants()
    {
        $district = District::where('id', Auth::guard('admin')->user()->district_id)->first();
        $applicants = Applicant::where('fundreleased', true)->where('district', $district->name)->get();
        return view('admin.disbursedapplicants', compact('applicants'));
    }

    public function newMonitoring($id)
    {
        $applicant = Applicant::find($id);
        $monitors = Monitor::where('applicant_id', $id)->count();
        // $regions = Region::all();
        if ($applicant == null) {
            Session::flash('error', 'Applicant Not Found');
            return back();
        }
        return view('admin.monitor', compact('applicant','monitors'));
    }

    // public function saveMonitoringActivity(Request $r)
    // {
    //     $applicantid = $r->applicant_id;
    //     $authuser = Auth::guard('admin')->user();
    //     $district = District::find($authuser->district_id);

    //     $monitor = Monitor::where('applicant_id', $applicantid)->first();
    //     if ($monitor == null) {
    //         $newmon = new Monitor();
    //         $newmon->region = $district->region_id;
    //         $newmon->quarter = $r->quarter;
    //         $newmon->registered = date('Y-m-d');
    //         $newmon->district = $district->id;
    //         $newmon->applicant_id = $applicantid;
    //         $newmon->activity_type = 'NULL';
    //         $newmon->activity_undertaken = $r->activity;
    //         $newmon->save();
    //         return response()->json([
    //             'status' => 'success',
    //             'newmon' => $r->activity,
    //         ]);

    //     } else {

    //         $monitor->update([
    //             'activity_undertaken' => $r->activity,
    //             'region' => $district->region_id,
    //             'district' => $district->id,
    //             'quarter' => $r->quarter,
    //             'applicant_id' => $applicantid,
    //             'registered' => date('Y-m-d'),
    //             'activity_type' => 'NULL',
    //         ]);
    //         return response()->json([
    //             'status' => 'success',
    //             'newmon' => $r->activity,
    //         ]);
    //     }
    // }

    public function saveExpenditure(Request $r)
    {

        // return $r->all();
        $applicantid = $r->applicant_id;
        $authuser = Auth::guard('admin')->user();
        $district = District::find($authuser->district_id);
        $monitor = Monitor::where('applicant_id', $applicantid)->first();

        $expenditure = [];
        $items  = $r->item;
        $amountrequested  = $r->amountrequested;
        $amountspent  = $r->amountspent;
        $balance  = $r->balance;
        foreach($items as $key => $item){
             $array  = [
                 'item' => $item,
                 'amountrequested' => $amountrequested[$key],
                 'amountspent' => $amountspent[$key],
                 'balance' => $balance[$key]
             ];
             array_push($expenditure, $array);
        }
        
            $gain = $r->gain;

            $nogain = $r->nogain;


        
            $newmon = new Monitor();
            $newmon->activity_undertaken = $r->activities;
            $newmon->region = $district->region_id;
            $newmon->quarter = $r->quarter;
            $newmon->registered = date('Y-m-d');
            $newmon->district = $district->id;
            $newmon->applicant_id = $applicantid;
            $newmon->activity_type = 'NULL';
            $newmon->gains = $r->gain;
            $newmon->nogain_reasons = $r->nogain;
            $newmon->made_gains = $r->hasgain;
            $newmon->expenditure = json_encode($expenditure);
            $newmon->admin1 = $authuser->id;
            $newmon->additional_info = $r->addiontalinfo;
            $newmon->recommendations = $r->recommendations;
            $newmon->save();
            return response()->json([
                'status' => 'success',
                'newmon' => $newmon,
            ]);
       
    }


    public function monitoringInfo($id){
        //   $appid = substr($id, -1);
          $appid = explode('00', $id);
          $monitor = Monitor::find($appid[1]);
        //   dd($monitor);
          $applicant = Applicant::where('id', $monitor->applicant_id)->first();
          return view('admin.monitoringinfo', compact('applicant','monitor'));
    }

    public function allMontorings(){
        $start  = request()->query('start');
        $end  = request()->query('end');

        $authuser = Auth::guard('admin')->user();
        if($authuser->hasRole('Super Admin')){
            if($start != null && $end != null){
                $monitorings = Monitor::whereBetween('created_at', [$start, $end])->get();
                return view('admin.allmonitorings', compact('monitorings'));
            }else{
            
                $monitorings = [];
                return view('admin.allmonitorings', compact('monitorings'));
            }
        }else{
            if($start != null && $end != null){
                $monitorings = Monitor::whereBetween('created_at', [$start, $end])->where('district', Auth::guard('admin')->user()->district_id)->get();
                return view('admin.allmonitorings', compact('monitorings'));
            }else{
            
                $monitorings = [];
                return view('admin.allmonitorings', compact('monitorings'));
            }
        }
    }
}
