<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Ruang Kelas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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

        /* Enhanced Sidebar Styles */
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
            animation: fadeInDown 0.5s ease;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin: 15px 0;
            opacity: 0;
            animation: slideInLeft 0.5s ease forwards;
        }

        .sidebar ul li:nth-child(1) {
            animation-delay: 0.1s;
        }

        .sidebar ul li:nth-child(2) {
            animation-delay: 0.2s;
        }

        .sidebar ul li:nth-child(3) {
            animation-delay: 0.3s;
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

        /* Main Content Styles */
        .main-content {
            flex: 1;
            padding: 30px;
            margin-left: 250px;
            background-color: #f8f9fa;
        }

        /* Search and Filter Styles */
        .search-container {
            margin-bottom: 25px;
            animation: fadeIn 0.5s ease;
        }

        .search-container input {
            width: 100%;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .search-container input:focus {
            border-color: #4b2327;
            box-shadow: 0 0 10px rgba(75, 35, 39, 0.1);
            outline: none;
        }

        .filter-container {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 20px;
            margin-bottom: 30px;
            animation: fadeIn 0.5s ease;
        }

        .filter-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-group select:hover {
            border-color: #4b2327;
        }

        /* Enhanced Table Styles */
        .table-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
            padding: 25px;
            animation: fadeInUp 0.5s ease;
            overflow-x: auto;
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
            position: relative;
            overflow: hidden;
        }

        thead th:first-child {
            border-radius: 8px 0 0 8px;
        }

        thead th:last-child {
            border-radius: 0 8px 8px 0;
        }

        tbody tr {
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease;
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

        tbody td:first-child {
            border-radius: 8px 0 0 8px;
            border-left: 3px solid #4b2327;
        }

        tbody td:last-child {
            border-radius: 0 8px 8px 0;
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.9em;
            font-weight: 500;
            display: inline-block;
        }

        .status-tersedia {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-belum {
            background-color: #fff3e0;
            color: #ef6c00;
        }

        .status-perbaikan {
            background-color: #ffebee;
            color: #c62828;
        }

        /* Button Styles */
        .button-container {
            display: flex;
            gap: 15px;
            margin-top: 20px;
            justify-content: flex-end;
            animation: fadeInUp 0.5s ease;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary {
            background-color: #4285f4;
            color: white;
            box-shadow: 0 4px 15px rgba(66, 133, 244, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(66, 133, 244, 0.4);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            box-shadow: 0 4px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(220, 53, 69, 0.4);
        }

        .btn:active {
            transform: scale(0.95);
        }

        .btn.loading::after {
            content: '';
            width: 20px;
            height: 20px;
            border: 3px solid #ffffff;
            border-top-color: transparent;
            border-radius: 50%;
            animation: rotate 0.8s linear infinite;
            margin-left: 10px;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes successPulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .success-feedback {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #4caf50;
            color: white;
            padding: 15px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
            animation: successPulse 0.5s ease, fadeIn 0.5s ease;
            z-index: 1000;
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
            <h1 style="margin-bottom: 30px; color: #4b2327;">Manajemen Ruang</h1>
        </header>

        <div class="search-container">
            <input type="text" placeholder="Search..." />
        </div>

        <div class="filter-container">
            <div class="filter-group">
                <select>
                    <option value="">Pilih Gedung</option>
                    <option value="E101">E101</option>
                    <option value="E102">E102</option>
                    <option value="E103">E103</option>
                </select>
            </div>

            <div class="filter-group">
                <select>
                    <option value="">Pilih Kapasitas</option>
                    <option value="100">100 orang</option>
                    <option value="150">150 orang</option>
                </select>
            </div>

            <div class="filter-group">
                <select>
                    <option value="">Pilih Lokasi</option>
                    <option value="gedung1">Gedung 1</option>
                    <option value="gedung2">Gedung 2</option>
                </select>
            </div>

            <div class="filter-group">
                <select>
                    <option value="">Pilih Status</option>
                    <option value="tersedia">Tersedia</option>
                    <option value="tidak">Tidak Tersedia</option>
                </select>
            </div>

            <div class="filter-group">
                <select>
                    <option value="">Pilih Hari</option>
                    <option value="senin">Senin</option>
                    <option value="selasa">Selasa</option>
                </select>
            </div>

            <div class="filter-group">
                <select>
                    <option value="">Pilih Jam</option>
                    <option value="0800">08:00 - 09:40</option>
                    <option value="1000">10:00 - 11:40</option>
                </select>
            </div>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Kapasitas</th>
                        <th>Status</th>
                        <th>Lantai</th>
                        <th>Jenis Ruang</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ruangs as $ruang)
                    <tr>
                        <td>{{ $ruang->kode }}</td>
                        <td>{{ $ruang->kapasitas }}</td>
                        <td>
                            <span class="status-badge {{ strtolower($ruang->status) == 'tersedia' ? 'status-tersedia' :
                                (strtolower($ruang->status) == 'dalam perbaikan' ? 'status-perbaikan' : 'status-belum') }}">
                                {{ $ruang->status }}
                            </span>
                        </td>
                        <td>{{ $ruang->lantai }}</td>
                        <td>{{ $ruang->jenis_ruang }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="button-container">
                <button onclick="handleSave(true)" class="btn btn-primary" id="saveBtn">
                    YA
                </button>
                <button onclick="handleSave(false)" class="btn btn-danger" id="cancelBtn">
                    Tidak
                </button>
            </div>
        </div>
    </div>

    <script>
        function handleSave(isSave) {
            const saveBtn = document.getElementById('saveBtn');
            const cancelBtn = document.getElementById('cancelBtn');

            if (isSave) {
                saveBtn.classList.add('loading');
                saveBtn.disabled = true;
                cancelBtn.disabled = true;

                setTimeout(() => {
                    saveBtn.classList.remove('loading');
                    saveBtn.disabled = false;
                    cancelBtn.disabled = false;

                    const feedback = document.createElement('div');
                    feedback.className = 'success-feedback';
                    feedback.textContent = 'Data berhasil disimpan!';
                    document.body.appendChild(feedback);

                    setTimeout(() => {
                        feedback.remove();
                    }, 3000);
                }, 1500);
            } else {
                cancelBtn.classList.add('loading');
                setTimeout(() => {
                    cancelBtn.classList.remove('loading');
                }, 1000);
            }
        }
    </script>
</body>

</html>
