<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

Route::resource('modules', ModuleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
