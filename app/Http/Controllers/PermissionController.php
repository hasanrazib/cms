<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use App\Models\Module;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $permissions = Permission::latest('id')->get()??'';

        return view('backend.modules.permission.index',['permissions' => $permissions??'']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules = Module::all()??'';

        return view('backend.modules.permission.create',['modules'=>$modules??'']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //
        $names = explode(',',$request->name??'');

        if(!empty($names)){
            foreach ($names as $name){
                $permission =  Permission::create([
                    'module_id'   =>  $request->module_id??'',
                    'name'        =>  Str::slug($name)??'',
                ]);
            }

        }
     return redirect('permissions')->with('message','Inserted successfully !!');
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
        $permission = Permission::find($id);
        $modules = Module::all();

        return view('backend.modules.permission.edit', compact('permission','modules'));
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
        Permission::where('id',$id)->update([
            'module_id'   =>  $request->module_id??'',
            'name'          =>  $request->name??'',
        ]);

        return redirect('permissions')->with('messege','Data updated successfully !!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Permission::findOrFail($id)->delete();

        return redirect('permissions')->with('messege','Deleted succesfully');

    }
}
