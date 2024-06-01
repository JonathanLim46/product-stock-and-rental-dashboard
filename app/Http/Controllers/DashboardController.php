<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rental;
use App\Models\Products;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $rental = Rental::with(['pelanggan','detil_rental'])->get();
        $produk = Products::with('category')->get();
        $pelanggan = Pelanggan::all();
        return view('dashboard_view.utama',[
            'title' => 'Dashboard',
            'rental' => $rental,
            'produk' => $produk,
            'pelanggan' => $pelanggan
        ]);
    }

    public function test(){
        $users = User::all();
        return view('test',[
            'users' =>$users 
        ]);
    }
}
