<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Auth\RegisterController;
use \App\Http\Controllers\Auth\LoginController;
use \App\Http\Controllers\Auth\LogoutController;
use \Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\AdminController;
use  App\Http\Controllers\UserController;
use  App\Http\Controllers\TeamLeaderController;
use \App\Http\Controllers\HomeController;
use \App\Http\Controllers\UsersAtendanceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use \App\Http\Controllers\ProjectController;
use \App\Http\Controllers\AttendanceController;
use \App\Http\Controllers\AttendanceProjectController;
use \App\Http\Controllers\ClientController;
use \App\Http\Controllers\TeamController;
use \App\Http\Controllers\CheckUserStatusController;
use \App\Http\Controllers\ExportsController;
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
//Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
Route::get('attendances/records', [UsersAtendanceController::class, 'filter'])->name('attendances/records');
Route::get('signin/project',[AttendanceProjectController::class,'store'])->name('project.signin')->middleware('auth');
Route::get('signout/project',[AttendanceProjectController::class,'signout'])->name('project.signout')->middleware('auth');



Route::group(['prefix'=>'admin', 'middleware'=>['auth','isAdmin']], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard')->middleware('verified');
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::get('settings',[AdminController::class,'settings'])->name('admin.settings');



    Route::get('attendances',[AttendanceController::class,'index'])->name('admin.attendance');
    Route::get('usersAttendances',[UsersAtendanceController::class,'index'])->name('users.attendance');
    Route::get('usersBerDAY',[UsersAtendanceController::class,'attendanceBerday'])->name('users.berDAY');
    Route::get('/users/attendances/filter', [UsersAtendanceController::class,'filter'])->name('users.filter');
    Route::get('/users/filter', [UsersAtendanceController::class,'usersBerDayFilter'])->name('usersBerDay.filter');
    Route::get('date/filter', [AttendanceController::class,'filter'])->name('admin.filter');
    Route::post('update/attendance',[UsersAtendanceController::class,'update'])->name('update.attendance');
    Route::get('edit/attendance/{id}',[UsersAtendanceController::class,'edit'])->name('edit.attendance');



    Route::get('projects',[ProjectController::class,'index'])->name('company.projects');
    Route::get('add/project',[ProjectController::class,'store'])->name('add.project');
    Route::get('show/project',[ProjectController::class,'show'])->name('show.project');
    Route::post('update/project/{id}',[ProjectController::class,'update'])->name('update.project');
    Route::get('edit/project/{id}',[ProjectController::class,'edit'])->name('edit.project');
    Route::delete('destroy/project/{id}',[ProjectController::class,'destroy'])->name('destroy.project');
    Route::get('projects/attendance',[AttendanceProjectController::class,'index'])->name('projects.attendance');



    Route::post('update/team',[TeamController::class,'update'])->name('update.team');
    Route::get('edit/team/{id}',[TeamController::class,'edit'])->name('edit.team');
    Route::post('update/member',[TeamController::class,'updateMember'])->name('update.teamMember');
    Route::get('edit/member/{id}',[TeamController::class,'editMember'])->name('edit.teamMember');
    Route::get('teams',[TeamController::class,'index'])->name('teams');
    Route::get('teams/{id}',[TeamController::class,'show'])->name('show.team');
    Route::post('add/team',[TeamController::class,'store'])->name('add.team');
    Route::delete('destroy/member/{id}',[TeamController::class,'destroy'])->name('destroy.member');



    Route::get('users',[CheckUserStatusController::class,'index'])->name('users');


///////////////clients/////////////////////////////
    Route::get('clients',[ClientController::class,'index'])->name('company.clients');
    Route::get('add/client',[ClientController::class,'store'])->name('add.client');
    Route::post('update/client/{id}',[ClientController::class,'update'])->name('update.client');
    Route::get('edit/client/{id}',[ClientController::class,'edit'])->name('edit.client');
    Route::delete('destroy/client/{id}',[ClientController::class,'destroy'])->name('destroy.client');




///////////////////exports////////////////
    Route::get('exports',[ExportsController::class,'index'])->name('admin.exports');
    Route::get('UserAttendanceBerDayExport',[UsersAtendanceController::class,'exportone'])->name('UserAttendanceBerDayExport.export');
    Route::get('MyAttendanceBerDayExport',[UsersAtendanceController::class,'exporttwo'])->name('MyAttendanceBerDayExport.export');
    Route::get('project/export',[ProjectController::class,'export'])->name('project.export');
    Route::get('allAttendancesExport',[UsersAtendanceController::class,'export'])->name('allAttendances.export');
    Route::get('myAttendancesExport',[AttendanceController::class,'export'])->name('adminAttendance.export');
    Route::get('users/info',[UserController::class,'export'])->name('usersInfo.export');
    Route::get('projectAttendance/export',[AttendanceProjectController::class,'export'])->name('projects.attendance.export');


//////////////////AdminInfo/////////////////
    Route::post('update-profile-info',[AdminController::class,'updateInfo'])->name('adminUpdateInfo');
    Route::post('change-profile-picture',[AdminController::class,'updatePicture'])->name('adminPictureUpdate');
    Route::post('change-password',[AdminController::class,'changePassword'])->name('adminChangePassword');

});







Route::group(['prefix'=>'TeamLeader', 'middleware'=>['auth','isTeamLeader']], function(){
    Route::get('dashboard',[TeamLeaderController::class,'index'])->name('TeamLeader.dashboard')->middleware('verified');
    Route::get('profile',[TeamLeaderController::class,'profile'])->name('TeamLeader.profile');
    Route::get('settings',[TeamLeaderController::class,'settings'])->name('TeamLeader.settings');



    Route::get('attendances',[AttendanceController::class,'index'])->name('TeamLeader.attendance');
    Route::get('date/filter', [AttendanceController::class,'filter'])->name('TeamLeader.filter');
    Route::post('update/attendance',[UsersAtendanceController::class,'update'])->name('TeamLeader.updateAttendance');
    Route::get('edit/attendance/{id}',[UsersAtendanceController::class,'edit'])->name('TeamLeader.editAttendance');
    Route::get('/users/filter', [UsersAtendanceController::class,'usersBerDayFilter'])->name('TeamLeader.membersBerDayFilter');


    Route::get('teamAttendance',[TeamController::class,'attendance'])->name('TeamLeader.teamAttendance');
    Route::post('update/team',[TeamController::class,'update'])->name('TeamLeader.updateTeam');
    Route::get('edit/team/{id}',[TeamController::class,'edit'])->name('TeamLeader.editTeam');
    Route::post('update/member',[TeamController::class,'updateMember'])->name('TeamLeader.updateTeamMember');
    Route::get('edit/member/{id}',[TeamController::class,'editMember'])->name('TeamLeader.editTeamMember');
    Route::get('teams',[TeamController::class,'index'])->name('TeamLeader.teams');
    Route::get('teams/{id}',[TeamController::class,'show'])->name('TeamLeader.showTeam');
    Route::delete('destroy/member/{id}',[TeamController::class,'destroy'])->name('TeamLeader.destroyMember');


    Route::get('projects/attendances',[AttendanceProjectController::class,'index'])->name('TeamLeader.projectsAttendance');
    Route::get('show/project',[ProjectController::class,'show'])->name('TeamLeader.showProject');



    //////////////Team Leader Info/////////////////////
    Route::post('update-profile-info',[TeamLeaderController::class,'updateInfo'])->name('TeamLeaderUpdateInfo');
    Route::post('change-profile-picture',[TeamLeaderController::class,'updatePicture'])->name('TeamLeaderPictureUpdate');
    Route::post('change-password',[TeamLeaderController::class,'changePassword'])->name('TeamLeaderChangePassword');

});





Route::group(['prefix'=>'user', 'middleware'=>['auth','isUser']], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard')->middleware('verified');
    Route::get('profile',[UserController::class,'profile'])->name('user.profile');
    Route::get('settings',[UserController::class,'settings'])->name('user.settings');
    Route::get('attendances',[AttendanceController::class,'index'])->name('user.attendance');
    Route::get('/user/date/filter', [AttendanceController::class,'filter'])->name('user.filter');

///////////////////////////UserInfo//////////////
    Route::post('update-profile-info',[UserController::class,'updateInfo'])->name('userUpdateInfo');
    Route::post('change-profile-picture',[UserController::class,'updatePicture'])->name('userPictureUpdate');
    Route::post('change-password',[UserController::class,'changePassword'])->name('userChangePassword');
});


