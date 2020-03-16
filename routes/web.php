<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', 'Admin\AuthController@login')->name('login');
Route::post('/login', 'Admin\AuthController@authenticate');
Route::get('/logout', 'Admin\AuthController@logout');
Route::get('/forgot-password', 'Admin\AuthController@forgotPassword');
Route::post('/reset-password', 'Admin\AuthController@resetPassword');
Route::get('/reset-password/{id}/{token}', 'Admin\AuthController@newPasswordFormd');
Route::post('save-new-password', 'Admin\AuthController@saveNewPassword');

Route::get('/new-admin','Admin\AdminController@newAdmin');
Route::post('/new-admin','Admin\AdminController@saveAdmin');
Route::get('/get-passsword', 'Admin\AdminController@getPassword');
Route::get('/new-district', 'Admin\AdminController@newDistrict');
Route::post('/new-district', 'Admin\AdminController@saveDistrict');
Route::get('/profile','Admin\AdminController@profile');

Route::post('/get-sms-applicant','Admin\AdminController@getSMSGroup' );
Route::get('/quarterly-report', 'Admin\AdminController@quarterlyReport');
Route::post('/quarterly-report', 'Admin\AdminController@getquarterlyReport');

Route::get('/district-report', 'Admin\AdminController@districtReport');
Route::post('/district-report', 'Admin\AdminController@getAllDistrictReport');

Route::get('/download-pdf/{id}', 'Admin\AdminController@downloadApplicantPDF');

Route::get('/push', 'Admin\AdminController@pushNotify');
Route::get('/sms', 'Admin\AdminController@sms');


Route::group(['middleware' => ['role:Super Admin|District Supervisor|Finance Officer|Approval Officer|Secretary|Monitoring Officer']], function () {
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::get('/approved-applicants', 'Admin\AdminController@approvedApllications');
    Route::get('/applicant-details/{id}', 'Admin\AdminController@getDetails');
    Route::get('/send-sms', 'Admin\AdminController@sendSMS');
    Route::post('/send-sms', 'Admin\AdminController@sendSMSNotification');
    Route::get('/new-applications', 'Admin\AdminController@newapplications'); 
    Route::get('/new-applicant', 'Admin\AdminController@newApplicant'); 
    Route::post('/new-applicant', 'Admin\AdminController@saveNewApplicant'); 
    Route::get('/search', 'Admin\AdminController@searchApplicant'); 
    Route::get('/send-notification', 'Admin\AdminController@getNotifyView');
    Route::post('/send-notification', 'Admin\AdminController@sendNotification');
    Route::post('/change-password','Admin\AuthController@changePassword');
    Route::get('/monitoring-details/{id}', 'Admin\MonitoringOfficerController@monitoringInfo');
    Route::get('/all-monitorings', 'Admin\MonitoringOfficerController@allMontorings');

    

});


Route::group(['middleware' => ['role:Super Admin']], function () {
    // Route::get('/new-admin', 'Admin\AdminController@newAdmin');
    // Route::post('/new-admin', 'Admin\AdminController@saveAdmin');
    // Route::get('/get-passsword', 'Admin\AdminController@getPassword');
    Route::get('/admins', 'Admin\AdminController@admins');

});

Route::group(['middleware' => ['role:Finance Officer|District Supervisor']], function () {
    Route::get('/approved/{id}','Admin\FinanceOfficeController@disburseInfo');
    Route::get('/disbursements','Admin\FinanceOfficeController@disbursements');
    Route::post('/save-disbursement-info', 'Admin\FinanceOfficeController@saveDisbursementInfo');
});


Route::group(['middleware' => ['role:Approval Officer|Super Admin|District Supervisor']], function () {
    Route::post('/approve-applicant','Admin\ApprovalOfficerController@approveApplicant');
    Route::get('/approved-excel', 'Admin\ApprovalOfficerController@exportApprovedApplicants');
    Route::get('/unapproved-excel', 'Admin\ApprovalOfficerController@exportUnApprovedApplicants');
    Route::post('/disapprove-applicant', 'Admin\ApprovalOfficerController@disApproveApplicant');
});

Route::group(['middleware' => ['role:Monitoring Officer|Super Admin|District Supervisor']], function () {
    
    Route::get('/my-monitorings', 'Admin\MonitoringOfficerController@myMonitorings');
    Route::get('/disbursed-applicants', 'Admin\MonitoringOfficerController@disbursedApplicants');
    Route::get('/monitoring/{id}', 'Admin\MonitoringOfficerController@newMonitoring');
    Route::post('/monitoring-activity', 'Admin\MonitoringOfficerController@saveMonitoringActivity');
    Route::post('/monitoring-expenditure', 'Admin\MonitoringOfficerController@saveExpenditure');
    
    
});