<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        $products = Products::with('category')->get();
        return view('dashboard_view.produk',[
            'products'=>$products,
            'title' => 'Products'
        ]);
    }

    public function create(Request $request){
        $request->validate([
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'stok_produk' => 'required',
            'harga_produk' => 'required',
            'category_id' => 'required'
        ]);

        $data = $request->nama_produk;
        $cekData = Products::where('nama_produk',$data)->value('id');

        if($cekData){
            return back()->with('error',"Produk '$data' sudah ada di daftar produk");
        }else{
            Products::create([
                'nama_produk' => $request->nama_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'stok_produk' => $request->stok_produk,
                'harga_produk' => $request->harga_produk,
                'category_id' => $request->category_id
            ]);    
        }

        return to_route('produk.index')->with('success', "Produk '$data' berhasil ditambahkan");
    }

    public function form(){
        $category = Category::all();
        return view('input_view.inputProduk',[
            'title' => 'Tambah Produk',
            'categories' => $category
        ]);
    }
            
    public function edit(Products $product){
        $category = Category::all();
        return view('input_view.inputProduk',[
            'title' => 'Tambah Produk',
            'categories' => $category,
            'product' => $product
        ]);
    }

    public function destroy(Products $product){
        $productName = $product->nama_produk;

        $product->delete();
        return to_route('produk.index')->with('deleteSuccess', "Produk '$productName' Berhasil di Delete ");
    }
}
