@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="page-title-box">
                    <h4 class="title-default display-inline mr-15">Add New Post</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-lg-9 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Add Title">
                            </div>
                        </div>
                        <div class="texteditor">
                            <textarea id="elm1" name="area"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <!-- start: exerpt -->
                        <div class="excerpt">
                            <div id="accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#excerpt" class="text-dark" data-bs-toggle="collapse"
                                                    aria-expanded="true"
                                                    aria-controls="collapseOne">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="m-0">
                                                Excerpt
                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                            </h6>
                                        </div>
                                    </a>

                                    <div id="excerpt" class="collapse show"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: exerpt -->
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
                                    <div class="card-foot" style="">

                                        <button type="button" class="btn btn-sm btn-danger btn-primary waves-effect waves-light">Delete</button>
                                        <button type="button" class="btn btn-sm btn-primary btn-primary waves-effect waves-light">Published</button>

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
                                <div class="card-body">

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

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection
