<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PastiSiap</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <!-- My Style -->
    <link rel="stylesheet" href="..\css\app.css" />
<style>
  * {
    font-family: "Inter";
  }

  body {
    background-color: white;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .container {
    background-color: #1e070c; /* Warna sesuai gambar kiri */
    border-radius: 90px; /* Perbesar radius untuk bentuk rounded */
    padding: 30px 20px; /* Padding di sekitar konten */
    width: 550px; /* Sesuaikan lebar sesuai gambar */
    height: 475px; /* Sesuaikan tinggi sesuai gambar */
    text-align: center;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.3); /* Tambahkan shadow agar lebih menonjol */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .logo {
    background-image: url(../burung.png);
    height: 60px;
    width: 60px;
    background-size: contain;
    background-repeat: no-repeat;
    margin-bottom: 15px;
  }

  .judul {
    font-size: 28px; /* Ukuran font judul */
    color: white;
    margin-bottom: 20px;
  }

  .form-label {
    color: white;
    text-align: left;
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
  }

  .form-control {
    width: 100%;
    max-width: 350px;
    padding: 10px;
    margin: 8px 0;
    background-color: #3d3d3d; /* Sesuaikan warna background input */
    color: white;
    border: 1px solid #555;
    border-radius: 20px; /* Radius untuk input */
    text-indent: 10px;
  }

  .form-control::placeholder {
    color: #b0b0b0; /* Warna placeholder */
  }

  .btn-primary {
    padding: 10px;
    width: 100%;
    max-width: 365px;
    border: none;
    border-radius: 20px; /* Radius untuk tombol */
    background-color: #ff4040; /* Warna tombol */
    color: white;
    font-size: 16px;
    cursor: pointer;
    margin-top: 20px;
  }

  .btn-primary:hover {
    background-color: #d33b3b; /* Warna hover tombol */
  }
</style>


    <!-- My Script -->
    <script src="scriptlogin.js"></script>
  </head>

  <body>
    <div class="container">
      <div class="logo"></div>
      <div class="judul">PASTI SIAP</div>
      @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $item)
          <li>{{ $item }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- Form Login -->
      <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-3 ">
          <input
            type="email"
            placeholder="email"
            value="{{ old('email') }}"
            name="email"
            class="form-control"
          />
        </div>
        <div class="mb-3">
          <input
            type="password"
            placeholder="password"
            name="password"
            class="form-control"
          />
        </div>
        <div class="mb-3 d-grid">
          <button name="submit" type="submit" class="btn btn-primary">
            Login
          </button>
        </div>
      </form>
    </div>
  </body>
</html>
