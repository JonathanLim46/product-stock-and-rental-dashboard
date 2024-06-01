@extends('layout.dashboard')

@section('content')

<!-- Content Area -->
<main class="flex-grow-1 p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Admin | {{ date('Y-m-d H:i:s') }}</h4>
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
        <form method="POST" action="{{ isset($admin) ? route('admin.update', $admin->id) : route('admin.savedata') }}">
            @csrf
            @if (isset($admin))
                @method('PUT')
            @endif
            <div class="mb-3">
                <label for="username" class="form-label">Nama Admin</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $admin->username ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="" required>
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
