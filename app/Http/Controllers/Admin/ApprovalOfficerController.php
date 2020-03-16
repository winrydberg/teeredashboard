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

use App\Notifications\SMSNotification;

class ApprovalOfficerController extends Controller
{
    
    public function approveApplicant(Request $r){
        $box = $r->all(); 
        $myValue=  array();
        parse_str($box['data'], $myValue);
     
        $applicationApproval = ApprovedApplication::where('applicant_id', $myValue['applicantid'])->where('admin_id','!=', null)->first();
    
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
            $applicant->approved1 = 1;
            $applicant->approved = true;
            $applicant->approvedAmt = $myValue['amount'];

            $phoneno = substr($applicant->phoneno, -9);
            $message ='Hello '.$applicant->firstname.' Your application has been approved. Approved amount is GHC'.$myValue['amount'].' You will be notified once funds has been disbursed.';
            $applicant->notify(new SMSNotification($applicant,'233'.$phoneno, $message));
            $district = District::where('name', $applicant->district)->first();
            $applicationApproval->district = $district!=null?$district->id:0;
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

            }
    }


    public function disApproveApplicant(Request $r){
        $box = $r->all(); 
        $myValue=  array();
        parse_str($box['data'], $myValue);
     
        $applicationApproval = ApprovedApplication::where('applicant_id', $myValue['applicantid'])->where('admin_id','!=', null)->first();
    
        if($applicationApproval != null){
            return response()->json([
                'status'=>'error',
                'message'=>'You have already approved/disapproved this applicant'
            ]);
        }else{


            $applicationApproval = new ApprovedApplication();
            $applicationApproval->approvedAmt = 0;
            $applicationApproval->hasApproved = false;
            $applicationApproval->message = $myValue['message'];
            $applicationApproval->applicant_id = $myValue['applicantid'];
            $applicationApproval->admin_id = Auth::guard('admin')->user()->id;


            $applicant = Applicant::where('id', $myValue['applicantid'])->first();
            $applicant->approved1 = 1;
            $applicant->approved = true;
            $applicant->approvedAmt = $myValue['amount'];

            $phoneno = substr($applicant->phoneno, -9);
            $message ='Hello '.$applicant->firstname.' Your application has been rejected. You can check reason for disapproval on DFMC App.';
            $applicant->notify(new SMSNotification($applicant,'233'.$phoneno, $message));
            $district = District::where('name', $applicant->district)->first();
            $applicationApproval->district = $district!=null?$district->id:0;
            if($applicationApproval->save() && $applicant->save()){
                    return response()->json([
                        'status'=>'success',
                        'message'=>'Disapproval Information recorded. SMS Sent to applicant'
                    ]);
                }else{
                    return response()->json([
                        'status'=>'error',
                        'message'=>'Oops Something Went Wrong.Please try again'
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
        if($admin->hasRole('Super Admin')){
            $approvedapplicants = Applicant::where('approved',false)->get();
        
        }else{
            $district = District::where('id', $admin->district_id)->first();
            $approvedapplicants = Applicant::where('approved',false)->where('district', $district->name)->get();
        
        }
       
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
        return Excel::download($export, 'New Applicants-'.$result.'.xls');
    }
}







            // if($applicant->approved1 == 0){
            //     $applicant->approved1 = 1;
            //     if($applicationApproval->save() && $applicant->save()){
            //         return response()->json([
            //             'status'=>'success',
            //             'message'=>'You approval has been successfully recorded'
            //         ]);
            //     }else{
            //         return response()->json([
            //             'status'=>'error',
            //             'message'=>'Oops Something Went Wrong.Please try again'
            //         ]);
            //     }
            // }else if($applicant->approved2 == 0 ){
            //     $applicant->approved2 = 1;
            //     if($applicationApproval->save() && $applicant->save()){
            //         return response()->json([
            //             'status'=>'success',
            //             'message'=>'You approval has been successfully recorded'
            //         ]);
            //     }else{
            //         return response()->json([
            //             'status'=>'error',
            //             'message'=>'Oops Something Went Wrong.Please try again'
            //         ]);
            //     }
            // }else if($applicant->approved3 == 0){
            //     $applicant->approved2 = 1;
            //     $applicant->approved = true;
            //     $total = (int)$myValue['amount'];
            //     $approveds= ApprovedApplication::where('applicant_id', $myValue['applicantid'])->get();
            //     foreach($approveds as $ap){
            //        $total += (int)$ap->approvedAmt;
            //     }
            //     $applicant->approvedAmt = $total/3;
            //     if($applicationApproval->save() && $applicant->save()){
            //         return response()->json([
            //             'status'=>'success',
            //             'message'=>'You approval has been successfully recorded'
            //         ]);
            //     }else{
            //         return response()->json([
            //             'status'=>'error',
            //             'message'=>'Oops Something Went Wrong.Please try again'
            //         ]);
            //     }
