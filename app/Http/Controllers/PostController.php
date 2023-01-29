<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // view all
    public function viewAllPost(){

        return view('backend.modules.post.view_all_posts');
    }

    // add page
    public function addPost(){

        return view('backend.modules.post.add_post');
    }


}
