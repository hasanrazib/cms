<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // view all
    public function viewAllPost(){

        return view('backend.moduels.post.view_all_posts');
    }

    // add page
    public function addPost(){

        return view('backend.moduels.post.add_post');
    }


}
