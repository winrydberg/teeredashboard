<?php

namespace App\Http\Controllers\API;

use App\Applicant;
use App\District;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;
use Illuminate\Support\Facades\Validator;

use File;
use Faker\Provider\Image;


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

    

    //    return $dob;



        $applicant = new Applicant();
        $applicant->firstname = $r->firstname;
        $applicant->lastname = $r->lastname;
        $applicant->phoneno = $r->phoneno;
        $applicant->image = $png_url;
        $applicant->gender = $r->gender;
        $applicant->marital_status = $r->marital_status;
        $applicant->idtype = $r->idtype;
        $applicant->idnumber = $r->idnumber;
        $applicant->dob = date('Y-m-d',$timestamp);
        $applicant->gfdmember = $r->gfdmember;
        $applicant->disabilitytype = $r->disabilitytype;
        $applicant->community = $r->communityname;
        $applicant->postal_address = $r->postaladdress;
        $applicant->houseno = $r->houseno;
        $applicant->streetname = $r->streenname;
        $applicant->business_location = $r->business_location;
        $applicant->education = $r->education;
        $applicant->occupation = $r->occupation;
        $applicant->yearsinobusines = $r->yearsinobusines;
        $applicant->dependants = $r->dependants;
        $applicant->objective = json_encode($r->objective);
        $applicant->intentoffund = $r->fundintents;
        $applicant->total_amount = $r->totalamount;
        $applicant->groupapplication = $r->groupapplication;
        $applicant->breakdown = $r->budgets;
        $applicant->info_approval = $r->info_approval;
        $applicant->region = $r->region;
        $applicant->district = $r->district;
        $applicant->approved = false;

        if($applicant->save()){
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
                'message' =>"Noooooooo Application Successfully sent",
            ]);
        }
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
}
