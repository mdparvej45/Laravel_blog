<?php

namespace App\Http\Controllers\backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    //Add role method
    public function addRoles()
    {   
        $roles = Role::where('name', '!=', 'admin')->get();   
        return view('backend.roleandpermession.role', compact('roles'));
    }
    //Store role method
    public function storeRoles(Request $request)
    {
        $request->validate([
            'role_name' => 'required|min:5|unique:roles,name'

        ]);
        $role = new Role();
        $role->name = Str::lower(Str::slug($request->role_name));
        $role->save();
        return redirect()->back();
    }
    //Edit role method
    public function editRoles($id){
        $role = Role::where('id', $id)->first();
        return view('backend.roleandpermession.editrole', compact('role'));
    }
}
