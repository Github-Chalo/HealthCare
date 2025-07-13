<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function dashboard(){
        return view('admin.index');
    }
    public function users(){
        $users = \App\Models\User::all();
        return view('admin.users', compact('users'));
    }

    public function updateUser(Request $request, $id){
        $user = \App\Models\User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }
    public function deleteUser($id){
        $user = \App\Models\User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully');  
    }
}
