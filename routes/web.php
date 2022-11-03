<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});




// Post Controller
Route::controller(PostController::class)->group(function () {
    //Route::post('/district/insert', 'insertDistrict')->name('insert.district');
   // Route::get('/district/edit/{id}','editDistrict')->name('edit.district');
   // Route::post('/district/update/','updateDistrict')->name('update.district');
    //Route::get('/district/delete/{id}','deleteDistrict')->name('delete.district');
    Route::get('/posts/all', 'viewAllPost')->name('view.all.posts');



});

Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')->name('about.page')->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');

});


 // Admin All Route
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout', 'destroy')->name('admin.logout');
    Route::get('/admin/profile', 'Profile')->name('admin.profile');
    Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
    Route::post('/store/profile', 'StoreProfile')->name('store.profile');

    Route::get('/change/password', 'ChangePassword')->name('change.password');
    Route::post('/update/password', 'UpdatePassword')->name('update.password');

});








Route::get('/dashboard', function () {
    return view('backend.index');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// Route::get('/contact', function () {
//     return view('contact');
// });
