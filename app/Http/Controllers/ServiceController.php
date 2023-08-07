<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Image;
use App\Models\User;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\ServiceGalleryImage;
use App\Models\ServiceTempGalleryImage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::with('categories')->orderBy('order_by')->latest()->get();
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

        $data = new Service;
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

        //$data->slug  = $request->title;

        if ($request->file('page_banner')) {
            $image = $request->file('page_banner');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(1920,450)->save('upload/services/'.$name_gen);
            $page_banner_image_url = 'upload/services/'.$name_gen;
            $data->page_banner  = $page_banner_image_url;
        }

        $data->status  = $request->status;
        $data->order_by  = $request->order_by;
        $data->page_title  = $request->page_title;
        $data->banner_text  = $request->banner_text;
        $data->created_by  =  Auth::user()->id;
        $data->created_at  = Carbon::now();
        $data->save();

        // gallery images 
        if(!empty($request->image_id)){
            $caption = $request->caption;
            foreach($request->image_id as $key => $imageId){

                $tempImage = ServiceTempGalleryImage::find($imageId);
                $extArray = explode('.',$tempImage->name);
                $ext = last($extArray);

                $serviceImage = new ServiceGalleryImage;
                $serviceImage->name = 'NULL';
                $serviceImage->service_id = $data->id;
                $serviceImage->caption = $caption[$key];
                $serviceImage->save();

                $newImageName = $serviceImage->id.'.'.$ext;
                $serviceImage->name = $newImageName;
                $serviceImage->save();


                // first thumnail 
                $sourcePath = public_path('upload/services/temp/'.$tempImage->name);
                $destPath = public_path('upload/services/gallery/small/'.$newImageName);
                $img = Image::make($sourcePath);
                $img->fit(350,300);
                $img->save($destPath);

                // second thumnail 
                $sourcePath = public_path('upload/services/temp/'.$tempImage->name);
                $destPath = public_path('upload/services/gallery/large/'.$newImageName);
                $img = Image::make($sourcePath);
                $img->resize(1200,null,function($constraint){$constraint->aspectRatio();});
                $img->save($destPath);
            }
        } // gallery images

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
        $categories = ServiceCategory::tree(); 
        $service_service_categories =  DB::table('service_service_category')->where('service_id',$service->id)->get();
        return view('backend.modules.service.edit',compact('categories','service','service_service_categories'));
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

        $service->title = $request->title;
        $service->short_description  = $request->short_description;
        $service->description  = $request->description;

        if ($request->file('featured_image')) {
            $image = $request->file('featured_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            Image::make($image)->resize(555,323)->save('upload/services/'.$name_gen);
            $featured_image_url = 'upload/services/'.$name_gen;
            $service->featured_image  = $featured_image_url;
        }

        $service->slug = Str::slug($request->slug);

        if ($request->file('page_banner')) {
            $image = $request->file('page_banner');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();  // 3434343443.jpg
            unlink(public_path($service->page_banner));
            Image::make($image)->resize(1920,450)->save('upload/services/'.$name_gen);
            $page_banner_image_url = 'upload/services/'.$name_gen;
            $service->page_banner  = $page_banner_image_url;
        }

        $service->status  = $request->status;
        $service->order_by  = $request->order_by;
        $service->page_title  = $request->page_title;
        $service->banner_text  = $request->banner_text;
        $service->updated_by  =  Auth::user()->id;
        $service->updated_at  = Carbon::now();
        $service->update();

        $service->categories()->sync($request->service_category_id);
        
        $notification = array(
            'message' => 'Service Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect('services')->with($notification);
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

        $ids = $request->ids;

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
