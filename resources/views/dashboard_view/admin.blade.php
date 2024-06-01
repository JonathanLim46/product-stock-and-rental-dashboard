@extends('layout.dashboard')

@section('content')
  <!-- Content Area -->
  <main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4>Data Admin</h4>
      <a href="{{route('admin.form')}}"><button class="btn btn-success btn-block"><b>+ NEW DATA</b></button></a>
    </div>

    {{-- success --}}
    {{-- @if(session()->has('deleteSuccess'))
      <div class="alert alert-success alert-dismissible fade show d-flex justify-content-between align-items-center" role="alert">
        <strong>{{ session('deleteSuccess') }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif --}}
    {{-- end success --}}

    <div class="container rounded mt-3 p-4 shadow-lg" style="background-color: #ffffff;">

      <table id="myTable" class="table table-bordered table-hover data-table display">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nama Admin</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($admin as $admins)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $admins->username }}</td>
            <td class="text-center">
              @if (Auth::user()->id === $admins->id) 
                <a href="{{ route('admin.edit',[$admins->id]) }}">
                  <button class="btn btn-warning btn-sm">Edit</button>
                </a>
              @endif              
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
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
