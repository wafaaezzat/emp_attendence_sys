<?php

namespace App\Http\Controllers;

use App\Exports\MyExport;
use App\Exports\ProjectExport;
use App\Models\Client;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects=Project::all();
        $clients=Client::all();
        return view('dashboards.admins.projects' ,compact('projects','clients'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
       //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
         $request->validate([
            'project_name'=> 'required|unique:projects|string|max:255',
            'client_id' => 'required',
            'project_country'=>'required'
        ]);
        Project::create([
            'project_name' => $request->project_name,
            'client_id' =>$request->client_id,
            'project_country' =>$request->project_country,
            'status'=>1,
        ]);
        return redirect('admin/projects')->with('success','Project Created Successfully');
    }



    public function export()
    {
        return Excel::download(new ProjectExport(), 'projects.xlsx');
    }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project,$id)
    {
        $project = Project::find($id);
        $clients=Client::all();
        return view('dashboards.admins.projects.edit', compact('project','clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $project = Project::find($id);
        $request->validate([
            'project_name'=> 'required|string|max:255',
            'client_id' => 'required',
            'project_country'=>'required'
        ]);
        $project->project_name =  $request->get('project_name');
        $project->client_id = $request->get('client_id');
        $project->project_country = $request->get('project_country');
        $project->save();

        return redirect('admin/projects')->with('success', 'Project updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, $id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect('admin/projects')->with('success', 'Project removed.');
    }
}
