<?php

namespace App\Http\Controllers\API;

use App\Applicant;
use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Support\Facades\Validator;

use File;
use Auth;

use Faker\Provider\Image;
use App\Notifications\SMSNotification;
use App\MyPushNotification;


class ApplicationController extends Controller
{
    public function apply(Request $r)
    {

        // $validator = Validator::make($r->all(), [
        //     'firstname' => 'required',
        //     'lastname' => 'required',
        //     'phoneno' =>'required',
        //     'gender' =>'required',
        //     'marital_status' => 'required',
        //     'idtype' =>'required',
        //     'idnumber' =>'required',
        //     'gfdmember' =>'required',
        //     'disabilitytype' =>'required',
        //     'community' =>'required',
        //     'postal_address' =>'required',
        //     'houseno' =>'required',
        //     'streetname' =>'required',
        //     'business_location' =>'required',
        //     'education' =>'required',
        //     'occupation' =>'required',
        //     'yearsinoccupation' =>'required',
        //     'dependents' =>'required',
        //     'objective' =>'required',
        //     'intentoffund' =>'required',
        //     'total_amount' =>'required',
        //     'breakdown' =>'required',
        //     'info_approval' =>'required',
        //     'photo' => 'required'
        // ]);

        $png_url = "perfil-".time().".jpg";
        $path = public_path() . "/uploads/" . $png_url;
        $img = $r->photo;
        $img = substr($img, strpos($img, ",")+1);
        $data = base64_decode($img);
        $success = file_put_contents($path, $data);

        //date formatting
        $rawdate = explode(" ", $r->dob)[0];
        $timestamp = strtotime(str_replace('-', '/', $rawdate));
        $dob = date('Y-m-d',$timestamp);

    
        $currentUser = auth('api')->user();
    //    return $dob;




        $applicant = new Applicant();
        $applicant->firstname = $r->firstname;
        $applicant->lastname = $r->lastname;
        $applicant->phoneno = $r->phoneno;
        $applicant->image = $png_url;
        $applicant->gender = $r->gender;
        $applicant->marital_status = $r->maritalstatus;
        $applicant->idtype = $r->idtype;
        $applicant->idnumber = $r->idnumber;
        $applicant->dob = date('Y-m-d',$timestamp);
        $applicant->gfdmember = $r->gfdmember;
        $applicant->disabilitytype = json_encode($this->returndisabilitytypeArray($r->disabilitytype));
        $applicant->community = $r->communityname;
        $applicant->postal_address = $r->postaladdress;
        $applicant->houseno = $r->houseno;
        $applicant->streetname = $r->streenname;
        $applicant->business_location = $r->business_location;
        $applicant->education = $r->education;
        $applicant->occupation = $r->occupation;
        $applicant->yearsinobusines = $r->yearsinbusiness;
        $applicant->dependants = $r->dependants;
        $applicant->objective = json_encode($this->returnReasonForFundArray($r->objective));
        $applicant->intentoffund = $r->fundintents;
        $applicant->total_amount = $r->totalamount;
        $applicant->groupapplication = $r->groupapplication;
        $applicant->breakdown = json_encode($r->budgets);
        $applicant->info_approval = $r->info_approval;
        $applicant->region = $r->region;
        $applicant->district = $r->district;
        $applicant->approved = false;


        $applicant->user_id = $currentUser->id;

        if($applicant->save()){
            // $phoneno = substr($r->phoneno, -9);
            // $message ='Hello '.$applicant->firstname.', Your application has been received. Pending approval from management. You will be notified once its approved';
            // $applicant->notify(new SMSNotification($applicant,'233'.$phoneno, $message));
            return response()->json([
                'success' => true,
                'message' =>"Application Successfully sent",
                 'path' => $success,
                 'bas4' => $r->photo,
                 'path' => $png_url
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' =>"Oops Something went wrong. Please try again",
            ]);
        }
    }

    public function returndisabilitytypeArray($array)
    {
        $reason = [];
        foreach($array as $r){
            array_push($reason, $r);
        }
       
        return $reason;
    }

    public function returnReasonForFundArray($array)
    {
        $reasona = [];
        foreach($array as $r){
            array_push($reasona, $r);
        }
        return $reasona;
    }


    


    public function regions(){
        $regions = Region::with('districts')->get();
        return response()->json([
            'regions' => $regions
        ]);
    }

    public function districts($regionid){
        $districts = District::where('region_id', $regionid)->get();
        return response()->json([
            'districts' => $districts
        ]);
    }

    public function myApplications(){
        $user = Auth::guard('api')->user();

        $applications = Applicant::where('user_id', $user->id)->get();
        return response()->json([
            'applications'=> $applications
        ]);
    }

    public function deleteApplication(Request $r){
          $authuser = auth('api')->user();
          $applicantion = Applicant::where('user_id', $authuser->id)->where('id', $r->applicant_id)->get();
          if($applicantion != null){
              $applicantion->delete();
              return response()->json([
                'status'=> 'success',
                'message' => 'Application has been successully deleted'
            ]);
          }else{
            return response()->json([
                'status'=> 'error',
                'message' => 'Ooops Something went wrong. Please try again'
            ]);
          }
    }

    public function totalApplication(){
        $authuser = auth('api')->user();
        $applicantionCount = Applicant::where('user_id', $authuser->id)->count();
        return response()->json([
            'totalapplication' => $applicantionCount.''
        ]);
    }

    public function getNotifications(){
        $authuser = auth('api')->user();
        $pushnotes = MyPushNotification::where('user_id', $authuser->id)->get();

        return response()->json([
            'pushnotifications'=>$pushnotes
        ]);
    }
}
