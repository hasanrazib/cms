@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="page-title-box">
                <h4 class="title-default display-inline mr-15">Posts</h4>
                <button type="button" class="btn btn-primary btn-sm">Add New</button>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 mb-20">
            <div class="row">
                <div class="col-lg-2 col-xl-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">Bulk Options</option>
                        <option value="1">Edit</option>
                        <option value="2">Move to Trash</option>
                    </select>
                </div>
                <div class="col-lg-2 col-xl-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">All Dates</option>
                        <option value="1">January 2021</option>
                        <option value="1">February 2021</option>
                        <option value="1">March 2021</option>
                    </select>
                </div>
                <div class="col-lg-2 col-xl-2">
                    <select class="form-select" aria-label="Default select example">
                        <option selected="">All Categories</option>
                        <option value="1">Uncategoried</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="55%">Title</th>
                                    <th>Author</th>
                                    <th>Categories</th>
                                    <th>Tags</th>
                                    <th>Date</th>
                                    <th width="15%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><input type="checkbox"/></th>
                                    <td>Dnet conducted extensive study on social media-based women businesses</td>
                                    <td>admin</td>
                                    <td>Uncategoried Health</td>
                                    <td>Lifestyle, Health</td>
                                    <td>Published: 2021/06/10 at 6:29 am</td>
                                    <td>
                                        <a href="" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="" class="btn btn-danger sm rh-btn" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                   </td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox"/></th>
                                    <td>Dnet conducted extensive study on social media-based women businesses</td>
                                    <td>admin</td>
                                    <td>Uncategoried Health</td>
                                    <td>Lifestyle, Health</td>
                                    <td>Published: 2021/06/10 at 6:29 am</td>
                                    <td>
                                        <a href="" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="" class="btn btn-danger sm rh-btn" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                   </td>
                                </tr>
                                <tr>
                                    <th scope="row"><input type="checkbox"/></th>
                                    <td>Dnet conducted extensive study on social media-based women businesses</td>
                                    <td>admin</td>
                                    <td>Uncategoried Health</td>
                                    <td>Lifestyle, Health</td>
                                    <td>Published: 2021/06/10 at 6:29 am</td>
                                    <td>
                                        <a href="" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="" class="btn btn-danger sm rh-btn" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                   </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection
