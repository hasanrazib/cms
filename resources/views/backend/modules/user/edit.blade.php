@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="page-title-box">
                    <h4 class="title-default display-inline mr-15">Update User</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('users.update',$user)}}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="username" id="username" value="{{$user->username}}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">First Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="first_name" id="first-name" value="{{$user->first_name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Last Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="last_name" id="last-name" value="{{$user->last_name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="user_email" id="user-email" value="{{$user->user_email}}">
                                    @error('user_email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Mobile</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="user_mobile" id="user-mobile" value="{{$user->user_mobile}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Type</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="user_type" id="user-type" value="{{$user->user_type}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user-status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input class="form-control form-control-sm" type="text"  name="user_status" id="user-status" value="{{$user->user_status}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Image </label>
                                <div class="col-sm-10">
                                 <input name="profile_image" class="form-control" type="file"  id="user_image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                <div class="col-sm-10">
                                    <img id="showUserImage" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Select Role<span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="Default select example" name="role_id[]" multiple="multiple">
                                        @foreach($roles as $role)
                                        <option value="{{$role->id??''}}" @foreach($user->roles as $item) {{$item->id == $role->id ? 'selected' :''}} @endforeach>{{$role->name??''}}</option>
                                        @endforeach
                                    </select>
                                    @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection


