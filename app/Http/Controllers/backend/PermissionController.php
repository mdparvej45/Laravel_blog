<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    {   $permissions = Permission::where('id', $id)->first();
        return view('backend.roleandpermession.assignPermission', compact('permissions'));
    }
}
