@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title','Profile')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active">User Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">
                <form method="post" action="{{ route('adminPictureUpdate') }}"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="card card-secondary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle admin_picture" src="{{ url('public/Image/'.Auth::user()->picture) }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center admin_name">{{Auth::user()->name}}</h3>
                            <p class="text-muted text-center">Admin</p>
                            <div class="image text-center">
                            <label><h4>Add image</h4></label>
                            <input type="file" class="form-control" required name="image" >
                        </div>

                        <div class="post_button text-center">
                             <button type="submit" class="btn btn-secondary mt-3">Add</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#personal_info" data-toggle="tab">Personal Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#change_password" data-toggle="tab">Change Password</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="personal_info">
                      <form class="form-horizontal" method="POST" action="{{ route('adminUpdateInfo') }}" id="AdminInfoForm">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" placeholder="Name" value="{{ Auth::user()->name }}" name="name">

                            <span class="text-danger error-text name_error"></span>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="{{ Auth::user()->email }}" name="email">
                            <span class="text-danger error-text email_error"></span>
                          </div>
                        </div>
{{--                        <div class="form-group row">--}}
{{--                          <label for="inputName2" class="col-sm-2 col-form-label">Favorite Color</label>--}}
{{--                          <div class="col-sm-10">--}}
{{--                            <input type="text" class="form-control" id="inputName2" placeholder="Favorite color" value="{{ Auth::user()->favoriteColor }}" name="favoritecolor">--}}
{{--                            <span class="text-danger error-text favoritecolor_error"></span>--}}
{{--                          </div>--}}
{{--                        </div>--}}
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-secondary">Save Changes</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="change_password">
                        <form class="form-horizontal" action="{{ route('adminChangePassword') }}" method="POST" id="changePasswordAdminForm">
                          @csrf
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Old Passord</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="inputName" placeholder="Enter current password" name="oldpassword">
                              <span class="text-danger error-text oldpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="newpassword" placeholder="Enter new password" name="newpassword">
                              <span class="text-danger error-text newpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm New Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="cnewpassword" placeholder="ReEnter new password" name="cnewpassword">
                              <span class="text-danger error-text cnewpassword_error"></span>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-secondary">Update Password</button>
                            </div>
                          </div>
                        </form>
                      </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->


@endsection
