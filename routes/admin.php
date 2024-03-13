<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServiceTempGalleryImageController;
use App\Http\Controllers\ServiceGalleryImageController;




// Services Controller
Route::controller(ServiceController::class)->group(function () {
    Route::get('/services/trash', 'trashList')->name('trash.list');
    Route::get('/services/restore/{id}', 'restoreService')->name('restore.service');
    Route::get('/services/permanent-delete/{id}', 'pdeleteService')->name('pdelete.service');
    Route::delete('/services/delete-all', 'deleteAll')->name('delete.all');
});

// Posts Controller
Route::controller(PostController::class)->group(function () {
    Route::get('/posts/trash', 'trashList')->name('trash.list');
    Route::get('/posts/restore/{id}', 'restorePost')->name('restore.post');
    Route::get('/posts/permanent-delete/{id}', 'pdeletePost')->name('pdelete.post');
    Route::delete('/posts/delete-all', 'deleteAll')->name('delete.all');
});


Route::resource('modules', ModuleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('posts', PostController::class);
Route::resource('post-categories', PostCategoryController::class);
Route::resource('services', ServiceController::class);
Route::resource('service-categories', ServiceCategoryController::class);


Route::post('/temp-images',[ServiceTempGalleryImageController::class,'store'])->name('temp-images.create');