<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function viewAllPost(){

        return view('backend.moduels.post.view_all_posts');
    }
}
