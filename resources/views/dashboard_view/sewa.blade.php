@extends('layout.dashboard')

@section('content')

<!-- Content Area -->
<main class="flex-grow-1 p-4">
  
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Sewa | Data Terbaru Saat : {{ date('Y-m-d H:i:s') }}</h4>
        <a href="{{route('rental.form')}}"><button class="btn btn-success btn-block"><b>+ NEW DATA</b></button></a>
    </div>

    {{-- success --}}
    @if(session()->has('deleteSuccess'))
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center"
        role="alert">
        <strong>{{ session('deleteSuccess') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- end success --}}

    {{-- success --}}
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center"
        role="alert">
        <strong>{{ session('success') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- end success --}}

    <div class="container rounded mt-3 p-4 shadow-lg" style="background-color: #ffffff;">
        <table id="myTable" class="table table-bordered table-hover data-table display">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat Pelanggan</th>
                    <th>Nomor Pelanggan</th>
                    <th>Rental Awal</th>
                    <th>Rental Akhir</th>
                    <th>Status Rental</th>
                    <th>Total Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $rental->pelanggan->nama_pelanggan }}</td>
                    <td>{{ $rental->pelanggan->alamat_pelanggan }}</td>
                    <td>{{ $rental->pelanggan->nomor_pelanggan }}</td>
                    <td>{{ $rental->rental_awal }}</td>
                    <td>{{ $rental->rental_akhir }}</td>
                    <td>
                        @if($rental->rental_akhir->isFuture())
                        MASA SEWA
                        @else
                        TIDAK MASA SEWA
                        @endif
                    </td>
                    <td>
                        @php
                        $total_barang = 0;
                        foreach ($rental->detil_rental as $detil) {
                        $total_barang += $detil->total_barang;
                        }
                        echo $total_barang;
                        @endphp
                    </td>
                    <td>
                        <button class="btn btn-warning btn-sm">Edit</button>
                        <form method="post" action="{{ route('rental.delete', ['rental' => $rental]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</main>
<!-- End Content Area -->

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/02c07b0853.js" crossorigin="anonymous"></script>

</html>
