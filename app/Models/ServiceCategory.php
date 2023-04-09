<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

   
    public static function tree(){

        $allCategories = ServiceCategory::get();

        $rootCategories = $allCategories->whereNull('parent_id');

        self::formatTree($rootCategories,$allCategories);
      
        return $rootCategories;

    }


    public static function formatTree($categories,$allCategories){

        foreach($categories as $category){

            $category->children = $allCategories->where('parent_id',$category->id)->values();

            if($category->children->isNotEmpty()){
                self::formatTree($category->children, $allCategories);
            }
           
        
        }

    }



// slug


protected static function boot()
{
    parent::boot();
    static::created(function ($serviceCategory) {
        $serviceCategory->slug = $serviceCategory->generateSlug($serviceCategory->name);
        $serviceCategory->save();
    });
}

private function generateSlug($name)
{
    if (static::whereSlug($slug = Str::slug($name))->exists()) {
        $max = static::wherename($name)->latest('id')->skip(1)->value('slug');
        if (isset($max[-1]) && is_numeric($max[-1])) {
            return preg_replace_callback('/(\d+)$/', function($mathces) {
                return $mathces[1] + 1;
            }, $max);
        }
        return "{$slug}-2";
    }
    return $slug;
} 


public function services(){
    
    return $this->belongsToMany(Service::class);
}

}
