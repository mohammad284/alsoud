<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\TypeOfMachineController;
use App\Http\Controllers\Admin\TypeOfPaymentController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\TypeOfWorkController;
use App\Http\Controllers\Admin\ChargePerController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ManagementController;
use App\Http\Controllers\Admin\PrivacyController;
use App\Http\Controllers\Admin\NotificationControlller;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\VacationController;
use App\Http\Controllers\Admin\SalaryController;
use App\Http\Controllers\FrontController;

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
    return redirect('/admin/home');
});

Route::namespace("Admin")->prefix('admin')->group(function(){
    

    Route::namespace('Auth')->group(function(){
      Route::get('/login',[LoginController::class,'showLoginForm'])->name('admin.login');
      Route::post('/login',[LoginController::class,'login']);
      Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
    });
        Route::get('/home',[HomeController::class,'index'])->name('admin.home');
        
        // Admins
        Route::get('/admins',[AdminController::class,'admins'])->name('admin.admins');
        Route::post('/addAdmin',[AdminController::class,'addAdmin'])->name('admin.addAdmin');
        Route::post('/updateAdmin',[AdminController::class,'updateAdmin'])->name('admin.updateAdmin');
        Route::get('/deleteAdmin/{admin_id}',[AdminController::class,'deleteAdmin'])->name('admin.deleteAdmin');

        // engineer
        Route::get('/engineers',[UserController::class,'engineers'])->name('admin.engineers');
        Route::get('/addEngineer',[UserController::class,'addEngineer'])->name('admin.addEngineer');
        Route::post('/saveEngineer',[UserController::class,'saveEngineer'])->name('admin.saveEngineer');
        Route::get('/tasksEngineer/{id}',[UserController::class,'tasksEngineer'])->name('admin.tasksEngineer');
        Route::get('/vacRabEngineer/{id}',[UserController::class,'vacRabEngineer'])->name('admin.vacRabEngineer');
        Route::get('/EditEngineer/{id}',[UserController::class,'EditEngineer'])->name('admin.EditEngineer');
        Route::post('/updateEngineer/{id}',[UserController::class,'updateEngineer'])->name('admin.updateEngineer');
        
        // machines
        Route::get('/machines',[TypeOfMachineController::class,'machines'])->name('admin.machines');
        Route::post('/addMachines',[TypeOfMachineController::class,'addMachines'])->name('admin.addMachines');
        Route::post('/updateMachine',[TypeOfMachineController::class,'updateMachine'])->name('admin.updateMachine');
        Route::get('/deleteMachine/{id}',[TypeOfMachineController::class,'deleteMachine'])->name('admin.deleteMachine');
        
        // payments
        Route::get('/payments',[TypeOfPaymentController::class,'payments'])->name('admin.payments');
        Route::post('/addPayment',[TypeOfPaymentController::class,'addPayment'])->name('admin.addPayment');
        Route::post('/updatePayment',[TypeOfPaymentController::class,'updatePayment'])->name('admin.updatePayment');
        Route::get('/deletePayment/{id}',[TypeOfPaymentController::class,'deletePayment'])->name('admin.deletePayment');

        // works
        Route::get('/works',[TypeOfWorkController::class,'works'])->name('admin.works');
        Route::post('/addWork',[TypeOfWorkController::class,'addWork'])->name('admin.addWork');
        Route::post('/updateWork',[TypeOfWorkController::class,'updateWork'])->name('admin.updateWork');
        Route::get('/deleteWork/{id}',[TypeOfWorkController::class,'deleteWork'])->name('admin.deleteWork');

        //tasks
        Route::get('/tasks',[TaskController::class,'tasks'])->name('admin.tasks');
        Route::get('/addTask',[TaskController::class,'addTask'])->name('admin.addTask');
        Route::post('/saveTask',[TaskController::class,'saveTask'])->name('admin.saveTask');
        Route::get('/detailsTask/{id}',[TaskController::class,'detailsTask'])->name('admin.detailsTask');
        Route::get('/editTask/{id}',[TaskController::class,'editTask'])->name('admin.editTask');
        Route::post('/updateTask/{id}',[TaskController::class,'updateTask'])->name('admin.updateTask');
        Route::post('/deleteTask',[TaskController::class,'deleteTask'])->name('admin.deleteTask');
        Route::get('/deletedTasks',[TaskController::class,'deletedTasks'])->name('admin.deletedTasks');
        Route::get('/certificateTask/{id}',[TaskController::class,'certificateTask'])->name('admin.certificateTask');
        Route::get('/endedTasks',[TaskController::class,'endedTasks'])->name('admin.endedTasks');

        // Charge 
        Route::get('/charges',[ChargePerController::class,'charges'])->name('admin.charges');
        Route::post('/addCharge',[ChargePerController::class,'addCharge'])->name('admin.add_charge');
        Route::post('/updateCharge',[ChargePerController::class,'updateCharge'])->name('admin.updateCharge');
        Route::get('/deleteCharge/{id}',[ChargePerController::class,'deleteCharge'])->name('admin.deleteCharge');
        
        // Clients
        
        Route::get('/clients',[ClientController::class,'clients'])->name('admin.clients');
        Route::get('/deleteClient/{id}',[ClientController::class,'deleteClient'])->name('admin.deleteClient');
        Route::get('/searchClient',[ClientController::class,'searchClient'])->name('admin.searchClient');
        Route::get('/client/{id}',[ClientController::class,'show'])->name('admin.show');

        // Setting
        Route::get('/setting',[SettingController::class,'setting'])->name('admin.setting');
        Route::post('/change_setting',[SettingController::class,'change_setting'])->name('admin.change_setting');

        // Management Message
        Route::get('/managementMessage',[ManagementController::class,'managementMessage'])->name('admin.managementMessage');
        Route::get('/sendTemplate',[ManagementController::class,'sendTemplate'])->name('admin.sendTemplate');
        Route::post('/sendMessage',[ManagementController::class,'sendMessage'])->name('admin.sendMessage');

        // Privacy & Term

        Route::get('/privacy',[PrivacyController::class,'privacy'])->name('admin.privacy');
        Route::post('/changePrivacy',[PrivacyController::class,'changePrivacy'])->name('admin.changePrivacy');
        Route::get('/downloadFile',[PrivacyController::class,'downloadFile'])->name('admin.downloadFile');

        // notifications 
        Route::get('/nots',[NotificationControlller::class,'nots'])->name('admin.nots');

        // certificates
        Route::get('/certificates',[CertificateController::class,'certificates'])->name('admin.certificates');
        Route::get('/detailsCertificate/{id}',[CertificateController::class,'detailsCertificate'])->name('admin.detailsCertificate');
        Route::get('/exportCertificate/{id}',[CertificateController::class,'exportCertificate'])->name('admin.exportCertificate');
        Route::get('/qrcode',[CertificateController::class,'qrcode'])->name('admin.qrcode');

        //Vacation
        Route::get('/vacations',[VacationController::class,'vacations'])->name('admin.vacations');
        Route::get('/acceptVacation/{id}',[VacationController::class,'acceptVacation'])->name('admin.acceptVacation');
        Route::get('/detailsVacation/{id}',[VacationController::class,'detailsVacation'])->name('admin.detailsVacation');
        Route::get('/rebates',[VacationController::class,'rebates'])->name('admin.rebates');
        Route::get('/requestVacations',[VacationController::class,'requestVacations'])->name('admin.requestVacations');
        Route::post('/rejecteVacation',[VacationController::class,'rejecteVacation'])->name('admin.rejecteVacation');
        Route::get('/deniedVacations',[VacationController::class,'deniedVacations'])->name('admin.deniedVacations');
        
        // salary 
        Route::get('/salaries',[SalaryController::class,'salaries'])->name('admin.salaries');
        Route::post('/goToDateForSalary',[SalaryController::class,'goToDateForSalary'])->name('admin.goToDateForSalary');
        Route::get('/salaryDetails/{id}',[SalaryController::class,'salaryDetails'])->name('admin.salaryDetails');

    });
    Route::view('/salary','dashboard.pdf.salary');
    Route::get('/cerDetails/{id}',[FrontController::class,'cerDetails'])->name('cerDetails');