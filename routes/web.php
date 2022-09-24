<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\LogoutController;
use \Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\UserController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\UsersAtendanceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\AttendanceController;
use \App\Http\Controllers\AttendanceProjectController;
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
})->middleware('verified');
Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('attendances/records', [UsersAtendanceController::class, 'filter'])->name('attendances/records');
Route::get('store/project',[AttendanceProjectController::class,'store'])->name('project.signin')->middleware('auth');



Route::group(['prefix'=>'admin', 'middleware'=>['auth','isAdmin']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard')->middleware('verified');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::get('attendances',[AttendanceController::class,'index'])->name('admin.attendance');
    Route::get('usersAttendances',[UsersAtendanceController::class,'index'])->name('users.attendance');
    Route::get('allAttendancesExport',[UsersAtendanceController::class,'export'])->name('allAttendances.export');
    Route::get('myAttendancesExport',[AttendanceController::class,'export'])->name('adminAttendance.export');
    Route::get('/users/date/filter', [UsersAtendanceController::class,'filter'])->name('users.filter');
    Route::get('date/filter', [AttendanceController::class,'filter'])->name('admin.filter');
    Route::get('projects',[ProjectController::class,'index'])->name('company.projects');
    Route::get('add/project',[ProjectController::class,'store'])->name('add.project');
    Route::post('update/project/{id}',[ProjectController::class,'update'])->name('update.project');
    Route::get('edit/project/{id}',[ProjectController::class,'edit'])->name('edit.project');
    Route::delete('destroy/project/{id}',[ProjectController::class,'destroy'])->name('destroy.project');
    Route::get('projects/attendance',[AttendanceProjectController::class,'index'])->name('projects.attendance');


    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

});





Route::group(['prefix'=>'user', 'middleware'=>['auth','isUser']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard')->middleware('verified');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('attendances',[AttendanceController::class,'index'])->name('user.attendance');
    Route::get('usersAttendances',[AttendanceController::class,'export'])->name('userAttendance.export');
    Route::get('/user/date/filter', [AttendanceController::class,'filter'])->name('user.filter');


    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
});
