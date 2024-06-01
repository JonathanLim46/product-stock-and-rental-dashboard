@extends('layout.dashboard')

@section('content')

<!-- Content Area -->
<main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Pelanggan | {{ date('Y-m-d H:i:s') }}</h4>
    </div>

    {{-- success --}}
    @if(session()->has('error'))
    <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center"
        role="alert">
        <strong>{{ session('error') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    {{-- end success --}}

    <div class="container rounded mt-3 p-4 shadow-lg" style="background-color: #ffffff;">
        <!-- Form Input -->
        <form method="POST" action="{{route('pelanggan.savedata')}}">
            @csrf
            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="{{old('nama_pelanggan', $pelanggan->nama_pelanggan ?? '')}}" required>
            </div>
            <div class="mb-3">
                <label for="alamat_pelanggan" class="form-label">Alamat Pelanggan</label>
                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" value="{{old('alamat_pelanggan', $pelanggan->alamat_pelanggan ?? '')}}" required>
            </div>
            <div class="mb-3">
                <label for="nomor_pelanggan" class="form-label">Nomor Pelanggan</label>
                <input type="number" class="form-control" id="nomor_pelanggan" name="nomor_pelanggan" value="{{old('nomor_pelanggan', $pelanggan->nomor_pelanggan ?? '')}}" required>
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

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
        const namaPelangganSelect = document.getElementById('nama_pelanggan');
        const alamatPelangganInput = document.getElementById('alamat_pelanggan');
        const nomorPelangganInput = document.getElementById('nomor_pelanggan');

        namaPelangganSelect.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            alamatPelangganInput.value = selectedOption.getAttribute('data-address') || '';
            nomorPelangganInput.value = selectedOption.getAttribute('data-phone') || '';
        });
    });
</script> --}}

</html>
