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

    // public function destroy(User $admins){
    //     $admin = $admins->username;
    //     $admins->delete();

    //     return to_route('admin.index')->with('deleteSuccess', "Data Admin : '$admin' Berhasil di Delete ");
    // }
}
