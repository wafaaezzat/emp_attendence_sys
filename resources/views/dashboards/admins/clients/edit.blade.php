@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','edit client')

@section('content')

    <div class="card-body">
        <div class="tab-content">
            <div class="active tab-pane" id="personal_info">
                <form class="form-horizontal" method="POST" action="{{ route('update.client', $client->id) }}">
                    @csrf
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Client Name</label>
                        <div class="col-sm-4">
                            <input type="text"  id="name"  placeholder="Client Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$client->name }}">
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
                            <button type="submit" class="btn btn-danger">Add Client</button>
                        </div>
                    </div>
                </form>
            </div>

@endsection
