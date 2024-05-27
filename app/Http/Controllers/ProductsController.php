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
            'nameInput' => 'required',
            'descriptionInput' => 'required',
            'stokInput' => 'required',
            'hargaInput' => 'required',
            'categoryInput' => 'required'
        ]);

        Products::create([
            'nama_produk' => $request->nameInput,
            'description_produk' => $request->descriptionInput,
            'stok_produk' => $request->stokInput,
            'harga_produk' => $request->hargaInput,
            'category_id' => $request->categoryInput
        ]);

        return to_route('produk.index')->with('success', 'Produk berhasil ditambahkan');
    }

            
    public function edit(Products $product){
        
    }

    public function destroy(Products $product){
        $productName = $product->nama_produk;

        $product->delete();
        return to_route('produk.index')->with('deleteSuccess', "Produk '$productName' Berhasil di Delete ");
    }
}
