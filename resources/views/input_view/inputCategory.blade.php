@extends('layout.dashboard')

@section('content')

<!-- Content Area -->
<main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Buat Kategori</h4>
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
        <form method="POST" action="{{route('categories.store')}}">
            @csrf
            <div class="mb-3">
                <label for="categoryName" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="categoryName" name="categoryName" required>
            </div>
            <div class="mb-3">
                <label for="descriptionCategory" class="form-label">Deskripsi Kategori</label>
                <input type="text" class="form-control" id="descriptionCategory" name="descriptionCategory" required>
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
