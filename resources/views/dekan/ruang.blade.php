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
            padding: 0;
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

        .bulk-action-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .bulk-action-buttons button {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-approve-all {
            background-color: #28a745;
        }

        .btn-reject-all {
            background-color: #dc3545;
        }

        .btn-approve-all:hover {
            background-color: #218838;
        }

        .btn-reject-all:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h1>Menu</h1>
        <ul>
            <li><a href="{{ route('ruang.index') }}">Data Ruang</a></li>
            <li><a href="{{ route('ruang.create') }}">Tambah Ruang</a></li>
            <li><a href="#">Lainnya</a></li>
        </ul>
    </div>

    <div class="main-content">
        <header>
            <h1 style="margin-bottom: 30px; color: #4b2327;">Data Ruang</h1>
        </header>

        <!-- Table -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Prodi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ruangs as $ruang)
                    <tr>
                        <td>{{ $ruang->kode }}</td>
                        <td>{{ $ruang->kapasitas }}</td>
                        <td>
                            <span class="status-badge {{ $ruang->status == 'Tersedia' ? 'status-available' : 'status-unavailable' }}">
                                {{ $ruang->status }}
                            </span>
                        </td>
                        <td>{{ $ruang->prodi }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Bulk action buttons -->
            <div class="bulk-action-buttons">
                <form action="{{ route('dekan.approveAllRuang') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-approve-all">Setujui Semua</button>
                </form>

                <form action="{{ route('dekan.rejectAllRuang') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-reject-all">Tolak Semua</button>
                </form>
           
