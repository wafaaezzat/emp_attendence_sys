@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Clients')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Success !</strong> {{ session('success') }}
        </div>
    @endif

    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>Error !</strong> {{ session('error') }}
        </div>
    @endif

    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="personal_info">
                <form class="form-horizontal" method="GET" action="{{ route('add.client') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Client Name</label>
                        <div class="col-sm-4">
                            <input type="text"  id="name"  placeholder="Client Name" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                            <span class="text-danger error-text">{{$message}}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="client_country" class="col-sm-2 col-form-label">Client Country</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="client_country" id="client_country">
                                <option value="EGY">EGY</option>
                                <option value="KSA">KSA</option>
                                <option value="USA">USA</option>
                                <option value="UK">UK</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-secondary">Add Client</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- ./card-header -->
            <div class="card-body">
{{--                <div>--}}
{{--                    <a href="{{route('client.export')}}" class="btn btn-block btn-success btn-sm" style="width:100px">Export Excel Sheet</a>--}}
{{--                </div>--}}
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Client Name</th>
                        <th>Client Country</th>
                        <th>Start Date</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr data-widget="expandable-table" aria-expanded="false">
                            <td>{{$client->id}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->client_country}}</td>
                            <td>{{$client->created_at->format('d/m/Y')}}</td>
                            <td>
                                <a href="{{ route('edit.client',$client->id)}}" class="btn btn-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('destroy.client', $client->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach



                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

@endsection
