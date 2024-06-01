@extends('layout.dashboard')

@section('content')
  <!-- Content Area -->
  <main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-end align-items-center mb-3"> 
      <h4 class="me-auto">Data Produk</h4>
      <a href="{{route('categories.form')}}" class="pe-2">
          <button class="btn btn-success btn-block"><b>+ NEW CATEGORY</b></button>
      </a>
      <a href="{{ route('produk.form') }}">
        <button class="btn btn-success btn-block"><b>+ NEW PRODUCT</b></button>
      </a>
  </div>

    {{-- success --}}
    @if(session()->has('deleteSuccess'))
      <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
        <strong>{{ session('deleteSuccess') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>  
    @endif
    {{-- end success --}}

    {{-- produk success --}}
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
          <strong>{{ session('success') }}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    {{-- end produk success --}}

    <div class="container rounded mt-3 p-4 shadow-lg" style="background-color: #ffffff;">

      <table id="myTable" class="table table-bordered table-hover data-table display">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Produk</th>
            <th>Deskripsi Produk</th>
            <th>Stok Produk</th>
            <th>Harga Produk</th>
            <th>Kategori Produk</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->nama_produk }}</td>
            <td>{{ $product->deskripsi_produk }}</td>
            <td>{{ $product->stok_produk }}</td>
            <td>Rp. {{ number_format($product->harga_produk, 0, ',', '.') }}</td>
            <td>{{ $product->category->categoryName }}</td>
            <td>
              <a href="{{route('produk.edit',['product'=>$product])}}">
                <button class="btn btn-warning btn-sm">Edit</button>
              </a>
              <form method="post" action="{{ route('produk.delete', ['product' => $product]) }}">
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/02c07b0853.js" crossorigin="anonymous"></script>
</body>
</html>
