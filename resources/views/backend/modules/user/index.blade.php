@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="page-title-box">
                <h4 class="title-default display-inline mr-15">Users</h4>
                <a href="{{url('users/create')}}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 mb-20">
            <div class="rh-links">
                <ul>
                    <li><a href="#" class="active">All (20) | </a></li>
                    <li><a href="#"> Published (14)</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-lg-3 col-xl-3">
                    <div class="rh-select-wrap">
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">Bulk Options</option>
                            <option value="1">Edit</option>
                            <option value="2">Move to Trash</option>
                        </select>
                    </div>
                    <div class="rh-bttn-wrap">
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Apply
                        </button>
                    </div>
                </div>
                <div class="col-lg-2 col-xl-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">All Dates</option>
                        <option value="1">January 2021</option>
                        <option value="1">February 2021</option>
                        <option value="1">March 2021</option>
                    </select>
                </div>
                <div class="col-lg-3 col-xl-3">
                    <div class="rh-select-wrap">
                        <select class="form-select" aria-label="Default select example">
                            <option selected="">All Categories</option>
                            <option value="1">Uncategoried</option>
                        </select>
                    </div>
                    <div class="rh-bttn-wrap">
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Filter
                        </button>
                    </div>
                </div>
                <div class="col-lg-3 col-xl-4">
                    <div class="rh-select-wrap">
                       <input type="search" name="search_string" id="search" class="form-control"/>
                    </div>
                    <div class="rh-bttn-wrap">
                        <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                            Search
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th scope="row"><input type="checkbox"/></th>
                            <th>Profile Image</th>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @forelse($users as $key => $user)
                            <tr>
                                <th scope="row"><input type="checkbox"/></th>
                                <td><img width="100" height="100" class="rounded-circle" src="https://dummyimage.com/200x200/000/fff" alt="image"></td>
                                <td>{{$user->username??''}}</td>
                                <td>{{$user->first_name??''}} {{$user->last_name??''}}</td>
                                <td>{{$user->user_mobile?:'N/A'}}</td>
                                <td>@foreach($user->roles as $role)<span class="badge bg-warning">{{$role->name??''}}</span>@endforeach</td>
                                <td>
                                    <a href="{{route('users.edit', $user)}}" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                    <form action="{{route('users.destroy', $user)}}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger sm rh-btn" onclick="return confirm('Are you sure ?? want to delete this ..')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <td>no data found</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection
