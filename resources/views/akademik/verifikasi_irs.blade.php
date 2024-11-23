<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Verifikasi IRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d0d0d;
        }

        .sidebar {
            height: 100vh;
            background-color: #b31b1b;
            padding-top: 20px;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            font-weight: 500;
        }

        .sidebar a:hover,
        .sidebar a.active {
            background-color: #aa1717;
        }

        .header {
            background-color: #b31b1b;
            padding: 10px 20px;
            text-align: center;
            color: white;
        }

        .main-content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin: 5px;
            nav-left: 5px;
        }

        .table-wrapper {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h3 class="text-center">PASTI SIAP</h3>
                <a href="/admin">Dashboard</a>
                <a href="/verifikasi-irs" class="active">Verifikasi IRS</a>
                <a href="/pembimbingakademik">Pembimbing Akademik</a>
                <a href="/logout">Logout</a>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-10">
                <div class="header">
                    <h4>Verifikasi IRS</h4>
                </div>

                <div class="container main-content">
                    <h5>Daftar Mahasiswa Ilmu Sihir</h5>
                    <p>Fakultas Ilmu Sulap dan Ilmu Sihir</p>

                    <div class="table-responsive">
                        <table id="irsTable" class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Angkatan</th>
                                    <th>Status Mahasiswa</th>
                                    <th>Semester</th>
                                    <th>SKS</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student['no'] }}</td>
                                    <td>{{ $student['name'] }}</td>
                                    <td>{{ $student['nim'] }}</td>
                                    <td>{{ $student['angkatan'] }}</td>
                                    <td>{{ $student['status'] }}</td>
                                    <td>{{ $student['semester'] }}</td>
                                    <td>{{ $student['sks'] }}</td>
                                    <td>{{ $student['approval_status'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#irsTable').DataTable({
                "paging": true,
                "searching": true,
                "info": true,
                "language": {
                    "search": "Cari:",
                    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                    "info": "Menampilkan _START_ hingga _END_ dari _TOTAL_ data",
                    "infoEmpty": "Tidak ada data",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "paginate": {
                        "next": "Berikutnya",
                        "previous": "Sebelumnya"
                    }
                }
            });
        });
    </script>
</body>

</html>
