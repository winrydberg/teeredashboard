<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Auth;
use File;
use DB;
use Session;
use Hash;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;

use App\Admin;
use App\Applicant;
use App\District;
use App\User;
use App\Region;

class AdminController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }
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
        $districts = District::all();
        $roles= Role::all();
        return view('admin.newadmin', compact('districts', 'roles'));
    }

    public function saveAdmin(Request $r){
        $admin = new Admin();
        $admin->name = $r->name;
        $admin->email = $r->email;
        $admin->phoneno = $r->phoneno;
        $admin->password = Hash::make($r->password);
        $admin->level = $r->adminlevel;
        $admin->district_id = $r->district;

      

        switch($r->adminlevel){
            case 1:
            $admin->assignRole('Super Admin');
            break;
            case 2:
            $admin->assignRole('Finance Officer');
            break;
            case 3:
            $admin->assignRole('Monitoring Officer');
            break;
            case 4:
            $admin->assignRole('Secretary');
            break;
            case 5:
            $admin->assignRole('Approval Officer');
            break;

        }
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
            'password'=> 'password'
        ]);
        //  response()->json([
        //     'password'=> implode($pass)
        // ]);/return/turn the array into a string
    }

    public function newapplications (){
        $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
        $applicants = Applicant::where('approved', false)->where('district', $district->name)->get();
        return view('admin.newapplication', compact('applicants'));
    }

    public function admins(){
        $admins = Admin::all();
        $roles= Role::all();
        return view('admin.admins', compact('admins','roles'));
    }

    public function getDetails($id){
         $appid = substr($id, -1);
         if($appid != null){
                $applicant = Applicant::find($appid);
                return view('admin.applicantdetails', compact('applicant'));
         }else{
             return back();
         }
    }

    public function sendSMS(){
        return view('admin.sendsms');
    }

    public function newApplicant(){
        $regions = Region::with('districts')->get();
        // dd($regions);
        return view('admin.newapplicant');
    }

    public function saveNewApplicant(Request $r){
        //  return $r->all();
        if($r->hasFile('passport')){
            $extension = ucwords(File::extension($r->file('passport')->getClientOriginalName()));
            $fileName = $r->file('passport')->getClientOriginalName();
            if ($extension == "JPG" || $extension == "PNG"|| $extension == "JPEG"|| $extension == "GIF") {
                $r->file('passport')->move(public_path() . "/uploads/",$fileName);
                $applicant = new Applicant();
                $applicant->firstname = $r->firstname;
                $applicant->lastname = $r->lastname;
                $applicant->phoneno = $r->phoneno;
                $applicant->image = $fileName;
                $applicant->gender = $r->gender;
                $applicant->marital_status = $r->marital_status;
                $applicant->idtype = $r->idtype;
                $applicant->idnumber = $r->idnumber;
                $applicant->dob = date('Y-m-d',strtotime($r->dob));
                $applicant->gfdmember = $r->gfdmember;
                $applicant->disabilitytype = json_encode($this->returnDisabilityTypeArray($r->vision, $r->hearing, $r->physic,$r->mental,$r->albinos));
                $applicant->community = $r->communityname;
                $applicant->postal_address = $r->postaladdress;
                $applicant->houseno = $r->houseno;
                $applicant->streetname = $r->streenname;
                $applicant->business_location = $r->business_location;
                $applicant->education = $r->education;
                $applicant->occupation = $r->occupation;
                $applicant->yearsinobusines = $r->yearsinobusines;
                $applicant->dependants = $r->dependants;
                $applicant->objective = json_encode($this->returnFundReasonArray($r->income, $r->educational,$r->organization, $r->medical, $r->skillsdev));
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
                        'status'=>'success',
                        'message' => 'Applicantion Successfully Sent'
                    ]); 
                }else{
                    return response()->json([
                        'status'=>'error',
                        'message' => 'OOps Something went wrong. Please try again'
                    ]); 
                }
        
                   
            }else{
                return response()->json([
                    'status'=>'error',
                    'message' => 'Invalid Image File'
                ]);
            }
        }else{
            return response()->json([
                'status'=>'error',
                'message' => 'Oops Please Select Passport Photo'
            ]);
        }
          
    }
    public function returnFundReasonArray($income, $educational, $organization, $medical, $skillsdev){
            $reason =[];
            if($income =='on'){
                array_push($reason, "Income Generation");
            }
            if($educational =='on'){
                array_push($reason, "Educational Support");
            }
            if($organization =='on'){
                array_push($reason, "Organizational development");
            }
            if($medical =='on'){
                array_push($reason, "Medical/Assistive devices");
            }
            if($skillsdev =='on'){
                array_push($reason, "Skills training/apprenticeship");
            }
            return $reason;
    }

    public function returnDisabilityTypeArray($vision, $hearing, $physic, $mental, $albinos){
        $disabilitytype =[];
            if($vision =='on'){
                array_push($disabilitytype, "Visually Impaired");
            }
            if($hearing =='on'){
                array_push($disabilitytype, "Hearing Impaired");
            }
            if($physic =='on'){
                array_push($disabilitytype, "Physically Disabled");
            }
            if($mental =='on'){
                array_push($disabilitytype, "Mental/Intellectual");
            }
            if($albinos =='on'){
                array_push($disabilitytype, "Albino");
            }
            return $disabilitytype;
    }

    public function downloadApplicantPDF($id){
        $applicant = Applicant::where('id', $id)->first();
        return view('pdfs.applicants', compact('applicant'));
       
        $pdf = PDF::loadView('pdfs.applicants', compact('applicant'));
        return $pdf->stream();
        return $pdf->download('applicant.pdf');
    }
}
