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

Route::get('/new-admin','Admin\AdminController@newAdmin');
Route::post('/new-admin','Admin\AdminController@saveAdmin');
Route::get('/get-passsword', 'Admin\AdminController@getPassword');
Route::get('/new-district', 'Admin\AdminController@newDistrict');
Route::post('/new-district', 'Admin\AdminController@saveDistrict');
Route::get('/profile','Admin\AdminController@profile');



Route::group(['middleware' => ['role:Super Admin|Finance Officer|Approval Officer|Secretary|Monitoring Officer']], function () {
    Route::get('/dashboard', 'Admin\AdminController@dashboard');
    Route::get('/approved-applicants', 'Admin\AdminController@approvedApllications');
    Route::get('/applicant-details/{id}', 'Admin\AdminController@getDetails');
    Route::get('/send-sms', 'Admin\AdminController@sendSMS');
    Route::get('/new-applications', 'Admin\AdminController@newapplications'); 
    Route::get('/new-applicant', 'Admin\AdminController@newApplicant'); 
    Route::post('/new-applicant', 'Admin\AdminController@saveNewApplicant'); 
    Route::get('/search', 'Admin\AdminController@searchApplicant'); 
    Route::get('/download-pdf/{id}', 'Admin\AdminController@downloadApplicantPDF');
});


Route::group(['middleware' => ['role:Super Admin']], function () {
    // Route::get('/new-admin', 'Admin\AdminController@newAdmin');
    // Route::post('/new-admin', 'Admin\AdminController@saveAdmin');
    // Route::get('/get-passsword', 'Admin\AdminController@getPassword');
    Route::get('/admins', 'Admin\AdminController@admins');

});

Route::group(['middleware' => ['role:Finance Officer']], function () {
    Route::get('/approved/{id}','Admin\FinanceOfficeController@disburseInfo');
    Route::get('/disbursements','Admin\FinanceOfficeController@disbursements');
    Route::post('/save-disbursement-info', 'Admin\FinanceOfficeController@saveDisbursementInfo');
});


Route::group(['middleware' => ['role:Approval Officer|Super Admin']], function () {
    Route::post('/approve-applicant','Admin\ApprovalOfficerController@approveApplicant');
    Route::get('/approved-excel', 'Admin\ApprovalOfficerController@exportApprovedApplicants');
    Route::get('/unapproved-excel', 'Admin\ApprovalOfficerController@exportUnApprovedApplicants');
});

Route::group(['middleware' => ['role:Monitoring Officer|Super Admin']], function () {
    
    Route::get('/my-monitorings', 'Admin\MonitoringOfficerController@myMonitorings');
    Route::get('/disbursed-applicants', 'Admin\MonitoringOfficerController@disbursedApplicants');
   
});