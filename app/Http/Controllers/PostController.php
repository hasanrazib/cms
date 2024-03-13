<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Image;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with('categories')->latest()->get();
        //$trash_count = Post::onlyTrashed()->with('categories')->latest()->count();

        return view('backend.modules.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PostCategory::tree(); 
        return view('backend.modules.post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Post;
        $data->title  = $request->title;

        if ($request->post_category_id) {
            foreach ($request->post_category_id as $v){
                $post_category_id[] = $v;
                $data->post_category_id  = implode(',', $post_category_id);
            }
        }

        $data->short_description  = $request->short_description;
        $data->description  = $request->description;

        if ($request->file('featured_image')) {
            $image = $request->file('featured_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(555,323)->save('upload/posts/'.$name_gen);
            $featured_image_url = 'upload/posts/'.$name_gen;
            $data->featured_image  = $featured_image_url;
        }

        if ($request->file('page_banner')) {
            $image = $request->file('page_banner');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(1920,450)->save('upload/posts/'.$name_gen);
            $page_banner_image_url = 'upload/posts/'.$name_gen;
            $data->page_banner  = $page_banner_image_url;
        }

        $data->status  = $request->status;
        $data->order_by  = $request->order_by;
        $data->page_title  = $request->page_title;
        $data->banner_text  = $request->banner_text;
        $data->created_by  =  Auth::user()->id;
        $data->created_at  = Carbon::now();
        $data->save();

        $data->categories()->attach($request->post_category_id);
    
        return response()->json([
            'status' => 200,
            'message' => 'Post Created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = PostCategory::tree(); 
        $post_post_categories =  DB::table('post_post_category')->where('post_id',$post->id)->get();
        return view('backend.modules.post.edit',compact('categories','post','post_post_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->short_description  = $request->short_description;
        $post->description  = $request->description;

        if ($request->file('featured_image')) {
            $image = $request->file('featured_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(555,323)->save('upload/posts/'.$name_gen);
            $featured_image_url = 'upload/posts/'.$name_gen;
            $post->featured_image  = $featured_image_url;
        }

        if ($request->file('page_banner')) {
            $image = $request->file('page_banner');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            unlink(public_path($post->page_banner));
            Image::make($image)->resize(1920,450)->save('upload/posts/'.$name_gen);
            $page_banner_image_url = 'upload/posts/'.$name_gen;
            $post->page_banner  = $page_banner_image_url;
        }

        $post->status  = $request->status;
        $post->order_by  = $request->order_by;
        $post->page_title  = $request->page_title;
        $post->banner_text  = $request->banner_text;
        $post->updated_by  =  Auth::user()->id;
        $post->updated_at  = Carbon::now();
        $post->update();

        $post->categories()->sync($request->post_category_id);
        
        $notification = array(
            'message' => 'Post Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect('posts')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully', 
            'alert-type' => 'error'
        );

        return redirect('posts')->with($notification);
    }

    public function deleteAll(Request $request){

        $ids = $request->ids;

        Post::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"Deleted Successfully"]);
    }


    // trash list
    public function trashList(){

        $trash_posts = Post::onlyTrashed()->with('categories')->latest()->get();
        $posts_count = Post::with('categories')->latest()->count();

        return view('backend.modules.post.trash',compact('trash_posts','posts_count'));

    }

    // restore posts
    public function restorePost($id){

        Post::withTrashed()->findOrFail($id)->restore();

        $notification = array(
            'message' => 'Post Restored Successfully', 
            'alert-type' => 'success'
        );

        return redirect('posts')->with($notification);

    }

    // permanent delete
    public function pdeletePost($id){

        Post::onlyTrashed()->findOrFail($id)->forceDelete();

        $notification = array(
            'message' => 'Post Deleted Permanently', 
            'alert-type' => 'error'
        );

        return redirect('posts')->with($notification);
    }
}
