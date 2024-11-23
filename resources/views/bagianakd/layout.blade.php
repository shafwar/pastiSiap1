{{-- <!doctype html> --}}
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title', 'Admin')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> <!-- Tambahkan link CSS kustom -->
</head>

<body class="bg-secondary">
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    <h1>Halo!!</h1>
    <div>Selamat datang di halaman admin</div>
    <div>
      <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
    </div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        @if(Auth::user()->role == 'operator')     
        <li class="list-group-item">Menu Operator</li>
        @endif
        @if(Auth::user()->role == 'keuangan')     
        <li class="list-group-item">Menu Keuangan</li>
        @endif
        @if(Auth::user()->role == 'kaprodi')     
        <li class="list-group-item">Menu Kaprodi</li>
        @endif
        @if(Auth::user()->role == 'marketing')     
        <li class="list-group-item">Menu Marketing</li>
        @endif
      </ul>
    </div>

    <!-- Tambahkan kontainer untuk konten dinamis -->
    <div class="mt-4">
      @yield('content') <!-- Tempatkan konten dinamis di sini -->
    </div>

  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>
