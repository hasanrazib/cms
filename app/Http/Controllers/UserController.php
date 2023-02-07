<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {

            $users = User::with('roles')->latest()->get();
            return view('backend.modules.user.index',compact('users'));

        }catch (Exception $ex){

            abort('403');

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()??'';
        return view('backend.modules.user.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::userValidationCheck($request);

        $save_data = User::userStore($request);

            if($save_data){
                return redirect('users')->with(['message'=>'User Created Successfully!!','alert-type'=>'info']);
            }else{
                return back()->with(['message'=>'Something went to wrong ??','alert-type'=>'error']);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('backend.modules.user.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        User::updateUserValidation($request,$user);

        $update_data =  User::updateUserInfo($request,$user);

        if($update_data){
            return redirect('users')->with(['message'=>'Data updated successfully !!.','alert-type'=>'info']);
        }else{
            return  back()->with(['message'=>'Something went to wrong ??','alert-type'=>'error']);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if(isset($user)){
            $user->delete();
            return redirect('users')->with(['message'=>'Data deleted successfully !!.','alert-type'=>'info']);
        }else{
            abort('403');
        }
    }
}
