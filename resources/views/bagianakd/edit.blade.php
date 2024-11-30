<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Ruang</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Global Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #f5f5f5;
            color: #333;
            overflow-x: hidden;
        }

        .sidebar {
            width: 250px;
            background: linear-gradient(135deg, #4b2327 0%, #6b3338 100%);
            color: white;
            padding: 20px;
            height: 100vh;
            position: fixed;
            left: 0;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
        }

        .sidebar h1 {
            font-size: 1.5em;
            margin-bottom: 30px;
            text-align: center;
            padding-bottom: 15px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            background: linear-gradient(to right, transparent 50%, rgba(255, 255, 255, 0.1) 50%);
            background-size: 200% 100%;
            background-position: left bottom;
            transition: all 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-position: right bottom;
            transform: translateX(10px);
        }

        .main-content {
            flex: 1;
            padding: 30px;
            margin-left: 250px;
            background-color: #f8f9fa;
        }

        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            margin-bottom: 15px;
        }

        .add-button {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .add-button button,
        .add-button .btn-secondary {
            padding: 10px 20px;
            font-size: 14px;
            border-radius: 8px;
            cursor: pointer;
        }

        .add-button button {
            background-color: #4b2327;
            color: white;
            border: none;
        }

        .add-button button:hover {
            background-color: #6b3338;
        }

        .add-button .btn-secondary {
            background-color: #4b2327;  /* Warna yang sama dengan tombol Simpan Perubahan */
            color: white;
            text-decoration: none;
            display: inline-block;
            border: none;
        }

        .add-button .btn-secondary:hover {
            background-color: #6b3338;  /* Warna saat hover yang sama dengan tombol Simpan Perubahan */
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h1>PASTI SIAP</h1>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bagianakd.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ruang.index') }}">Manajemen Ruang</a>
            </li>
            <li class="mt-auto">
                <form action="{{ route('logout') }}" method="POST" class="mt-5">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100">
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>

    <div class="main-content">
        <div class="form-container">
            <h2>Edit Ruang</h2>
            <form action="{{ route('ruang.update', $ruang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="kode" class="form-label">Kode Ruang</label>
                    <input type="text" name="kode" class="form-control" value="{{ old('kode', $ruang->kode) }}" readonly>
                </div>

                <div class="mb-3">
                    <label for="kapasitas" class="form-label">Kapasitas</label>
                    <input type="text" name="kapasitas" class="form-control" value="{{ old('kapasitas', $ruang->kapasitas) }}" required>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Program Studi</label>
                    <select name="prodi" class="form-control" required>
                        <option value="">Pilih Program Studi</option>
                        <option value="Informatika" {{ $ruang->prodi == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                        <option value="Statistika" {{ $ruang->prodi == 'Statistika' ? 'selected' : '' }}>Statistika</option>
                        <option value="Bioteknologi" {{ $ruang->prodi == 'Bioteknologi' ? 'selected' : '' }}>Bioteknologi</option>
                        <option value="Matematika" {{ $ruang->prodi == 'Matematika' ? 'selected' : '' }}>Matematika</option>
                        <option value="Kimia" {{ $ruang->prodi == 'Kimia' ? 'selected' : '' }}>Kimia</option>
                        <option value="Fisika" {{ $ruang->prodi == 'Fisika' ? 'selected' : '' }}>Fisika</option>
                    </select>
                </div>

                <div class="add-button">
                    <button type="submit">Simpan Perubahan</button>
                    <a href="{{ route('ruang.index') }}" class="btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
