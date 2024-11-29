<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ruang Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
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

        .filter-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
            align-items: center;
        }

        .filter-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
        }

        .add-button {
            display: flex;
            justify-content: end;
            grid-column: span 3;
            margin-top: 20px;
        }

        .add-button button {
            padding: 10px 20px;
            background-color: #4b2327;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
        }

        .add-button button:hover {
            background-color: #6b3338;
        }

        .delete-button {
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .delete-button img {
            width: 20px;
            height: 20px;
        }

        .table-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            padding: 25px;
        }

        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 8px;
        }

        thead th {
            background-color: #4b2327;
            color: white;
            padding: 15px 20px;
            font-weight: 600;
            text-align: left;
        }

        tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        tbody td {
            padding: 15px 20px;
            background-color: white;
            border: 1px solid #eee;
        }

        tbody td:last-child {
            text-align: center;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            display: inline-block;
        }

        .status-available {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-unavailable {
            background-color: #ffebee;
            color: #c62828;
        }

        /* Animasi untuk tombol logout */
        .btn-danger {
            position: relative;
            overflow: hidden;
            background-color: #4b2327;
            border: none;
            padding: 10px 20px;
            text-transform: uppercase;
            font-weight: bold;
            transition: transform 0.4s ease, box-shadow 0.3s ease;
            border-radius: 8px;
        }

        .btn-danger:hover {
            background-color: #6c2e36;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-danger::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 5px;
            height: 5px;
            background: rgba(255, 255, 255, 0.5);
            opacity: 0;
            border-radius: 100%;
            transform: scale(1, 1) translate(-50%);
            transform-origin: 50% 50%;
        }

        .btn-danger:hover::after {
            animation: ripple 1s ease-out;
        }

        @keyframes ripple {
            0% {
                transform: scale(0, 0);
                opacity: 0.5;
            }

            100% {
                transform: scale(20, 20);
                opacity: 0;
            }
        }
    </style>
</head>

<body>
<div class="sidebar">
    <h1>PASTI SIAP</h1>
    <ul class="nav flex-column">
        <!-- Dashboard Link -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('bagianakd.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        
        <!-- Manajemen Ruang Link -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ruang.create') }}">
                <i class="fas fa-cogs"></i> Manajemen Ruang
            </a>
        </li>

        <!-- Logout Button -->
        <li class="mt-auto">
            <form action="{{ route('logout') }}" method="POST" class="mt-5">
                @csrf
                <button type="submit" class="btn btn-danger w-100">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </li>
    </ul>
</div>

    <div class="main-content">
        <header>
            <h1 style="margin-bottom: 30px; color: #4b2327;">Manajemen Ruang</h1>
        </header>

        <!-- Form Tambah Data -->
        <form action="{{ route('ruang.store') }}" method="POST">
            @csrf
            <div class="filter-container">
                <div class="filter-group">
                    <input type="text" name="kode" placeholder="Masukkan Kode" required />
                </div>

                <div class="filter-group">
                    <input type="text" name="kapasitas" placeholder="Masukkan Kapasitas" required />
                </div>

                <div class="filter-group">
                    <input type="text" name="prodi" placeholder="Masukkan Prodi" required />
                </div>

                <div class="add-button">
                    <button type="submit">Tambahkan</button>
                </div>
            </div>
        </form>

        <!-- Tabel Data Ruang -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Prodi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangs as $ruang)
                    <tr>
                        <td>{{ $ruang->kode }}</td>
                        <td>{{ $ruang->kapasitas }}</td>
                        <td>
                            <span class="status-badge {{ strtolower($ruang->status) == 'disetujui' ? 'status-available' : 'status-unavailable' }}">
                                {{ strtolower($ruang->status) == 'disetujui' ? 'Disetujui' : 'Tidak Disetujui' }}
                            </span>
                        </td>
                        <td>{{ $ruang->prodi }}</td>
                        <td>
                            <!-- Logic based on user role -->
                            @if(auth()->user()->role == 'bagianakd')
                                <!-- Bagian Akademik: hanya bisa mengajukan ulang jika status tidak disetujui -->
                                @if($ruang->status == 'Tidak Disetujui')
                                    <form action="{{ route('ruang.ajukanUlang', $ruang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">Ajukan</button>
                                    </form>
                                @else
                                    <span class="badge badge-secondary">Sudah Diajukan</span>
                                @endif
                            @elseif(auth()->user()->role == 'dekan')
                                <!-- Dekan: bisa menyetujui atau menolak -->
                                @if($ruang->status == 'Tidak Disetujui')
                                    <form action="{{ route('ruang.toggleStatus', $ruang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success">Setujui</button>
                                    </form>
                                    <form action="{{ route('ruang.reject', $ruang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Tolak</button>
                                    </form>
                                @else
                                    <form action="{{ route('ruang.toggleStatus', $ruang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-danger">Tandai Tidak Disetujui</button>
                                    </form>
                                @endif
                            @endif

                            <!-- Tombol Edit -->
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal"
                                onclick="editRuang({{ $ruang->id }}, '{{ $ruang->prodi }}')">Edit</button>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('ruang.destroy', $ruang->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-button">
                                    <img src="https://cdn-icons-png.flaticon.com/512/1214/1214428.png" alt="Hapus">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Edit Program Studi -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Program Studi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="prodi" class="form-label">Program Studi</label>
                            <input type="text" name="prodi" id="prodi" class="form-control" required>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Function to handle "Ajukan" button with SweetAlert confirmation
        function ajukanRuang(id) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda ingin mengajukan ruang ini?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Ajukan',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Proceed with the form submission
                    document.querySelector('form[action*="' + id + '"]').submit();
                }
            });
        }

        // Function to handle "Edit" button
        function editRuang(id, prodi) {
            document.getElementById('editForm').action = '/bagianakd/ruang/' + id;
            document.getElementById('prodi').value = prodi;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
 