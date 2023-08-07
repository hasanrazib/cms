<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\ServiceTempGalleryImage;
use Illuminate\Support\Facades\DB;
use Image;


class ServiceTempGalleryImageController extends Controller
{
    
   public function store(Request $request){
   
    if(!empty($request->image)){

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        
        $tempImage = new ServiceTempGalleryImage();
        $tempImage->name = 'NULL';
        $tempImage->save();

        $imageName = $tempImage->id.'.'.$ext;
        $tempImage->name = $imageName;
        $tempImage->save();

        $image->move(public_path('upload/services/temp/'),$imageName);


        // create thumnail
        $sourcePath = public_path('upload/services/temp/'.$imageName);
        $destPath = public_path('upload/services/temp/thum/'.$imageName);
        $img = Image::make($sourcePath);
        $img->fit(200,200);
        $img->save($destPath);


        return response()->json([
            'status' => true,
            'image_id' => $tempImage->id,
            'name' => $imageName,
            'imagePath' => asset('upload/services/temp/thum/'.$imageName)
        ]);

    }




   } 
}
