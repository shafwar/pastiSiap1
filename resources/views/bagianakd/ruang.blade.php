<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ruang Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
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

        /* Sidebar */
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

        /* Main Content */
        .main-content {
            flex: 1;
            padding: 30px;
            margin-left: 250px;
            background-color: #f8f9fa;
        }

        /* Filter Styling */
        .filter-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 20px;
            align-items: center;
        }

        .filter-group input,
        .filter-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
        }

        /* Add Button Styling */
        .add-button {
            display: flex;
            justify-content: end;
            grid-column: span 4;
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

        /* Table Styling */
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

        /* Custom CSS untuk kolom Cari Kode Ruangan dan Cari Prodi */
        #kodeFilter,
        #prodiFilter {
            width: 200px; /* Set lebar kolom yang konsisten */
            margin-bottom: 20px;
        }
    </style>
</head>

<body>

    <div class="sidebar">
        <h1>PASTI SIAP</h1>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bagianakd.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ruang.create') }}">
                    <i class="fas fa-cogs"></i> Manajemen Ruang
                </a>
            </li>
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

        <!-- Filter Kode Ruangan dan Prodi -->
        <div class="mb-4">
            <div style="display: flex; gap: 15px;">
                <input type="text" id="kodeFilter" class="form-control" placeholder="Kode Ruangan" onkeyup="filter()">
                <select id="prodiFilter" class="form-control" onchange="filter()">
                    <option value="">Cari Prodi</option>
                    <option value="Informatika">Informatika</option>
                    <option value="Statistika">Statistika</option>
                    <option value="Bioteknologi">Bioteknologi</option>
                    <option value="Matematika">Matematika</option>
                    <option value="Kimia">Kimia</option>
                    <option value="Fisika">Fisika</option>
                </select>
            </div>
        </div>

        <!-- Form Input Ruang -->
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
                    <select name="prodi" class="form-control" required>
                        <option value="">Pilih Prodi</option>
                        <option value="Informatika">Informatika</option>
                        <option value="Statistika">Statistika</option>
                        <option value="Bioteknologi">Bioteknologi</option>
                        <option value="Matematika">Matematika</option>
                        <option value="Kimia">Kimia</option>
                        <option value="Fisika">Fisika</option>
                    </select>
                </div>
                <div class="add-button">
                    <button type="submit">Tambahkan</button>
                </div>
            </div>
        </form>

        <!-- Tabel Data Ruang -->
        <div class="table-container">
            <table id="ruangTable">
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
                            <span class="status-badge {{ $ruang->status == 'Tersedia' ? 'status-available' : 'status-unavailable' }}">
                                {{ $ruang->status }}
                            </span>
                        </td>
                        <td>{{ $ruang->prodi }}</td>
                        <td>
                            <a href="{{ route('ruang.edit', $ruang->id) }}" class="btn btn-primary">Edit</a>
                            <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ route('ruang.destroy', $ruang->id) }}', '{{ $ruang->kode }}', '{{ $ruang->kapasitas }}', '{{ $ruang->prodi }}')">Hapus</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Filter function
        function filter() {
            let kodeInput = document.getElementById("kodeFilter").value.toLowerCase();
            let prodiInput = document.getElementById("prodiFilter").value.toLowerCase();
            let table = document.getElementById("ruangTable");
            let rows = table.getElementsByTagName("tr");

            for (let i = 1; i < rows.length; i++) {
                let cells = rows[i].getElementsByTagName("td");
                let kode = cells[0].textContent.toLowerCase();
                let prodi = cells[3].textContent.toLowerCase();

                if (kode.includes(kodeInput) && prodi.includes(prodiInput)) {
                    rows[i].style.display = "";
                } else {
                    rows[i].style.display = "none";
                }
            }
        }

        // Delete confirmation
        function confirmDelete(url, kode, kapasitas, prodi) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: `Data ruang kelas dengan Kode Ruangan: ${kode}, Kapasitas: ${kapasitas}, dan Prodi: ${prodi} akan dihapus. Data yang dihapus tidak bisa dikembalikan!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = url;
                    
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);
                    
                    const methodField = document.createElement('input');
                    methodField.type = 'hidden';
                    methodField.name = '_method';
                    methodField.value = 'DELETE';
                    form.appendChild(methodField);
                    
                    document.body.appendChild(form);
                    form.submit();
                }
            });
        }
    </script>

</body>

</html>
