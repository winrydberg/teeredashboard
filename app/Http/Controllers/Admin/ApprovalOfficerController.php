<?php

namespace App\Http\Controllers\Admin;

use App\Applicant;
use App\ApprovedApplication;
use App\Exports\ApplicantsExport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DateTime;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Session;
use DB;

use App\District;

class ApprovalOfficerController extends Controller
{
    
    public function approveApplicant(Request $r){
        $box = $r->all(); 
        $myValue=  array();
        parse_str($box['data'], $myValue);
     
        $applicationApproval = ApprovedApplication::where('applicant_id', $myValue['applicantid'])->where('admin_id',Auth::guard('admin')->user()->id)->first();
    
        if($applicationApproval != null){
            return response()->json([
                'status'=>'error',
                'message'=>'You have already approved this applicant'
            ]);
        }else{
            $applicationApproval = new ApprovedApplication();
            $applicationApproval->approvedAmt = $myValue['amount'];
            $applicationApproval->hasApproved = true;
            $applicationApproval->message = $myValue['message'];
            $applicationApproval->applicant_id = $myValue['applicantid'];
            $applicationApproval->admin_id = Auth::guard('admin')->user()->id;

            $applicant = Applicant::where('id', $myValue['applicantid'])->first();
            if($applicant->approved1 == 0){
                $applicant->approved1 = 1;
                if($applicationApproval->save() && $applicant->save()){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'You approval has been successfully recorded'
                    ]);
                }else{
                    return response()->json([
                        'status'=>'error',
                        'message'=>'Oops Something Went Wrong.Please try again'
                    ]);
                }
            }else if($applicant->approved2 == 0 ){
                $applicant->approved2 = 1;
                if($applicationApproval->save() && $applicant->save()){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'You approval has been successfully recorded'
                    ]);
                }else{
                    return response()->json([
                        'status'=>'error',
                        'message'=>'Oops Something Went Wrong.Please try again'
                    ]);
                }
            }else if($applicant->approved3 == 0){
                $applicant->approved2 = 1;
                $applicant->approved = true;
                $total = (int)$myValue['amount'];
                $approveds= ApprovedApplication::where('applicant_id', $myValue['applicantid'])->get();
                foreach($approveds as $ap){
                   $total += (int)$ap->approvedAmt;
                }
                $applicant->approvedAmt = $total/3;
                if($applicationApproval->save() && $applicant->save()){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'You approval has been successfully recorded'
                    ]);
                }else{
                    return response()->json([
                        'status'=>'error',
                        'message'=>'Oops Something Went Wrong.Please try again'
                    ]);
                }
            }else{
                return response()->json([
                    'status'=>'error',
                    'message'=>'Applicant Already approved for fund'
                ]);
            }
           
        }
    }

    public function exportApprovedApplicants(){
        $date   = new DateTime(); //this returns the current date time
        $result = $date->format('Y-m-d-H-i-s');
        $krr    = explode('-', $result);
        $result = implode("", $krr);

        $admin = Auth::guard('admin')->user();
        $district = District::where('id', $admin->district_id)->first();
        $approvedapplicants = Applicant::where('approved',true)->where('district', $district->name)->get();
        
        $applicants =[];
        foreach($approvedapplicants as $user){
            $temp =[
                'First Name'=>$user['firstname'],
                'Last Name'=>$user['lastname'],
                'Email Address'=>$user['email'],
                'Phone Number'=>$user['phoneno'],
                'Requested Ammount'=>(String)$user['total_amount'],
                'Gender'=>$user['gender'],
                'Date Of Birth' =>date('d-m-Y', strtotime($user['dob'])),
                'Marital Status' => $user['marital_status'],
                'ID Type' => $user['idtype'],
                'ID Number'=> $user['idnumber'],
                'Is GFD Member' => $user['gfdmember'],
                'Disability Type' => $user['disabilitytype'],
                'Community' => $user['community'],
                'Postal Address' =>$user['postal_address'],
                'House No' => $user['houseno'],
                'Street Name' => $user['streetname'],
                'Business Location' => $user['business_location'],
                'Education' => $user['education'],
                'Occupation' => $user['occupation'],
                'Years In Business' => $user['yearsinbusiness'],
                'Dependants' =>$user['dependants'],
                'How You Intent to Use Fund' =>$user['intentoffund'],
                'Total Requested Amount' => $user['total_amount'],
              //   'Approved Amount' =>$user['approvedAmt'],
                'Areas To Use Fund' => $user['objective'],
                'Group Members' =>$user['groupapplication'],
                'Fund Usage Breakdown' => $user['breakdown'],
                'Approved' => $user['approved'] ==1?'YES':'NO'
              ];
              array_push($applicants,$temp);
        }
        $export = new ApplicantsExport($applicants);
        return Excel::download($export, 'ApprovedApplicants'.$result.'.xls');
    }

    public function exportUnApprovedApplicants(){
        $date   = new DateTime(); //this returns the current date time
        $result = $date->format('Y-m-d-H-i-s');
        $krr    = explode('-', $result);
        $result = implode("", $krr);

        $admin = Auth::guard('admin')->user();
        $approvedapplicants = Applicant::where('approved',false)->where('district', $admin->district_id)->get();
        
        $applicants =[];
        foreach($approvedapplicants as $user){
              $temp =[
                  'First Name'=>$user['firstname'],
                  'Last Name'=>$user['lastname'],
                //   'Email Address'=>$user['email'],
                  'Phone Number'=>$user['phoneno'],
                  'Requested Ammount'=>(String)$user['total_amount'],
                  'Gender'=>$user['gender'],
                  'Date Of Birth' =>date('d-m-Y', strtotime($user['dob'])),
                  'Marital Status' => $user['marital_status'],
                  'ID Type' => $user['idtype'],
                  'ID Number'=> $user['idnumber'],
                  'Is GFD Member' => $user['gfdmember'],
                  'Disability Type' => $user['disabilitytype'],
                  'Community' => $user['community'],
                  'Postal Address' =>$user['postal_address'],
                  'House No' => $user['houseno'],
                  'Street Name' => $user['streetname'],
                  'Business Location' => $user['business_location'],
                  'Education' => $user['education'],
                  'Occupation' => $user['occupation'],
                  'Years In Business' => $user['yearsinbusiness'],
                  'Dependants' =>$user['dependants'],
                  'How You Intent to Use Fund' =>$user['intentoffund'],
                  'Total Requested Amount' => $user['total_amount'],
                //   'Approved Amount' =>$user['approvedAmt'],
                  'Areas To Use Fund' => $user['objective'],
                  'Group Members' =>$user['groupapplication'],
                  'Fund Usage Breakdown' => $user['breakdown'],
                  'Approved' => $user['approved'] ==1?'YES':'NO'
              ];
              array_push($applicants,$temp);
        }
        $export = new ApplicantsExport($applicants);
        return Excel::download($export, 'Approved Applicants-'.$result.'.xls');
    }
}
