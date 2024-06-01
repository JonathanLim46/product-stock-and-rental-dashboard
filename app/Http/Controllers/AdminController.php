<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(){
        $user = User::all();
        return view('dashboard_view.admin',[
            'admin' => $user,
            'title' => 'Admin'
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);

        $data = $request->username;
        $cekData = User::where('username',$data)->value('id');
        if($cekData){
            return back()->with('error',"Data '$data' sudah ada");
        }else{
            User::create([
                'username' => $request->username,
                'password' => $request->password
            ]);
        }
        return to_route('admin.index')->with('success',"Data '$data' berhasil ditambahkan");
    }

    public function form(){
        return view('input_view.inputAdmin',[
            'title' => 'Admin'
        ]);
    }

    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('input_view.inputAdmin', compact('admin'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $admin = User::findOrFail($id);
        $admin->username = $request->username;
        $admin->password = bcrypt($request->password); 
        $admin->save();

        return redirect()->route('admin.index')->with('success', "Data '$admin->username' berhasil diedit");
    }

    // public function destroy(User $admins){
    //     $admin = $admins->username;
    //     $admins->delete();

    //     return to_route('admin.index')->with('deleteSuccess', "Data Admin : '$admin' Berhasil di Delete ");
    // }
}
