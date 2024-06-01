@extends('layout.dashboard')

@section('content')
<div class="container-fluid mt-4">

    <h4 class="ps-3">Sewa Terkini</h4>
    
    <!-- CONTAINER CARD -->
    <div class="container">
      <ul class="cards">
        @foreach ($rental as $rentals)
        <!-- CARD -->
        <li class="card">
          <div>
            <h3 class="card-title">Status Sewa : 
                @if($rentals->rental_akhir->isFuture())
                MASA SEWA
                @else
                TIDAK MASA SEWA
                @endif
            </h3>
            <div class="card-content">
              <table>
                <tr>
                  <th>id sewa</th>
                  <td class="ps-2">:</td>
                  <td class="ps-2">{{$rentals->id}}</td>
                </tr>
                <tr>
                  <th>Nama Pelanggan</th>
                  <td class="ps-2">:</td>
                  <td class="ps-2">{{$rentals->pelanggan->nama_pelanggan}}</td>
                </tr>
                <tr>
                  <th>Alamat Pelanggan</th>
                  <td class="ps-2">:</td>
                  <td class="ps-2">{{$rentals->pelanggan->alamat_pelanggan}}</td>
                </tr>
                <tr>
                  <th>Rental Awal</th>
                  <td class="ps-2">:</td>
                  <td class="ps-2">{{$rentals->rental_awal}}</td>
                </tr>
                <tr>
                  <th>Rental Akhir</th>
                  <td class="ps-2">:</td>
                  <td class="ps-2">{{$rentals->rental_akhir}}</td>
                </tr>
              </table>
            </div>
          </div>
          <div class="card-link-wrapper">
            <a href="#myModal" class="card-link" data-bs-toggle="modal" data-bs-target="#myModal">Detil Produk</a>
          </div>
        </li>
        <!-- END CARD -->
        @endforeach

      </ul>
    </div>
    <!-- END CONTAINER CARD -->
    
    <div class="row d-flex justify-content-between ps-3">
      <div class="col-sm-6 col-lg-6">
        <h4>Stok Produk</h4>
        <div class="kartu w-100 bg-white shadow-sm">
          <table id="myTable" class="table table-bordered table-hover data-table display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Stok Barang</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk->sortBy('stok_produk') as $produks)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$produks->nama_produk}}</td>
                    <td>{{$produks->stok_produk}}</td>
                    <td>
                        @if($produks->stok_produk == 0)
                            HABIS
                        @elseif($produks->stok_produk < 10)
                            AKAN HABIS
                        @else
                            CUKUP
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="col-sm-6 col-lg-5">
        <h4>Total Laporan</h4>
        <div class="kartu w-75 bg-white shadow-sm">
          <ul class="pt-5 pb-5">
            <li class="center-content">
              <div class="icon-col">
                <i class="fa-solid fa-users fa-2x" style="color: #63E6BE;"></i>
              </div>
              <div class="text-col">
                Total Pelanggan<br>
                <span>{{$pelanggan->count()}}</span>
              </div>
            </li>
            <li class="center-content pt-5">
              <div class="icon-col">
                <i class="fa-solid fa-truck-moving fa-2x" style="color: #63E6BE;"></i>
              </div>
              <div class="text-col">
                Total Sewa<br>
                <span>{{$rental->count()}}</span>
              </div>
            </li>
            <li class="center-content pt-5">
              <div class="icon-col">
                <i class="fa-solid fa-box fa-2x" style="color: #63E6BE;"></i>
              </div>
              <div class="text-col">
                Total Barang Sewa<br>
                <span>{{ $rental->sum(function($rentals) { return $rentals->detil_rental->sum('total_barang'); }) }}</span>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
<!-- end content -->

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Produk Sewa <br> Pelanggan : {{$rentals->pelanggan->nama_pelanggan}}</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <table class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nama Produk</th>
              <th>Jumlah</th>
            </tr>
          </thead>
          <tbody>
            @foreach($rentals->detil_rental as $detil)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$detil->produk->nama_produk}}</td>
              <td>{{$detil->total_barang}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

@endsection