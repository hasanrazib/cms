<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function viewAllCategory(){

        return view('backend.moduels.category.view_all_categories');
    }
}
