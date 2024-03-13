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
        <form action="{{ route('posts.store') }}" name="postForm" id="postForm" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-lg-9 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <div class="col-sm-12">
                                <input class="form-control" type="text" placeholder="Add Title" name="title">
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
                                            <div class="col-sm-12 mb-3">
                                                <label class="col-form-label">Page Banner</label>
                                                <div class="col-sm-12">
                                                    <input name="page_banner" class="form-control" type="file"  id="page_banner">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <div class="col-sm-6">
                                                    <img class="image-resize-backend" id="show_page_banner" src="{{url('upload/no_image.jpg') }}" alt="Image">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label class="col-form-label">Page Title</label>
                                                <div class="col-sm-7">
                                                    <input class="form-control" type="text" name="page_title">
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <label class="col-form-label">Banner Text</label>
                                                <div class="col-sm-12">
                                                    <textarea  class="form-control" rows="3" name="banner_text"></textarea>
                                                </div>
                                            </div>
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
                        <!-- start: photo gallery -->
                        <div class="excerpt">
                            <div id="accordion" class="custom-accordion">
                                <div class="card">
                                    <a href="#photo_gallery" class="text-dark" data-bs-toggle="collapse"
                                                    aria-expanded="true"
                                                    aria-controls="collapseOne">
                                        <div class="card-header" id="headingOne">
                                            <h6 class="m-0">
                                                Photo Gallery
                                                <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                            </h6>
                                        </div>
                                    </a>
                                    <div id="photo_gallery" class="collapse"
                                            aria-labelledby="headingOne" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <div id="image" class="dropzone dz-clickable">
                                                <div class="dz-message needsclick">    
                                                    <br>Drop files here or click to upload.<br><br>                                            
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row" id="gallery_append"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: photo gallery -->
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
                                            <li><b>Status:</b><br>
                                            <fieldset>
                                                <input type="radio" name="status" value="1" checked>
                                                <label>Active</label><br>
                                                <input type="radio" name="status" value="0">
                                                <label>Inactive</label>
                                            </fieldset>
                                            <li>Order: <input class="form-control" type="text" name="order_by"></li>
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
                                       
                                        @forelse($categories as $category)
                                        <li><input class="" type="checkbox" name="post_category_id[]" value="{{$category->id}}">{{$category->name}}
                                            <ul>
                                                @foreach($category->children as $child)
                                                <li><input type="checkbox" name="post_category_id[]" value="{{$child->id}}"/>{{$child->name}}
                                                <ul>
                                                    @foreach($child->children as $child2)
                                                    <li><input type="checkbox" name="post_category_id[]" value="{{$child2->id}}"/>{{$child2->name}}
                                                    @endforeach
                                                </ul>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @empty
                                        <li><a href="{{url('post-categories')}}" style="color:#2F84EA">Add Categories</a></li>
                                        @endforelse
                                    </ul>
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
@section('scripts')
<script>
   Dropzone.autoDiscover = false;    
    const dropzone = $("#image").dropzone({ 
			uploadprogress: function(file, progress, bytesSent) {
         
    },
      url:  "{{ route('temp-images.create') }}",
      maxFiles: 10,
      paramName: 'image',
      addRemoveLinks: true,
      acceptedFiles: "image/jpeg,image/png,image/gif",
      headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
      }, success: function(file, response){

        var html = `<div class="col-xl-3">
                        <div class="card">
                            <img src="${response.imagePath}" alt="logo"/>
                            <input type="text" name="caption[]" value="" class="form-control"/>
                            <input type="hidden" name="image_id[]" value="${response.image_id}" class="form-control"/>
                        </div>
                    </div>`;
        $("#gallery_append").append(html);
        this.removeFile(file);            
      }
  });

  $("#postForm").submit(function(event){
     
    event.preventDefault();
        

        $.ajax({
            url:"{{ route('posts.store') }}",
            data:$(this).serializeArray(),
            method:'post',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            },
            success: function(response){
                toastr.success(response.message);
                window.location.href = "/posts"
            } // success end

        }); // ajax end

    }) // submit end

</script>
@endsection
