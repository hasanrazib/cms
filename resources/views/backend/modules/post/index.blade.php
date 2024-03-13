@extends('backend.admin_master')
@section('admin')


<div class="page-content "> <!-- start:: Main Content -->
    <div class="container-fluid"><!-- start:Container -->

    <!-- start page title -->
    <div class="row">
        <div class="col-xl-4">
            <div class="page-title-box">
                <h4 class="title-default display-inline mr-15">All Posts</h4>
                <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Add New</a>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-12 col-xl-12 mb-20">
            <!-- Add your filters or bulk actions here if needed -->
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" name="" id="select_all_ids" /></th>
                                    <th width="45%">Title</th>
                                    <th width="15%">Categories</th>
                                    <th width="10%">Status</th>
                                    <th width="15%">Date</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($posts as $post)
                                <tr id="post_ids_{{$post->id}}">
                                    <th scope="row"><input type="checkbox" class="checkbox_ids" name="ids" value="{{$post->id}}"/></th>
                                    <td>{{$post->title ?? ''}}</td>
                                    <td>
                                        @foreach ($post->categories as $category)
                                        -{{ $category->name}}<br>
                                        @endforeach
                                    </td>
                                    <td>
                                        @if($post->status == 1)
                                        <span class="badge bg-success">Active</span>
                                        @else
                                        <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>Published at {{$post->updated_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-success sm rh-btn" title="View"><i class=" fas fa-eye"></i></a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info sm rh-btn" title="Edit Data"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="delete" class="btn btn-danger sm rh-btn"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <td colspan="6">No posts found</td>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Pagination -->
                <!-- Add your pagination links here if needed -->
            </div>
        </div>
    </div> <!-- end:Container -->
</div> <!-- end:: Main Content -->
@endsection

@section('scripts')
<script>
$(function(e){

    $("#select_all_ids").click(function(){

        $('.checkbox_ids').prop('checked',$(this).prop('checked'));
        
    });

});
</script>
@endsection
