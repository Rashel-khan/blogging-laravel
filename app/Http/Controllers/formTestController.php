<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class formTestController extends Controller
{

    public function index(Request $request)
    {
        $permission = Permission::get();
        return view('form',compact('permission'))
            ->layout('layouts.dash');
    }

    public function store(Request $request)
    {
//        dd($request->input('permission'));
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);


        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('admin.roles.index')
            ->with('success','Role created successfully');
    }
}
