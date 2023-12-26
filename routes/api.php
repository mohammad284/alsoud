<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\CertificateController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ManagementController;
use App\Http\Controllers\Api\VacationController;
use App\Http\Controllers\Api\SalaryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group([ 'middleware' => 'api' , 'prefix' => 'auth' ] , function() {
    Route::post('/register' , [AuthController::class , 'register']);
    Route::post('/login' , [AuthController::class , 'login']);
    Route::post('/logout' , [AuthController::class , 'logout']);
    Route::post('/refresh' , [AuthController::class , 'refresh']);
});
Route::group(['middleware' => ['jwt.verify']], function() {
// UserController
    Route::get('/myProfile',[UserController::class,'myProfile'])->name('myProfile');
    Route::post('/updateProfile',[UserController::class,'updateProfile'])->name('updateProfile');
    Route::post('/updatePassword',[UserController::class,'updatePassword'])->name('updatePassword');
    
    Route::get('/scopeOfWorks',[UserController::class,'scopeOfWorks'])->name('scopeOfWorks');
    Route::get('/engs',[UserController::class,'engs'])->name('engs');
    
// notificationController 
    Route::get('/notifications',[NotificationController::class,'notifications'])->name('notifications');

// ManagementController
    Route::get('/messages',[ManagementController::class,'messages'])->name('messages');
    Route::get('/messageDetails/{id}',[ManagementController::class,'messageDetails'])->name('messageDetails');
    Route::post('/replay',[ManagementController::class,'replay'])->name('replay');
    Route::get('/privacy',[ManagementController::class,'privacy'])->name('privacy');

// TaskContrller
    Route::get('/tasks',[TaskController::class,'tasks'])->name('tasks');
    Route::get('/deletedTasks',[TaskController::class,'deletedTasks'])->name('deletedTasks');
    Route::post('/taskDetails',[TaskController::class,'taskDetails'])->name('taskDetails');
    Route::post('/updateTask',[TaskController::class,'updateTask'])->name('updateTask');
    Route::get('/endTask/{id}',[TaskController::class,'endTask'])->name('endTask');
    
// CertificateController
    Route::get('/engCertificates',[CertificateController::class,'engCertificates'])->name('engCertificates');
    Route::post('/sendCertificate',[CertificateController::class,'sendCertificate'])->name('sendCertificate');

// VacationController
    Route::get('/engVacation',[VacationController::class,'engVacation'])->name('engVacation');
    Route::post('/takeVacation',[VacationController::class,'takeVacation'])->name('takeVacation');
    Route::get('/leaves',[VacationController::class,'leaves'])->name('leaves');
    Route::get('/vacation/{id}',[VacationController::class,'vacation'])->name('vacation');
    Route::get('/restVacation',[VacationController::class,'restVacation'])->name('restVacation');
    Route::post('/uplodeImage',[VacationController::class,'uplodeImage'])->name('uplodeImage');

// SalaryController 
    Route::get('/salary',[SalaryController::class,'salary'])->name('salary');
    Route::get('/salaryDetails/{id}',[SalaryController::class,'salaryDetails'])->name('salaryDetails');
    
}); 
