@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="page-title-box">
                    <h4 class="title-default display-inline mr-15">Add New Service</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <form action="{{route('services.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-9 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Add Title" name="title">
                            </div>
                            <div class="col-sm-12 mt-15">
                               <span>Permalink: <a href="#" style="color:#2F84EA">https://razib.dev/sfdsf/</a><button class="btn btn-sm btn-outline-primary waves-effect waves-light" type="button">Edit</button></span>
                            </div>
                        </div>
                        <div class="texteditor">
                            <textarea id="elm1" name="description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- start: genarel settings -->
                        <div class="excerpt">
                            <div id="accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#general_settings" class="text-dark" data-bs-toggle="collapse"
                                                    aria-expanded="false"
                                                    aria-controls="collapseOne">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="m-0">
                                                General Settings
                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="general_settings" class="collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: genarel settings -->
                        <!-- start: Additional Info -->
                        <div class="excerpt">
                            <div id="accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#additional_info" class="text-dark" data-bs-toggle="collapse"
                                                    aria-expanded="false"
                                                    aria-controls="collapseOne">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="m-0">
                                                Additional Info 
                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="additional_info" class="collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <textarea  class="form-control" rows="3"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: genarel settings -->
                        <!-- start: short description -->
                        <div class="excerpt">
                            <div id="accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#short_description" class="text-dark" data-bs-toggle="collapse"
                                                    aria-expanded="true"
                                                    aria-controls="collapseOne">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="m-0">
                                                Short Description
                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                            </h6>
                                        </div>
                                    </a>

                                    <div id="short_description" class="collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <textarea  class="form-control" rows="3" name="short_description"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: short description -->
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-xl-3">
                <div class="sidebar">
                    <div id="accordion" class="custom-accordion">
                        <div class="card">
                            <a href="#publish" class="text-dark" data-bs-toggle="collapse"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h6 class="m-0">
                                        Publish
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>
                            </a>

                            <div id="publish" class="collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <div class="">
                                        <ul>
                                            <li>Status: <strong>Draft </strong><a href="#" style="color:#2F84EA">Edit</a></li>
                                            <li>Visibility: <strong>Public </strong><a href="#"  style="color:#2F84EA">Edit</a></li>
                                            <li>Publish: <strong>Immediately </strong><a href="#"  style="color:#2F84EA">Edit</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-foot" style="">
                                        <button type="button" class="btn btn-sm btn-danger btn-primary waves-effect waves-light">Delete</button>
                                        <button type="submit" class="btn btn-sm btn-primary btn-primary waves-effect waves-light">Published</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a href="#categories" class="text-dark" data-bs-toggle="collapse"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h6 class="m-0">
                                        Categories
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>
                            </a>

                            <div id="categories" class="collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="card-body ">
                                    <ul>
                                        <li><input class="" type="checkbox">Test</li>
                                        <li> <input type="checkbox">Test
                                            <ul>
                                                <li><input type="checkbox"/>Test 1</li>
                                                <li><input type="checkbox"/>Test 1
                                                    <ul>
                                                        <li><input type="checkbox"/>Test 2</li>
                                                        <li><input type="checkbox"/>Test 2</li>
                                                        <li><input type="checkbox"/>Test 2</li>
                                                    </ul>
                                                </li>
                                                <li><input type="checkbox"/>Test 1</li>
                                            </ul>
                                        </li>
                                        <li> <input type="checkbox">Test</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a href="#tags" class="text-dark" data-bs-toggle="collapse"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h6 class="m-0">
                                        Tags
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>
                            </a>

                            <div id="tags" class="collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <input class="form-control" type="text" data-role="tagsinput">
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <a href="#featuredimage" class="text-dark" data-bs-toggle="collapse"
                                            aria-expanded="true"
                                            aria-controls="collapseOne">
                                <div class="card-header" id="headingOne">
                                    <h6 class="m-0">
                                        Featured Image
                                        <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                    </h6>
                                </div>
                            </a>
                            <div id="featuredimage" class="collapse show"
                                    aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="card-body">
                                    <input name="featured_image" class="form-control mb-3" type="file"  id="user_image">
                                    <img id="showUserImage" class="rounded avatar-lg" src="{{url('upload/no_image.jpg') }}" alt="Image">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        </form>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->
@endsection

