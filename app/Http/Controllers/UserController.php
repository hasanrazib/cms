<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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


        User::userCheckValidation($request);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findORFail($id);

        return view('backend.modules.user.edit',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $user)
    {
        User::userUpdateCheckValidation($request);

        $update_data = User::updateUserInfo($request,$id);

        if($update_data){
            return redirect('users')->with(['message'=>'Update Successfully!!','alert-type'=>'info']);
        }else{
            return back()->with(['message'=>'Something went to wrong ??','alert-type'=>'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect('users')->with(['message'=>'Data Deleted Successfully!!','alert-type'=>'danger']);

    }

}
