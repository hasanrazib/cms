<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        
        return view('backend.modules.service.index',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('backend.modules.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $filename = '';
        if ($request->file('featured_image')) {
            $file = $request->file('featured_image');

            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/services'),$filename);
        }
       
        Service::create([

            'title'                 => $request->title,
            'service_category_id'   => $request->service_category_id,
            'short_description'     => $request->short_description,
            'description'           => $request->description,
            'featured_image'        => $filename,
            'slug'                  => $request->title,
            'created_by'            => Auth::user()->id,
            'created_at'            => Carbon::now()
        ]);

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
        //
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
        //
    }
}
