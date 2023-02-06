<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasRoles, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'user_email',
        'user_mobile',
        'user_type',
        'user_status',
        'user_image',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // user create: form validation
    public static function userCheckValidation($request){

        $request->validate([

            'username' => 'required|unique:users',
            'user_email' => 'required|unique:users',
            'role_id'   =>  'required|array',
            'password' => 'required|min:6'

        ]);

    }

    // user create: store

    public static function userStore($request){

        $user = User::create([

            'username'      =>$request->username??'',
            'first_name'    =>$request->first_name??'',
            'last_name'     =>$request->last_name??'',
            'user_email'    =>$request->user_email??'',
            'user_mobile'   =>$request->user_mobile??'',
            'user_type'     =>$request->user_type??'',
            'user_status'   =>$request->user_status,
            'user_image'    =>$request->user_image??'',
            'password'      => Hash::make($request->password)??''

        ]);

        $user->assignRole($request->input('role_id'));

        return $user;

    }

    public static function userUpdateCheckValidation($request){

        $request->validate([
            'username' => 'required|unique:users',
            'user_email' => 'required|unique:users',
            'role_id'   =>  'required|array',
            'password' => 'required|min:6'
        ]);
    }

    // update user
    public static function updateUserInfo($request,$user){

        $data  = User::update([
            'username'      =>$request->username??'',
            'first_name'    =>$request->first_name??'',
            'last_name'     =>$request->last_name??'',
            'user_email'    =>$request->user_email??'',
            'user_mobile'   =>$request->user_mobile??'',
            'user_type'     =>$request->user_type??'',
            'user_status'   =>$request->user_status,
            'user_image'    =>$request->user_image??'',
        ]);

        $user->assignRole($request->input('role_id'));

        return $data;
    }


}
