<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;


// Services Controller
Route::controller(ServiceController::class)->group(function () {
    Route::get('/services/trash', 'trashList')->name('trash.list');
    Route::get('/services/restore/{id}', 'restoreService')->name('restore.service');
    Route::get('/services/permanent-delete/{id}', 'pdeleteService')->name('pdelete.service');
});

Route::resource('modules', ModuleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
Route::resource('services', ServiceController::class);
Route::resource('service-categories', ServiceCategoryController::class);


