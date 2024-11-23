<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body class="bg-secondary">

  <!-- Navigation Menu -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Admin Dashboard</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/admin">Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/operator">Operator</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/keuangan">Keuangan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/admin/marketing">Marketing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/verifikasi-irs">Verifikasi IRS</a>
          </li>
          <!-- New Link for Pembimbing Akademik -->
          <li class="nav-item">
            <a class="nav-link" href="/pembimbingakademik">Pembimbing Akademik</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link btn btn-secondary btn-sm text-white" href="/logout">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- Main Content -->
  <div class="bg-white container-sm col-6 border my-3 rounded px-5 py-3 pb-5">
    <h1>Halo!!</h1>
    <div>Selamat datang di halaman admin</div>
    <div class="card mt-3">
      <ul class="list-group list-group-flush">
        @if(Auth::user()->role == 'operator')     
        <li class="list-group-item">Menu Operator</li>
        @endif
        @if(Auth::user()->role == 'keuangan')     
        <li class="list-group-item">Menu Keuangan</li>
        @endif
        @if(Auth::user()->role == 'marketing')     
        <li class="list-group-item">Menu Marketing</li>
        @endif
      </ul>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
  </script>
</body>

</html>
