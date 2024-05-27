<?php

namespace App\Http\Controllers;


use APP\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login',[
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request){ 

        $validate = $request->validate([
            'username' => 'required|min:3|max:30',
            'password' => 'required',
        ]);

        if(Auth::attempt($validate)){
            $request->session()->put('admin_name',$request->username);

            return redirect()->intended('dashboard');
        }

        return back()->with('loginFailed','Invalid Credentials');
    }
}
