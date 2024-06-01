@extends('layout.dashboard')

@section('content')

<!-- Content Area -->
<main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Produk | {{ date('Y-m-d H:i:s') }}</h4>
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
        <form method="POST" action="{{ isset($product) ? route('produk.edit',$product->id) : route('produk.save') }}">
            @csrf
            @if (isset($product))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{old('nama_produk', $product->nama_produk ?? '')}}" required>
            </div>
            <div class="mb-3">
                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" value="{{old('deskripsi_produk', $product->deskripsi_produk ?? '')}}" required>
            </div>
            <div class="mb-3">
                <label for="stok_produk" class="form-label">Stok Produk</label>
                <input type="number" class="form-control" id="stok_produk" name="stok_produk" value="{{old('stok_produk', $product->stok_produk ?? '')}}" required>
            </div>
            <div class="mb-3">
                <label for="harga_produk" class="form-label">Harga Produk</label>
                <input type="number" class="form-control" id="harga_produk" name="harga_produk" value="{{old('harga_produk', $product->harga_produk ?? '')}}" required>
            </div>
            <div class="mb-3">
                <label for="category_id">Kategori</label>
                <select id="category_id" name="category_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Kategori Produk</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : ''  }}">{{ $category->categoryName }}</option>
                    @endforeach
                </select>
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
