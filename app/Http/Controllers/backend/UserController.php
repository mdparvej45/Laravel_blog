<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //add user method
    public function addUsers()
    {   
        $roles = Role::where('name', '!=', 'user')->get();
       return view('backend.users.addUser', compact('roles'));
    }
    //store user method
    public function storeUsers(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'confirm_password' => 'required|min:8|same:password'
        ],
        [
            'role.required' => 'Please select a role.'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->assignRole($request->role);
        $user->save();
        return back();
    }
    //Show all employeee mehtod
    public function allEmployee()
    {   $users = User::with('roles')->get();
        $authUser = Auth::user();
        return view('backend.users.allEmployees', compact('users', 'authUser'));
    }

    //Bann and active user change method 
    public function bannEmployee($id)
    {
        $assinStatus = User::find($id);
        if($assinStatus->status == 1){
            $assinStatus->status = 0;
        }else{
            $assinStatus->status = 1;
        }
        $assinStatus->save();
        return back();
    }
}
