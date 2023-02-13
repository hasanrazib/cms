@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <div class="row">
            <div class="col-lg-6">
                <div class="card"><br><br>
        <center>
                    <img class="rounded-circle avatar-xl" src="{{ (!empty($user->user_image))? url('upload/admin_images/'.$user->user_image):url('upload/no_image.jpg') }}" alt="Card image cap">
        </center>

                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $user->first_name }} </h4>
                        <hr>
                        <h4 class="card-title">User Email : {{ $user->user_email }} </h4>
                        <hr>
                        <h4 class="card-title">User Name : {{ $user->username }} </h4>
                        <hr>
                        <h4 class="card-title">Mobile : {{ $user->user_mobile }} </h4>
                        <hr>
                        <a href="{{route('users.edit', $user)}}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit Profile</a>

                    </div>
                </div>
            </div>


                                </div>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection


