@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Show Team')
@section('content')

    <table class="table table-bordered table-hover p-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Projects</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($team->members as $member)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$member->id}}</td>
                <td>{{$member->name}}</td>
                <td>
                    @foreach($users->find($member->id)->projects as $project)
                        <h6><span class="badge badge-dark">{{$project->project_name}}</span></h6>
                    @endforeach
                </td>
                <td>{{$member->phone}}</td>
                <td>{{$member->email}}</td>
{{--                <td>--}}
{{--                    <a href="{{ route('edit.member',$member->id)}}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>--}}
{{--                </td>--}}
{{--                <td>--}}
{{--                    <form action="{{ route('destroy.member', $member->id)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('DELETE')--}}
{{--                        <button class="btn btn-danger" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>--}}
{{--                    </form>--}}
{{--                </td>--}}
            </tr>
        @endforeach



        </tbody>
    </table>
@endsection
