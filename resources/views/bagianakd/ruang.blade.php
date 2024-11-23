<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ruang Kelas</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            background-color: #1a1a1a;
            color: #333;
        }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background-color: #4b2327;
            color: white;
            padding: 20px;
            height: 100vh;
        }

        .sidebar h1 {
            font-size: 1.5em;
            margin-bottom: 20px;
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
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
        }

        .sidebar ul li a:hover {
            background-color: #6c2e36;
        }

        .sidebar ul li a::before {
            content: "●";
            font-size: 10px;
            margin-right: 10px;
            color: #fff;
        }

        /* Main content */
        .main-content {
            flex: 1;
            padding: 20px;
            background-color: #f8f8f8;
        }

        .main-content header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .main-content header h2 {
            font-size: 1.2em;
            color: #333;
        }

        .user-info {
            display: flex;
            align-items: center;
        }

        .user-info span {
            margin-right: 10px;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: #ccc;
            border-radius: 50%;
        }

        /* Table container */
        .table-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .table-container h3 {
            margin-bottom: 20px;
            font-size: 1.2em;
            color: #333;
        }

        .table-container .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .table-container .actions button {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .table-container .actions .add-btn {
            background-color: #b61c22;
            color: #fff;
        }

        .table-container .actions .refresh-btn {
            background-color: #ccc;
            color: #333;
        }

        .table-container .actions input {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 300px;
        }

        /* Table */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background-color: #4b2327;
            color: white;
        }

        table thead th {
            padding: 10px;
            text-align: left;
        }

        table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tbody td {
            padding: 10px;
        }

        table tbody .status {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            font-weight: bold;
        }

        .status.approved {
            background-color: #4caf50;
        }

        .status.pending {
            background-color: #ffc107;
        }

        .table-actions button {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .table-actions .edit-btn {
            background-color: #007bff;
            color: white;
        }

        .table-actions .delete-btn {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h1>PASTI SIAP</h1>
        <ul>
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Ruang Kelas</a></li>
            <li><a href="#">Laporan</a></li>
            <li><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <h2>Manajemen Ruang Kelas</h2>
            <div class="user-info">
                <span>Anthony</span>
                <div class="user-avatar"></div>
            </div>
        </header>
        <div class="table-container">
            
            <div class="actions">
                <button class="add-btn">Tambah</button>
                <button class="refresh-btn">Refresh</button>
                <input type="text" placeholder="Cari ruang kelas...">
            </div>
            <table>
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Kode Ruang</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>A103</td>
                        <td>40 Orang</td>
                        <td><span class="status approved">Disetujui</span></td>
                        <td class="table-actions">
                            <button class="edit-btn">✏️</button>
                            <button class="delete-btn">🗑️</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>A102</td>
                        <td>40 Orang</td>
                        <td><span class="status pending">Belum Disetujui</span></td>
                        <td class="table-actions">
                            <button class="edit-btn">✏️</button>
                            <button class="delete-btn">🗑️</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>A303</td>
                        <td>40 Orang</td>
                        <td><span class="status approved">Disetujui</span></td>
                        <td class="table-actions">
                            <button class="edit-btn">✏️</button>
                            <button class="delete-btn">🗑️</button>
                        </td>
                    </tr>
                    <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                </tbody>
            </table>
        </div>
        <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
    </div>
</body>
</html>
