@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="page-title-box">
                    <h4 class="title-default display-inline mr-15">Add New Module</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('permissions.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Module Name</label>
                            <div class="col-sm-10">
                                <select name="module_id" class="form-control">
                                    <option disabled selected> Select a Resource </option>
                                    @foreach($modules as $module)
                                        <option value="{{$module->id??''}}">{{$module->module_name??''}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       <div class="row mb-3">
                           <div class="form-group">
                               <label for="example-text-input" class="col-sm-2 col-form-label">Permission Name</label>
                               <input type="text" name="name" class="form-control" data-role="tagsinput" placeholder="Enter permission name . . ." />

                           </div>
                       </div>
                        <!-- end row -->

                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit"> Add Permission</button>
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


