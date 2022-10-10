<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Team;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams=Team::all();
        $users=User::all();
        return view('dashboards.admins.teams.teams',compact('teams','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
//        $request->validate([
//            't_name'=> 'required|string',
//            'leader_id' => 'required',
//        ]);


        Team::create([
            'name'=>$request->t_name,
            'team_leader'=>$request->leader_id,
        ]);

        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team=Team::find($id);
        $users=User::all();
        $roles=Role::all();

        return view('dashboards.admins.teams.team',compact('team','users','roles'));
    }


    public function edit($id)
    {
        $team = Team::find($id);
        return response()->json([
            'status'=>200,
            'team'=>$team
        ]);

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTeamRequest  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTeamRequest $request)
    {
        $request->validate([
            'team_name'=> 'required',
            'team_leader_id' => 'required',
        ]);

        $team=Team::find($request->team_id);
        $team->update([
            'name'=>$request->team_name,
            'team_leader'=>$request->team_leader_id,
        ]);

        return Redirect::back();
    }








    public function editMember($id)
    {
        $member = User::find($id);
        return response()->json([
            'status'=>200,
            'member'=>$member
        ]);

    }
    public function updateMember(UpdateTeamRequest $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'required|string|max:255',
            'phone' => 'nullable|digits:11|regex:/(01)[0-9]{9}/',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role_id' => 'required'
        ]);
        $member=User::find($request->user_id);
        $member->role_id=$request->role_id;
        $member->name=$request->name;
        $member->bio=$request->bio;
        $member->phone=$request->phone;
        $member->address=$request->address;
        $member->email=$request->email;
        $member->save();
//        $member->update([
//            'name' => $request->name,
//            'bio' => $request->bio,
//            'phone' => $request->phone,
//            'address' => $request->address,
//            'email' => $request->email
//        ]);
        return Redirect::back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member=User::find($id);
        $member->delete();
        return Redirect::back()->with('success','member deleted successfully');
    }
}
