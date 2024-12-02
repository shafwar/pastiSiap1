<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Kuliah - Dekan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
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
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: white;
            display: block;
            padding: 12px 20px;
            border-radius: 8px;
            transition: background 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .main-content {
            flex: 1;
            padding: 30px;
            margin-left: 250px;
            background-color: #f8f9fa;
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
            padding: 15px;
            text-align: left;
        }

        tbody td {
            padding: 15px;
            background-color: white;
            border: 1px solid #eee;
        }

        .button-container {
            margin-top: 20px;
            display: flex;
            gap: 10px;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h1>Menu</h1>
        <ul>
            <li><a href="#">Jadwal Kuliah</a></li>
            <li><a href="dekan.dashboard">Dashboard</a></li>
            <li><a href="#">Pengaturan</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h1>Jadwal Kuliah - Dekan</h1>
        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Hari</th>
                        <th>Waktu</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupedByDay as $day => $schedules)
                    <tr>
                        <td>{{ ucfirst($day) }}</td>
                        <td>
                            @foreach($schedules as $schedule)
                            <p>{{ $schedule->time }}</p>
                            @endforeach
                        </td>
                        @foreach(['senin', 'selasa', 'rabu', 'kamis', 'jumat'] as $weekday)
                        <td>
                            @foreach($schedules as $schedule)
                            @if($schedule->day == $weekday)
                            <p>
                                <strong>{{ $schedule->mata_kuliah }}</strong> <br>
                                Time: {{ $schedule->time }}<br>
                                SKS: {{ $schedule->sks }}<br>
                                Room: {{ $schedule->ruang }}
                            </p>
                            @endif
                            @endforeach
                        </td>
                        @endforeach
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="button-container">
                <form action="{{ route('dekan.approveAllJadwal') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Setujui Semua</button>
                </form>
                <form action="{{ route('dekan.rejectAllJadwal') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">Tolak Semua</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
