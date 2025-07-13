<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;
use App\Models\Sensordata;

class UserDashboardController extends Controller
{
    public function dashboard(){
        return view('user.index');
    }
    public function findCare(){
        return view('user.findCare');
    }
    public function tests(){
        $users=User::all();
        return view('user.tests', compact('users'));
    }
    public function visits(){
        return view('user.visits');
    }
    public function testInfo(){
        $user=Auth::user();
        $sensordata = Sensordata::where('adreno_no', $user->adreno_no)->get();
        return view('user.testInfo', compact('user', 'sensordata'));
    }
}
