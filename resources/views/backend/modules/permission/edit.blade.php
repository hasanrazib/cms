@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="page-title-box">
                    <h4 class="title-default display-inline mr-15">Edit Module</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('permissions.update',$permission)}}" method="POST" enctype="multipart/form-data">

                        @csrf @method('PUT')
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Select Module</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="module_id">
                                    <option selected="">Select a Module</option>
                                    @foreach($modules as $module)
                                    <option value="{{$module->id??''}}" {{$module->id == $permission->module_id ? 'selected':''}}>{{$module->module_name??''}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Permission Name</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-sm" type="text"  name="name" value="{{$permission->name??''}}">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                        <!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->



@endsection

