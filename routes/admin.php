<?php

use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

Route::resource('modules', ModuleController::class);
Route::resource('permissions', PermissionController::class);
Route::resource('roles', RoleController::class);
Route::resource('users', UserController::class);
