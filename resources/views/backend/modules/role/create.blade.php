@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

        <!-- start page title -->
        <div class="row">
            <div class="col-xl-4">
                <div class="page-title-box">
                    <h4 class="title-default display-inline mr-15">Create Role</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <form action="{{route('roles.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Role Name</label>
                            <div class="col-sm-10">
                                <input class="form-control form-control-sm" type="text"  name="name" id="example-text-input" value="{{old('name')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div>
                                <h5 class="font-size-14 mb-4">Assign Permissons for the role:</h5>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="select-all">
                                    <label class="form-check-label" for="formCheck1">
                                        Select All
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            @forelse($modules as $module)
                            <div class="col-3 rh-card">
                                <h5 class="font-size-14 mb-4">{{$module->module_name}}:</h5>
                                @foreach($module->permissions as $key=>$permission)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}">
                                    <label class="form-check-label" for="formCheck1">
                                        {{$permission->name ??''}}
                                    </label>
                                </div>
                                @endforeach
                            </div>
                            @empty
                            @endforelse
                        </div>
                        <!-- end row -->
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>
                        <!-- end row -->
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
            </form>
        </div>
        <!-- end row -->

    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->
@endsection


