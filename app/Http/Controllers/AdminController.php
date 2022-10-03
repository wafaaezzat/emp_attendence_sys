<?php

namespace App\Http\Controllers;


use App\Charts\AttendeeTotalHours;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    function index(Request $request){
        $users=User::all();
        $projects=Project::all();
        $count = 0;
        foreach($users as $user){
                $count = $user->active + $count;
        }
        $user=User::find(Auth::id());
        $attendance=$user->attendances()->latest()->first();
        $project=$attendance->projects;
        $project=Project::find($project[0]->id);
        $effort=$project->UserProjectAttendances()->pluck('sum','user_id');
        $attendancesBerDays=$project->ProjectAttendancesBerDays()->pluck('sum','date');
        $chart=new AttendeeTotalHours();
        $chart_effort=new AttendeeTotalHours();
        $chart->labels($attendancesBerDays->keys());
        $chart_effort->labels($effort->keys());
        $chart_effort->dataset('user_id total hours on project','bar',$effort->values());
        $chart->dataset('total hours ber day on project','bar',$attendancesBerDays->values());
        return view('dashboards.admins.index' ,compact('projects','chart','project','users','count','chart_effort','user'));
    }

    function profile(){
        return view('dashboards.admins.profile');
    }
    function settings(){
        return view('dashboards.admins.settings');
    }

    function updateInfo(Request $request){

        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }else{
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'favoriteColor'=>$request->favoritecolor,
            ]);

            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
            }
        }
    }

    function updatePicture(Request $request){


        $user= User::find(Auth::id());
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $user['picture']= $filename;
        }
        $user->save();
        return  redirect('admin/profile');

    }


    function changePassword(Request $request){
        //Validate form
        $validator = Validator::make($request->all(),[
            'oldpassword'=>[
                'required', function($attribute, $value, $fail){
                    if( !Hash::check($value, Auth::user()->password) ){
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
        ],[
            'oldpassword.required'=>'Enter your current password',
            'oldpassword.min'=>'Old password must have atleast 8 characters',
            'oldpassword.max'=>'Old password must not be greater than 30 characters',
            'newpassword.required'=>'Enter new password',
            'newpassword.min'=>'New password must have atleast 8 characters',
            'newpassword.max'=>'New password must not be greater than 30 characters',
            'cnewpassword.required'=>'ReEnter your new password',
            'cnewpassword.same'=>'New password and Confirm new password must match'
        ]);

        if( $validator->passes() ){
             User::find(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);
        }
        return redirect('admin/profile');
    }

}
