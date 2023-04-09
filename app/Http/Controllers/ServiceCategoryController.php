<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = ServiceCategory::tree(); 
        return view('backend.modules.service.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        
        $data = new ServiceCategory();
        $data->name  = $request->name;
        $data->description  = $request->description;
        $data->parent_id  = $request->parent_id;
      
        if ($request->file('category_image')) {
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(200,200)->save('upload/services/service_category/'.$name_gen);
            $category_image_url = 'upload/services/service_category/'.$name_gen;
            $data->category_image  = $category_image_url;
        }
        if ($request->file('banner_image')) {
            $image = $request->file('banner_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(1366,768)->save('upload/services/service_category/'.$name_gen);
            $banner_image_url = 'upload/services/service_category/'.$name_gen;
            $data->banner_image  = $banner_image_url;
        }
       
        $data->created_by  = Auth::user()->id;
        $data->created_at  = Carbon::now();
        $data->save();

    
        $notification = array(
            'message' => 'Service Category Created Succesfully', 
            'alert-type' => 'success'
        );


        return redirect('service-categories')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCategory  $serviceCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCategory $serviceCategory)
    {
        //
    }
}
