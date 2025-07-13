<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register(){
        return view('auth.register');
    }
    

    public function postRegister(Request $request){
        $request->validate([
            'fname' => 'required ',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required| confirmed | min:7'
        ]);
        $user = new User();
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success','A verification link has been send to '. $request->email . ' Please check your inbox to verify your email address for your AdventHealth Account');
    }


    public function login(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        $user = User::where('email', $request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                auth()->login($user);
                return redirect()->route('user.dashboard');
            }
            else{
                return back()->with('error', 'Invalid password');
            }
        }
        else{
            return back()->with('error', 'User not found');
        }
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login')->with('error','You have been logged out');
    }
    
}
