@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="page-title-box">
                <h4 class="title-default display-inline mr-15">Categories</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('service-categories.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-12 mb-3">
                            <label><strong>Name</strong></label>
                            <input class="form-control" type="text" name="name">
                            <p>The name is how it appears on your site.</p>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label><strong>Slug</strong></label>
                            <input class="form-control" type="text" name="slug">
                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label><strong>Parent Category</strong></label>
                            <select class="form-select" aria-label="Default select example" name="parent_id">
                                <option value="">None</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @foreach($category->children as $child)
                                <option class="rh-level-1" value="{{$child->id}}">{{$child->name}}</option>
                                @endforeach
                                @endforeach
                            </select>
                            <p>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</p>
                        </div>

                        <div class="col-sm-12 mb-3">
                            <label><strong>Description</strong></label>
                            <textarea class="form-control" rows="5" name="description"></textarea>
                            <p>The description is not prominent by default; however, some themes may show it.</p>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Add New Category</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="row mb-20">
                <div class="col-lg-6 col-xl-6">
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
                <div class="col-lg-6 col-xl-6">
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
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Descriptions</th>
                                    <th>Slugs</th>
                                    <th>Count</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr>
                                    <td><input type="checkbox"/></td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>0</td>
                                    <td>
                                        <a href="" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                        <a href="" class="btn btn-danger sm rh-btn" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                   </td>
                                </tr>
                                    <!-- level 2 -->
                                    @foreach($category->children as $child)
                                    <tr>
                                        <td><input type="checkbox"/></td>
                                        <td><i class="fas fa-minus"></i> {{$child->name}}</td>
                                        <td>{{$child->description}}</td>
                                        <td>{{$child->slug}}</td>
                                        <td>0</td>
                                        <td>
                                            <a href="" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            <a href="" class="btn btn-danger sm rh-btn" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                    </td>
                                    </tr>
                                        <!-- level 3 -->
                                        @foreach($child->children as $child2)
                                        <tr>
                                            <td><input type="checkbox"/></td>
                                            <td><i class="fas fa-minus"></i><i class="fas fa-minus"></i> {{$child2->name}}</td>
                                            <td>{{$child2->description}}</td>
                                            <td>{{$child2->slug}}</td>
                                            <td>0</td>
                                            <td>
                                                <a href="" class="btn btn-info sm rh-btn" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                                <a href="" class="btn btn-danger sm rh-btn" title="Delete Data" id="delete">  <i class="fas fa-trash-alt"></i> </a>
                                        </td>
                                        </tr>
                                        @endforeach
                                        <!-- level 3 -->
                                    @endforeach
                                    <!-- level 2 -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection
