<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\RoleUser;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('isManagerOrSupervisor');
    }

    public function index(){
        $users = User::all();
        return view('back.user.index', compact('users'));
    }

    public function edit($id){
        $user = User::find($id);
        $roles = Role::all();
        return view('back.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $roleIds = $request->role_ids;
        $user->roles()->sync($roleIds);

        return redirect('/auth/users');
    }
    public function delete($id){
        $user = User::find($id);
        $user->delete();

        return back();
    }
}
