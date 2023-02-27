<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    //Permission add method
    public function addPermission()
    {
        $permissions = Permission::latest()->get();
        return view('backend.roleandpermession.addpermission', compact('permissions'));
    }
    //Assign permission method
    public function assignPermission($id)  
    {   $selectRole = Role::with('permissions')->where('id', $id)->first();
    
        $hasPermissions = $selectRole->permissions->pluck('id');
        // dd(in_array(1,array( $hasPermissions)));
        $permissions = Permission::latest()->get();
        return view('backend.roleandpermession.assignPermission', compact('selectRole', 'permissions', 'hasPermissions'));
    }
    //added permission method
    public function addedPermission(Request $request, $id)
    {
        $role = Role::with('users')->find($id);
        $role->syncPermissions($request->permissions);
        return back();
    }
}
