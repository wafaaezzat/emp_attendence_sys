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
            <th>Role</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($team->members as $member)
            <tr data-widget="expandable-table" aria-expanded="false">
                <td>{{$member->id}}</td>
                <td>{{$member->name}}
                    @if($member->active==1)
                        <h6><span class="badge badge-success">Active</span></h6>
                    @endif
                </td>
                <td>
                    @foreach($users->find($member->id)->projects as $project)
                        <h6><span class="badge badge-dark">{{$project->project_name}}</span></h6>
                    @endforeach
                </td>
                <td>{{$member->phone}}</td>
                <td>{{$member->email}}</td>
                <td>{{\App\Models\Role::find($member->role_id)->name}}</td>
                <td>
                    <button type="button" value="{{$member->id}}" id="editbtn"  class="btn btn-block btn-secondary btn-sm" data-toggle="modal"  data-target="#demoModal">
                        <i class="fa-sharp fa-solid fa-pen"></i>
                    </button>
                </td>
                <td>
                    <form action="{{ route('destroy.member', $member->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa-sharp fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <!-- Modal Example Start-->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Attendance</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="{{ route('update.teamMember') }}">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id">

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-4">
                                <input type="text"  id="name" name="name"  placeholder="user_name" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-4">
                                <input type="text" id="phone" name="phone" placeholder="phone"  class="form-control @error('phone') is-invalid @enderror" >
                                @error('phone')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="email" id="email" name="email" placeholder="email"  class="form-control @error('email') is-invalid @enderror" >
                                @error('email')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                            <div class="col-sm-4">
                                <input type="text" id="address" name="address" placeholder="address"  class="form-control @error('address') is-invalid @enderror" >
                                @error('address')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="bio" class="col-sm-2 col-form-label">Bio</label>
                            <div class="col-sm-4">
                                <input type="text" id="bio" name="bio" placeholder="bio"  class="form-control @error('bio') is-invalid @enderror" >
                                @error('bio')
                                <span class="text-danger error-text">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-sm-2 col-form-label">Roles</label>
                            <div class="col-sm-4">
                                <select class="form-control"  name="role_id" id="role_id">
                                    <option value="option_select" disabled selected>Roles</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">
                                            {{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function (){
            $(document).on('click','#editbtn',function (){

                var user_id=$(this).val();
                $('#editModal').modal('show');
                $.ajax({
                    type:"GET",
                    url:"/admin/edit/member/"+user_id,
                    success:function (response){
                        $('#name').val(response.member.name);
                        $('#phone').val(response.member.phone);
                        $('#email').val(response.member.email);
                        $('#address').val(response.member.address);
                        $('#bio').val(response.member.bio);
                        $('#role_id').val(response.member.role_id);
                        $('#user_id').val(response.member.id);
                        console.log(response.member.role_id);
                    }

                });

            });

        });

    </script>
@endsection
