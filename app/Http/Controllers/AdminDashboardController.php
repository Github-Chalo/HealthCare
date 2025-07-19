<?php

namespace App\Http\Controllers;

use App\Models\sensordata;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function dashboard(){
        return view('admin.index');
    }
    public function users(){
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->adreno_no = $request->input('adreno_no');
        $user->save();

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.users')->with('success', 'User deleted successfully');
}


public function results($id){
    $user = User::findOrFail($id);
    $sensordata = sensordata::where('adreno_no', $user->adreno_no)->get();
    return view('admin.results', compact( 'sensordata', 'user'));
}
}
