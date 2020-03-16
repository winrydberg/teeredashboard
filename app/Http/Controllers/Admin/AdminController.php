<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Applicant;
use App\ApprovedApplication;
use App\District;
use App\Http\Controllers\Controller;
use App\Region;
use App\User;
use App\Device;
use App\Disbursement;
use Auth;
// use PDF;
use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\PDF;
use File;
use Hash;
use Illuminate\Http\Request;
use Session;
use Spatie\Permission\Models\Role;
use App\Notifications\PushNotification;
use App\Notifications\ApplicationApproved;
use App\Notifications\SMSNotification;
use App\Jobs\ProcessSMS;
use App\MyPushNotification;

class AdminController extends Controller
{


    public function pushNotify($fcm_token, $message, $title, $id){
         
      //save notification to table
      $pushnotification = new MyPushNotification();
      $pushnotification->title = $title;
      $pushnotification->message = $message;
      $pushnotification->device_token = $fcm_token;
      $pushnotification->user_id = $id;
      $pushnotification->save();      
    
        
    //    $fcm_token ="fp8kEO5kELI:APA91bFIMOHh7kQ-3AQKneAa8JorHhyMHpV2PQuJWWSBGO8s5SZ8aiw7SOjHZSkMKXxSd_TDTrGLzr7YyL2uMVJxz2sYwTxbbr7ClzkZQIlB1-8SKVG7GLVoIAguh6IHY7Bdgzuyrbx7"; 
    //    $title ="Approved";
    //    $message ="Hello Edwin,Your application has been approved"; 
        // $id = null;
        $your_project_id_as_key="AAAAEpFVq6w:APA91bGWypLNzvQtWrsfzOuEEHmrVOqrQWhHsNfPm0oP-edBDo1-jHtxCGvTDFsOBQOqdOWLQSb9CGBr2i9DNhg1SeI6qjKwpVlglgfhvRDFAVkO--1QY8g6vd2-A0zVXxcRLilk6ZVI";
        $url = "https://fcm.googleapis.com/fcm/send";            
        $header = [
        'authorization: key=' . $your_project_id_as_key,
            'content-type: application/json'
        ];    

        $postdata = '{
            "to" : "' . $fcm_token . '",
                "notification" : {
                    "title":"' . $title . '",
                    "text" : "' . $message . '"
                },
            "data" : {
                "id" : "'.$id.'",
                "title":"' . $title . '",
                "description" : "' . $message . '",
                "text" : "' . $message . '",
                "is_read": 0
              }
        }';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

        $result = curl_exec($ch);    
        curl_close($ch);

        return $result;
    }
    // public function __construct(){
    //     $this->middleware('auth:admin');
    // }

    public function sms(){
        $applicant = Applicant::find(1);
        $phoneno = '233204052513';//substr($applicant->phoneno, -9);
        $message ='test message';
        $applicant->notify(new SMSNotification($applicant,''.$phoneno, $message));
    }


    public function dashboard()
    {
       
        $searchterm = request()->query('search');

        if ($searchterm != null) {
            $applicants = Applicant::where('firstname', 'LIKE', "%" . $searchterm . "%")->orWhere('lastname', 'LIKE', "%" . $searchterm . "%")->orWhere('phoneno', 'LIKE', "%" . $searchterm . "%")->get();
        }

         $authuser = Auth::guard('admin')->user();
         if($authuser->hasRole('Super Admin')){
            $approvedCount = Applicant::where('approved', true)->count();
            $unapprovedCount = Applicant::where('approved', false)->where('disapproved', false)->count();
         }else{
            $dist = District::where('id', $authuser->district_id)->first();
            $approvedCount = Applicant::where('approved', true)->where('district', $dist->name)->count();
            $unapprovedCount = Applicant::where('approved', false)->where('disapproved', false)->where('district', $dist->name)->count();
         }
        
        // $disapprovedCount = Applicant::where('disapproved', true)->count();

        $districts = District::all();

        $thedistricts = [];
        $thedistrictsApprouvedCount = [];
        $thedistrictsUnApprovedCount = [];

        foreach ($districts as $d) {
            array_push($thedistricts, $d->name);
            array_push($thedistrictsApprouvedCount, Applicant::where('approved', true)->where('district', $d->name)->count());
            array_push($thedistrictsUnApprovedCount, Applicant::where('approved', false)->where('district', $d->name)->count());
        }

        $admindistrict = District::where('id', Auth::guard('admin')->user()->district_id)->first();
        $pieApproved = Applicant::where('approved', true)->where('district', $admindistrict->name)->count();
        $pieUnApproved = Applicant::where('approved', false)->where('disapproved', false)->where('district', $admindistrict->name)->count();
        $pieDisApproved = Applicant::where('disapproved', true)->where('district', $admindistrict->name)->count();

        return view('admin.dashboard', compact('approvedCount', 'unapprovedCount',
            'applicants', 'thedistricts', 'thedistrictsApprouvedCount', 'thedistrictsUnApprovedCount',
            'pieApproved', 'pieUnApproved', 'pieDisApproved'));

    }

    public function searchApplicant()
    {

        $searchterm = request()->query('search');
        if ($searchterm != null) {
            $user = Auth::guard('admin')->user();
            if($user->hasRole(['Super Admin'])){
                $applicants = Applicant::where('firstname', 'LIKE', "%" . $searchterm . "%")->orWhere('lastname', 'LIKE', "%" . $searchterm . "%")->orWhere('phoneno', 'LIKE', "%" . $searchterm . "%")->get();
            }else{
                $district = District::where('id', $user->district_id)->first();
                $applicants = Applicant::where('district',$district->name)->where('firstname', 'LIKE', "%" . $searchterm . "%")->orWhere('lastname', 'LIKE', "%" . $searchterm . "%")->orWhere('phoneno', 'LIKE', "%" . $searchterm . "%")->paginate(15);
            }
           
        }
        return view('admin.search', compact('applicants'));
    }

    public function profile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile', compact('admin'));
    }

    public function approvedApllications()
    {
        $user = Auth::guard('admin')->user();
        if($user->hasRole(['Super Admin'])){
            $applicants = Applicant::where('approved', true)->where('fundreleased', false)->get();
        }else{
            $district = District::where('id', $user->district_id)->first();
            $applicants = Applicant::where('approved', true)->where('district', $district->name)->where('fundreleased', false)->get();
        }
        
        return view('admin.approved', compact('applicants'));
    }

    public function newAdmin()
    {
        $districts = District::all();
        $roles = Role::all();
        return view('admin.newadmin', compact('districts', 'roles'));
    }

    public function saveAdmin(Request $r)
    {

        $admin = new Admin();
        $admin->name = $r->name;
        $admin->email = $r->email;
        $admin->phoneno = $r->phoneno;
        $admin->password = Hash::make($r->password);
        $admin->level = $r->adminlevel;
        $admin->district_id = $r->district;

        $roles = $r->roles;
        $admin->adminroles = json_encode($roles);

        foreach ($roles as $r) {
            $admin->assignRole($r);
        }

        // switch($r->adminlevel){
        //     case 1:
        //     $admin->assignRole('Super Admin');
        //     break;
        //     case 2:
        //     $admin->assignRole('Finance Officer');
        //     break;
        //     case 3:
        //     $admin->assignRole('Monitoring Officer');
        //     break;
        //     case 4:
        //     $admin->assignRole('Secretary');
        //     break;
        //     case 5:
        //     $admin->assignRole('Approval Officer');
        //     break;
        // }
        if ($admin->save()) {
            Session::flash('success', 'User account successfully created');
            return back();
        } else {
            Session::flash('error', 'Oops Something went wrong. Please try again');
            return back();
        }
    }

    public function getPassword()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 15; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return response()->json([
            'password' => 'password',
        ]);
        //  response()->json([
        //     'password'=> implode($pass)
        // ]);/return/turn the array into a string
    }

    public function newapplications()
    {
        $authuser = Auth::guard('admin')->user();
        if($authuser->hasRole('Super Admin')){
            // $district = District::where('id', Auth::guard('admin')->user()->district_id)->first();
            $applicants = Applicant::where('approved', false)->orderBy('created_at','DESC')->get();
        }else{
            $district = District::where('id', Auth::guard('admin')->user()->district_id)->first();
            $applicants = Applicant::where('approved', false)->where('district', $district->name)->orderBy('created_at','DESC')->get();
        }
        
        return view('admin.newapplication', compact('applicants'));
    }

    public function admins()
    {
        $admins = Admin::where('district_id', Auth::guard('admin')->user()->district_id)->get();
        $roles = Role::all();
        return view('admin.admins', compact('admins', 'roles'));
    }

    public function getDetails($id)
    {
        // $appid = substr($id, -1);
        $appid = explode('00', $id);
        $hasApproved = ApprovedApplication::where('applicant_id', $appid)->where('admin_id', Auth::guard('admin')->user()->id)->first();

        if ($appid != null) {
            $applicant = Applicant::find($appid[1]);
            
            return view('admin.applicantdetails', compact('applicant', 'hasApproved'));
        } else {
            return back();
        }
    }
    public function newDistrict()
    {
        $regions = Region::all();
        return view('admin.newdistricts', compact('regions'));
    }

    public function sendSMS()
    {
        return view('admin.sendsms');
    }

    public function sendSMSNotification(Request $r){
           //pushNotify($fcm_token, $message, $title)
           if($r->receipients == null || $r->receipients==[]){
            switch($r->from){
                case 0:
                 $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                 $applicants = Applicant::where('approved', true)->where('district', $district->name)->distinct()->get();
                 
                 foreach($applicants as $a){
                    dispatch(new ProcessSMS($a, $r->message));
                    // ProcessSMS::dispatch($a, $r->message);
                 }
                 return response()->json([
                     'status' => 'success',
                     'message' => 'Push notifications sent'
                 ]);
                break;
                  
                case 1:
                 $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                 $applicants = Applicant::select('user_id')->where('approved', true)->where('district', $district->name)->distinct()->get();
             
                 return response()->json([
                     'status' => 'success',
                     'message' => 'Push notifications sent'
                 ]);
                break;
 
                case 2:
                 $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                 $applicants = Applicant::select('user_id')->where('fundreleased', true)->where('district', $district->name)->distinct()->get();
                
                 return response()->json([
                     'status' => 'success',
                     'message' => 'Push notifications sent'
                 ]);
                break;
 
                default:
                return response()->json([
                    'status' => 'error',
                    'message' => 'Sorry Couldn\'t catch that. Please try again'
                ]);
            }
         }else{
            
                 $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                 $applicants = Applicant::select('firstname', 'user_id')->whereIn('user_id', $r->receipients)->distinct()->get();
                 
                 return response()->json([
                     'status' => 'success',
                     'message' => 'Push notifications sent'
                 ]);
         }
     
    }

    public function newApplicant()
    {
        $regions = Region::with('districts')->get();
        // dd($regions);
        return view('admin.newapplicant');
    }
    public function saveDistrict(Request $r)
    {
        $district = new District();
        $district->name = $r->name;
        $district->region_id = $r->region;
        if ($district->save()) {
            Session::flash('success', 'District recorded on the system');
            return back();
        } else {
            Session::flash('error', 'Unable to add district. Please try again');
            return back();
        }
    }

    public function saveNewApplicant(Request $r)
    {
        //   return $r->all();

        if ($r->hasFile('passport')) {
            $user = null;
            $u = User::where('phoneno', $r->phoneno)->first();
            // return $u;
            if ($u != null) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'User With Phone Number Already Exist.',
                ]);
            }
            $user = User::create([
                'firstname' => $r->firstname,
                'lastname' => $r->lastname,
                'email' => $r->email,
                'password' => Hash::make($r->password),
                'phoneno' => $r->phoneno,
            ]);
            if ($user == null) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Oops Something Went Wrong. Please Contact Administrators',
                ]);
            }

            $extension = strtoupper(File::extension($r->file('passport')->getClientOriginalName()));
            $fileName = $r->file('passport')->getClientOriginalName();
            if ($extension == "JPG" || $extension == "PNG" || $extension == "JPEG" || $extension == "GIF") {
                $r->file('passport')->move(public_path() . "/uploads/", $fileName);
                $dist = District::find(Auth::guard('admin')->user()->district_id);
                $region = Region::find($dist->region_id);

                $allbudgets = [];
                $items = $r->item;
                $qty = $r->qty;
                $unitcost = $r->unitcost;
                $totalcost = $r->totalcost;
                foreach ($items as $key => $item) {
                    $array = [
                        'item' => $item,
                        'qty' => $qty[$key],
                        'unitcost' => $unitcost[$key],
                        'totalcost' => $totalcost[$key],
                    ];
                    array_push($allbudgets, $array);
                }

                $applicant = new Applicant();
                $applicant->firstname = $r->firstname;
                $applicant->lastname = $r->lastname;
                $applicant->phoneno = $r->phoneno;
                $applicant->image = $fileName;
                $applicant->gender = $r->gender;
                $applicant->marital_status = $r->marital_status;
                $applicant->idtype = $r->idtype;
                $applicant->idnumber = $r->idnumber;
                $applicant->dob = date('Y-m-d', strtotime($r->dob));
                $applicant->gfdmember = $r->gfdmember;
                $applicant->disabilitytype = json_encode($this->returnDisabilityTypeArray($r->vision, $r->hearing, $r->physic, $r->mental, $r->albinos));
                $applicant->community = $r->communityname;
                $applicant->postal_address = $r->postaladdress;
                $applicant->houseno = $r->houseno;
                $applicant->streetname = $r->streenname;
                $applicant->business_location = $r->business_location;
                $applicant->education = $r->education;
                $applicant->occupation = $r->occupation;
                $applicant->yearsinobusines = $r->yearsinobusines;
                $applicant->dependants = $r->dependants;
                $applicant->objective = json_encode($this->returnFundReasonArray($r->income, $r->educational, $r->organization, $r->medical, $r->skillsdev));
                $applicant->intentoffund = $r->fundintents;
                $applicant->total_amount = $r->amount;
                $applicant->groupapplication = $r->groupapplication;
                $applicant->breakdown = json_encode($allbudgets);
                $applicant->info_approval = $r->info_approval;
                $applicant->region = $region->name;
                $applicant->district = $dist->name;
                $applicant->approved = false;
                $applicant->user_id = $user->id;

                if ($applicant->save()) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Applicantion Successfully Sent',
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'OOps Something went wrong. Please try again',
                    ]);
                }
            } else {
                $user->delete();
                return response()->json([
                    'status' => 'error',
                    'message' => 'Invalid Image File',
                ]);
            }
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Oops Please Select Passport Photo',
            ]);
        }

    }
    public function returnFundReasonArray($income, $educational, $organization, $medical, $skillsdev)
    {
        $reason = [];
        if ($income == 'on') {
            array_push($reason, "Income Generation");
        }
        if ($educational == 'on') {
            array_push($reason, "Educational Support");
        }
        if ($organization == 'on') {
            array_push($reason, "Organizational development");
        }
        if ($medical == 'on') {
            array_push($reason, "Medical/Assistive devices");
        }
        if ($skillsdev == 'on') {
            array_push($reason, "Skills training/apprenticeship");
        }
        return $reason;
    }

    public function returnDisabilityTypeArray($vision, $hearing, $physic, $mental, $albinos)
    {
        $disabilitytype = [];
        if ($vision == 'on') {
            array_push($disabilitytype, "Visually Impaired");
        }
        if ($hearing == 'on') {
            array_push($disabilitytype, "Hearing Impaired");
        }
        if ($physic == 'on') {
            array_push($disabilitytype, "Physically Disabled");
        }
        if ($mental == 'on') {
            array_push($disabilitytype, "Mental/Intellectual");
        }
        if ($albinos == 'on') {
            array_push($disabilitytype, "Albino");
        }
        return $disabilitytype;
    }

    public function downloadApplicantPDF($id)
    {
        $applicant = Applicant::where('id', $id)->first();
        $approvals = ApprovedApplication::where('applicant_id', $applicant->id)->get();
        $admins = [];
        foreach ($approvals as $ap) {
            $admin = Admin::find($ap->admin_id);
            if ($admin != null) {
                array_push($admins, $admin);
            }
        }
        $apcount = $approvals->count();

        for ($i = 0; $i < (3 - $apcount); $i++) {
            array_push($admins, null);
        }
        //    dd($admins);
        // return view('pdfs.applicants', compact('applicant'));

        // $pdf = PDF::loadView('pdfs.applicants', compact('applicant', 'admins'));
	    // return $pdf->stream('document.pdf');

        $pdf = PDF::loadView('pdfs.applicants', compact('applicant', 'admins'));
        return $pdf->stream();
        return $pdf->download('applicant.pdf');
    }

    public function getSMSGroup(Request $r)
    {
        $group = $r->group;

        switch ($group) {
            case 0:
                $applicants = Applicant::all();
                return response()->json([
                    'apllicants' => $applicants,
                ]);
                break;
            case 1:
                $applicants = Applicant::where('approved', true)->get();
                return response()->json([
                    'apllicants' => $applicants,
                ]);
                break;
            case 2:
                $applicants = Applicant::where('fundreleased', true)->get();
                return response()->json([
                    'apllicants' => $applicants,
                ]);
                break;
            default:
                $applicants = Applicant::all();
                return response()->json([
                    'apllicants' => $applicants,
                ]);
        }
    }

    public function quarterlyReport()
    {
        $district = District::where('id', Auth::guard('admin')->user()->district_id)->first();
        $districts = District::all();
        return view('admin.quarterlyreport', compact('districts', 'district'));
    }

    public function getquarterlyReport(Request $r)
    {
        $startdate = date('Y-m-d', strtotime($r->startdate));
        $enddate = date('Y-m-d', strtotime($r->enddate));
        $district = District::find($r->district);
        $pie1 = Applicant::whereBetween('created_at', [$startdate, $enddate])
            ->where('approved', true)
            ->where('district', $district->name)
            ->count();
        $pie2 = Applicant::whereBetween('created_at', [$startdate, $enddate])
            ->where('approved', false)
            ->where('disapproved', false)
            ->where('district', $district->name)
            ->count();
        $pie3 = Applicant::whereBetween('created_at', [$startdate, $enddate])
            ->where('disapproved', true)
            ->where('district', $district->name)
            ->count();

        return response()->json([
            'status' =>'success',
            'approved' => $pie1,
            'district' => $district,
            'pending' => $pie2,
            'disapproved' => $pie3
        ]);
    }

    public function districtReport(){
        return view('admin.districtreport');
    }

    public function getAllDistrictReport(Request $r){
        $startdate = date('Y-m-d', strtotime($r->startdate));
        $enddate = date('Y-m-d', strtotime($r->enddate));
        $districts = District::all();
       
        $thedistricts = [];
        $thedistrictsApprovedCount = [];
        $thedistrictsUnApprovedCount = [];
        $disbursedAmt = [];
        $disbursedCount = [];

        foreach($districts as $d){
           $amount = 0;
           $approved = ApprovedApplication::where('hasApproved', true)->where('district', $d->id)->whereBetween('created_at', [$startdate, $enddate])->count();
           $unapproved = ApprovedApplication::where('hasApproved', false)->where('district', $d->id)->whereBetween('created_at', [$startdate, $enddate])->count();
          
           $disbursements = Disbursement::where('district_id', $d->id)->whereBetween('created_at', [$startdate, $enddate])->get();
           foreach($disbursements as $m){
               $amount += (int)$m->amount;
           }
           array_push($thedistricts, $d->name);
           array_push($disbursedCount, count($disbursements));
           array_push($thedistrictsApprovedCount, $approved);
           array_push($thedistrictsUnApprovedCount, $approved);
           array_push($disbursedAmt, $amount);
        }

        return response()->json([
            'status' =>'success',
            'districts' => $thedistricts,
            'approvedCount' => $thedistrictsApprovedCount,
            'rejectedCount' => $thedistrictsUnApprovedCount,
            'disbursed' => $disbursedCount,
            'disbursedAmt' => $disbursedAmt
        ]);
    }

    public function getNotifyView(){

        return view('admin.push_notification');
    }

    public function sendNotification(Request $r){
        //pushNotify($fcm_token, $message, $title)
        if($r->receipients == null || $r->receipients==[]){
           switch($r->from){
               case 0:
                $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                $applicants = Applicant::select('user_id')->where('district', $district->name)->distinct()->get();
                foreach($applicants as $a){
                    $device = Device::where('user_id', $a->user_id)->first();
                    if($device != null){
                      $result =  $this->pushNotify($device->devicetoken, 
                        "Hello ".$a->firstname.", ". $r->message,
                         'GFD',
                         $a->user_id
                      );
                    }  
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Push notifications sent'
                ]);
               break;
                 
               case 1:
                $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                $applicants = Applicant::select('user_id')->where('approved', true)->where('district', $district->name)->distinct()->get();
                foreach($applicants as $a){
                    $device = Device::where('user_id', $a->user_id)->first();
                    if($device != null){
                      $result =  $this->pushNotify($device->devicetoken, 
                        "Hello ".$a->firstname.", ". $r->message,
                         'GFD',
                         $a->user_id
                      );
                    }  
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Push notifications sent'
                ]);
               break;

               case 2:
                $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                $applicants = Applicant::select('user_id')->where('fundreleased', true)->where('district', $district->name)->distinct()->get();
                foreach($applicants as $a){
                    $device = Device::where('user_id', $a->user_id)->first();
                    if($device != null){
                      $result =  $this->pushNotify($device->devicetoken, 
                        "Hello ".$a->firstname.", ". $r->message,
                         'GFD',
                         $a->user_id
                      );
                    }  
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Push notifications sent'
                ]);
               break;

               default:
               return response()->json([
                   'status' => 'error',
                   'message' => 'Sorry Couldn\'t catch that. Please try again'
               ]);
           }
        }else{
           
                $district = District::where('id',Auth::guard('admin')->user()->district_id)->first();
                $applicants = Applicant::select('firstname', 'user_id')->whereIn('user_id', $r->receipients)->distinct()->get();
                foreach($applicants as $a){
                    $device = Device::where('user_id', $a->user_id)->first();
                    if($device != null){
                      $result =  $this->pushNotify($device->devicetoken, 
                        "Hello ".$a->firstname.", ". $r->message,
                         'GFD',
                         $a->user_id
                      );
                    }  
                }
                return response()->json([
                    'status' => 'success',
                    'message' => 'Push notifications sent'
                ]);
        }
    }
}
