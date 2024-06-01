@extends('layout.dashboard')

@section('content')

<!-- Content Area -->
<main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Sewa | Data Terbaru Saat : {{ date('Y-m-d H:i:s') }}</h4>
    </div>

    {{-- success --}}
    @if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-between align-items-center"
        role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- end success --}}

    <div class="container rounded mt-3 p-4 shadow-lg" style="background-color: #ffffff;">
        <!-- Form Input -->
        <form method="POST" action="{{ route('rental.store') }}">
            @csrf
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <select class="form-select" id="nama_pelanggan" name="nama_pelanggan" required>
                    <option value="" disabled selected>Pilih Pelanggan</option>
                    @foreach($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}" 
                                data-address="{{ $pelanggan->alamat_pelanggan }}" 
                                data-phone="{{ $pelanggan->nomor_pelanggan }}">{{ $pelanggan->nama_pelanggan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" readonly="readonly" required>
            </div>
            <div class="mb-3">
                <label for="nomor_pelanggan" class="form-label">Nomor Pelanggan</label>
                <input type="text" class="form-control" id="nomor_pelanggan" name="nomor_pelanggan" readonly="readonly" required>
            </div>
            <div class="mb-3">
                <label for="rental_awal" class="form-label">Rental Awal</label>
                <input type="date" class="form-control" id="rental_awal" name="rental_awal" required>
            </div>
            <div class="mb-3">
                <label for="rental_akhir" class="form-label">Rental Akhir</label>
                <input type="date" class="form-control" id="rental_akhir" name="rental_akhir" required>
            </div>
            <div class="mb-3">
                <label for="status_rental" class="form-label">Status Rental</label>
                <select class="form-select" id="status_rental" name="status_rental" required>
                    <option value="1">MASA SEWA</option>
                    <option value="0">TIDAK MASA SEWA</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="product_id" class="form-label">Produk Sewa</label>
                <select class="form-select" id="product_id" name="product_id" required>
                    <option value="" disabled selected>Pilih Produk</option>
                    @foreach($product as $products)
                        <option value="{{ $products->id }}">{{$products->nama_produk}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="total_barang" class="form-label">Kuantitas Barang</label>
                <input type="number" class="form-control" id="total_barang" name="total_barang" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</main>
<!-- End Content Area -->

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://kit.fontawesome.com/02c07b0853.js" crossorigin="anonymous"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const namaPelangganSelect = document.getElementById('nama_pelanggan');
        const alamatPelangganInput = document.getElementById('alamat_pelanggan');
        const nomorPelangganInput = document.getElementById('nomor_pelanggan');
        const rentalAwalInput = document.getElementById('rental_awal');
        const rentalAkhirInput = document.getElementById('rental_akhir');
        const statusRentalSelect = document.getElementById('status_rental');

        // Preload all rental data
        const rentals = @json($rentals);

        namaPelangganSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
           
            alamatPelangganInput.value = selectedOption.getAttribute('data-address') || '';
            nomorPelangganInput.value = selectedOption.getAttribute('data-phone') || '';

            const rentalData = rentals.find(rental => rental.id_pelanggan == selectedOption.value);

            if (rentalData) {
                rentalAwalInput.value = rentalData.rental_awal || '';
                rentalAkhirInput.value = rentalData.rental_akhir || '';
                statusRentalSelect.value = rentalData.status_rental ? '1' : '0';
            } else {
                rentalAwalInput.value = '';
                rentalAkhirInput.value = '';
                statusRentalSelect.value = '1';
            }
        });
    });
</script>

</html>
