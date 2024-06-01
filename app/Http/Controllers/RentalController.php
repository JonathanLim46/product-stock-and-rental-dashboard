<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\Category;
use App\Models\Products;
use App\Models\Pelanggan;
use App\Models\Detil_Rental;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    public function index()
    {
        $rentals = Rental::with(['pelanggan', 'detil_rental'])->get();

        return view('dashboard_view.sewa', [
            'title' => 'Laporan Rental',
            'rentals' => $rentals
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required',
            'alamat_pelanggan' => 'required',
            'nomor_pelanggan' => 'required',
            'rental_awal' => 'required|date',
            'rental_akhir' => 'required|date',
            'status_rental' => 'required|boolean',
            'product_id' => 'required',
            'total_barang' => 'required|integer|min:1'
        ]);

        $nama_pelanggan = $request->nama_pelanggan;

        $cekData = Pelanggan::where('id', $nama_pelanggan)->first();

        if (!$cekData) {
            return back()->with('error', "Pelanggan tidak ada pada daftar");
        }

        $validasiData = Rental::where('id_pelanggan', $cekData->id)->first();

        $product = Products::find($request->product_id);
        if (!$product) {
            return back()->with('error', "Produk tidak ditemukan");
        }

        // Periksa apakah stok mencukupi
        if ($product->stok_produk < $request->total_barang) {
            return back()->with('error', "Stok produk tidak mencukupi");
        }

        if ($validasiData) {
            $detil = new Detil_Rental();
            $detil->rental_id = $validasiData->id;
            $detil->produk_id = $request->product_id;
            $detil->total_barang = $request->total_barang;
            $detil->save();
        } else {
            $rental = new Rental();
            $rental->id_pelanggan = $cekData->id;
            $rental->rental_awal = $request->rental_awal;
            $rental->rental_akhir = $request->rental_akhir;
            $rental->status_rental = $request->status_rental;
            $rental->save();

            $detil = new Detil_Rental();
            $detil->rental_id = $rental->id;
            $detil->produk_id = $request->product_id;
            $detil->total_barang = $request->total_barang;
            $detil->save();
        }

        // Kurangi stok produk
        $product->stok_produk -= $request->total_barang;
        $product->save();

        return redirect()->route('rental.index')->with('success', 'Data rental berhasil ditambahkan.');
    }

    public function form()
    {
        $pelanggans = Pelanggan::all();
        $categories = Category::with('products')->get();
        $product = Products::all();
        $rentals = Rental::with('detil_rental')->get();

        return view('input_view.store', [
            'title' => 'Laporan Rental',
            'categories' => $categories,
            'pelanggans' => $pelanggans,
            'product' => $product,
            'rentals' => $rentals
        ]);
    }

    public function destroy(Rental $rental)
    {
        $rentalName = $rental->pelanggan->nama_pelanggan;

        $rental->delete();
        return redirect()->route('rental.index')->with('deleteSuccess', "Status Rental :  '$rentalName' Berhasil di Delete ");
    }
}

