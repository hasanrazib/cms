<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Exception;
use Spatie\Permission\Models\Role;
use App\Models\Module;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $roles = Role::with('permissions')->latest('id')->get()??'';
            return view('backend.modules.role.index',compact('roles'));

        }catch (Exception $ex){

            return 'Caught exception :'.$ex->getMessage();

        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all()??'';
        return view('backend.modules.role.create',compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {

            $role = Role::create([
                'name' =>  $request->name??'',
            ]);

            $role->syncPermissions($request->input('permissions'));

            return redirect('roles')->with('message','Role Created successfully !!');

        }catch (Exception $ex){

            return 'Caught exception :'.$ex->getMessage();

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
        $modules = Module::all()??'';
        $role = Role::findOrFail($id);

        return view('backend.modules.role.edit',compact('modules','role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::where('id',$id)->first()??'';
        $data = Role::where('id',$id)->update([
            'name'           =>  Str::slug($request->name)??'',
        ]);

        $role->syncPermissions($request->input('permissions'));

        return redirect('roles')->with(['message'=>'Data updated successfully !!','alert-type'=>'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::findOrFail($id)->delete();

        return redirect('roles')->with('messege','Deleted succesfully');
    }
}
