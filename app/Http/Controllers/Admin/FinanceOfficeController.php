<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Applicant;
use App\Disbursement;
use App\District;

use Session;
use File;
use DB;
use Auth;

class FinanceOfficeController extends Controller
{
    public function disburseInfo($id){
        //$appid = substr($id, -1);
        $appid = explode('00', $id);
         if($appid != null){
                $applicant = Applicant::find($appid[1]);
                return view('admin.disbursementinfo', compact('applicant'));
         }else{
             return back();
         }
       
    }

    public function disbursements(Request $r){
        $start  = request()->query('start');
        $end  = request()->query('end');
        
        $authuser = Auth::guard('admin')->user();

        if($authuser->hasRole('Super Admin')){
            if($start != null && $end != null){
                $disbursements = Disbursement::whereBetween('created_at', [$start, $end])->get();
                return view('admin.disbursements', compact('disbursements'));
            }else{
            
                $disbursements = [];
                return view('admin.disbursements', compact('disbursements'));
            }
        }else{
            if($start != null && $end != null){
                $disbursements = Disbursement::whereBetween('created_at', [$start, $end])->where('district_id', Auth::guard('admin')->user()->district_id)->get();
                return view('admin.disbursements', compact('disbursements'));
            }else{
            
                $disbursements = [];
                return view('admin.disbursements', compact('disbursements'));
            }
        }
        
   

       
    }

    public function saveDisbursementInfo(Request $r){
       
        if($r->hasFile('image')){
            $district = District::where('id', $r->district_id)->first();
            $extension = File::extension($r->file('image')->getClientOriginalName());
            $fileName = $r->file('image')->getClientOriginalName();
            // if ($extension == "jpg" || $extension == "png") {
            $r->file('image')->move('assets/images/disbursements/'.$district->name,$fileName);
            // }

            $applicant = Applicant::where('id', $r->applicant_id)->first();
            $applicant->fundreleased = true;
           
            $disbursement = new Disbursement();
           $disbursement->amount = $r->amount;
           $disbursement->release_date = date('Y-m-d', strtotime($r->date));
           $disbursement->account = $r->accountno;
           $disbursement->scancopy = $fileName;
           $disbursement->applicant_id = $r->applicant_id;
           $disbursement->district_id = $r->district_id;
           $disbursement->admin_id = $r->admin_id;

            if( $disbursement->save() && $applicant->save()){
              Session::flash('success','Disbursement Information saved successfully');
            }else{
              Session::flash('error','oops Something went wrong. Please try again');
            }
            return back();
      }else{
          Session::flash('error','Please select scanned copy of receipt of payment');
          return back();
      }
           
    }
}
