<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceCategory;
use Image;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('categories')->latest()->get();
        $trash_count = Service::onlyTrashed()->with('categories')->latest()->count();

        return view('backend.modules.service.index',compact('services','trash_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ServiceCategory::tree(); 
        return view('backend.modules.service.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   // return $request;

        $data = new Service();
        $data->title  = $request->title;

        if ($request->service_category_id) {
            foreach ($request->service_category_id as $v){
                $service_category_id[] = $v;
                $data->service_category_id  = implode(',', $service_category_id);
            }
        }

        $data->short_description  = $request->short_description;
        $data->description  = $request->description;

        if ($request->file('featured_image')) {
            $image = $request->file('featured_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(555,323)->save('upload/services/'.$name_gen);
            $featured_image_url = 'upload/services/'.$name_gen;
            $data->featured_image  = $featured_image_url;
        }

        $data->slug  = $request->title;

        if ($request->file('page_banner')) {
            $image = $request->file('page_banner');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(1920,450)->save('upload/services/'.$name_gen);
            $page_banner_image_url = 'upload/services/'.$name_gen;
            $data->page_banner  = $page_banner_image_url;
        }

        $data->page_title  = $request->page_title;
        $data->banner_text  = $request->banner_text;
        $data->created_by  =  Auth::user()->id;
        $data->created_at  = Carbon::now();
        $data->save();

        $data->categories()->attach($request->service_category_id);

        
        

       
     

    
        $notification = array(
            'message' => 'Service Created Succesfully', 
            'alert-type' => 'success'
        );


        return redirect('services')->with($notification);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
       return "hi";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        $notification = array(
            'message' => 'Service Deleted Succesfully', 
            'alert-type' => 'error'
        );


        return redirect('services')->with($notification);
        
    }

    public function deleteAll(Request $request){

       return $ids = $request->ids;

        Service::whereIn('id',$ids)->delete();

        return response()->json(["success"=>"Emmm"]);
    }


    // trash list
    public function trashList(){

        $trash_services = Service::onlyTrashed()->with('categories')->latest()->get();
        $services_count = Service::with('categories')->latest()->count();

        return view('backend.modules.service.trash',compact('trash_services','services_count'));

    }

    // restore services
    public function restoreService($id){

        Service::withTrashed()->findOrFail($id)->restore();

        $notification = array(
            'message' => 'Service Restored Succesfully', 
            'alert-type' => 'success'
        );

        return redirect('services')->with($notification);

    }

    // permanent delete
    public function pdeleteService($id){

        Service::onlyTrashed()->findOrFail($id)->forceDelete();

        $notification = array(
            'message' => 'Service Deleted Permanently', 
            'alert-type' => 'error'
        );

        return redirect('services')->with($notification);
    }




}
