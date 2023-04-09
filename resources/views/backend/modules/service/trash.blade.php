@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="page-title-box">
                <h4 class="title-default display-inline mr-15">All Services</h4>
                <a href="{{url('services/create')}}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 mb-20">
            <div class="rh-links">
                <ul>
                    <li><a href="{{route('services.index')}}" class="active">All ({{$services_count}}) | </a></li>
                    <li><a href="{{route('trash.list')}}"> Trash ({{$trash_services->count()}})</a></li>
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
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th width="55%">Title</th>
                                    <th>Categories</th>
                                    <th>Date</th>
                                    <th width="30%">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse($trash_services as $item)
                                
                                <tr style="opacity:.7">
                                    <th scope="row"><input type="checkbox"/></th>
                                    <td>{{$item->title??''}}</td>
                                    <td>
                                        @foreach ($item->categories as $category)
                                        {{ $category->name}}<br>
                                        @endforeach
                                    </td>
                                    <td>Published at {{$item->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('restore.service', $item->id)}}" class="btn btn-info sm rh-btn">Restore</a>
                                        <form action="{{route('services.destroy',$item)}}" method="POST" class="d-inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" id="delete" class="btn btn-danger sm rh-btn">Permanent Delete</button>
                                         </form>
                                    </td>
                                </tr>
                                @empty
                                <td>No data found</td>
                                @endforelse
                            </tbody>
                        </table>
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
        </div>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->

@endsection
