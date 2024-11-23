<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pembimbing Akademik Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #0d0d0d;
            color: #fff;
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
        }

        .card-custom {
            background-color: #1a1a1a;
            border-radius: 15px;
            border: none;
            color: #fff;
            margin-bottom: 20px;
        }

        .card-body-custom {
            background-color: #252525;
            border-radius: 0 0 15px 15px;
        }

        .profile-circle {
            background-color: #6c757d;
            border-radius: 50%;
            width: 80px;
            height: 80px;
        }

        .btn-verifikasi {
            background-color: #b31b1b;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 18px;
        }

        .status-card {
            background-color: #1a1a1a;
            border-radius: 15px;
        }

        /* Updated to lighten fonts in Status Ruang */
        .status-card h5,
        .status-card h3,
        .status-card h2,
        .status-card p {
            color: #fff !important;
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
                <a href="/verifikasi-irs">Verifikasi IRS</a>
                <a href="/pembimbingakademik" class="active">Pembimbing Akademik</a>
                <a href="/logout">Logout</a>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-10">
                <div class="header">
                    <h4>Pembimbing Akademik Dashboard</h4>
                </div>

                <div class="container mt-4">
                    <div class="row">
                        <!-- Dosen Card -->
                        <div class="col-md-6">
                            <div class="card card-custom">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="profile-circle me-3"></div>
                                        <div>
                                            <h5>Saipul Mulyono, S.i</h5>
                                            <p>23115476332111</p>
                                            <p>saipulmuly@admin.ac.id</p>
                                            <p>saipulmulyono17@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center card-body-custom">
                                    <p>Fakultas Ilmu Sulap Dan Ilmu Sihir</p>
                                    <p>Departemen Ilmu Sihir</p>
                                </div>
                            </div>
                        </div>

                        <!-- Verifikasi IRS Button -->
                        <div class="col-md-6 d-flex align-items-center justify-content-center">
                            <button class="btn-verifikasi">Verifikasi IRS</button>
                        </div>
                    </div>

                    <!-- Status Ruang Card -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card status-card">
                                <div class="card-body text-center">
                                    <h5>Status Ruang</h5>
                                    <p>Fakultas: Ilmu Sulap Dan Ilmu Sihir</p>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <h3>Jumlah Mahasiswa:</h3>
                                            <h2>67</h2>
                                        </div>
                                        <div class="col">
                                            <h3>Total Kelas:</h3>
                                            <h2>5</h2>
                                        </div>
                                        <div class="col">
                                            <h3>Kelas Terisi:</h3>
                                            <h2>4</h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- End Main Content Area -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
