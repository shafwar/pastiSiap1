<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
        }

        .card {
            background-color: #ffffff;
            color: #121212;
            border: none;
            border-radius: 15px;
        }

        .dosen-card, .status-card {
            padding: 3rem;
        }

        .profile-pic img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
        }

        .status-card h5 {
            font-weight: bold;
        }

        .faculty {
            border-top: 1px solid #777;
            padding-top: 1rem;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #555;
        }

        .status-info p {
            font-size: 1.1rem;
        }

        .btn-ruang {
            background-color: #b90000;
            color: #ffffff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
            text-transform: uppercase;
        }

        .btn-ruang:hover {
            background-color: #920000;
            color: #ffffff;
        }

        .btn-ruang i {
            margin-right: 10px;
        }

        .header {
            background-color: #b90000;
            padding: 15px;
            text-align: center;
            color: #ffffff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .dashboard-title {
            font-size: 1.2rem;
            font-weight: bold;
            text-align: center;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        Mahasiswa Dashboard
    </div>

    <div class="dashboard-title">Welcome, Mahasiswa</div>

    <div class="container"> 
        <div class="row">
            <!-- Left Section: Dosen Card -->
            <div class="col-md-4">
                <div class="card dosen-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="profile-pic me-3">
                            <img src="https://via.placeholder.com/70" alt="Profile Picture">
                        </div>
                        <div class="text-start">
                            <h5 class="card-title">Mahasiswa</h5>
                            <p>Jina Mudri</p>
                            <p>24060122160123</p>
                            <p>jinamudri@admin.ac.id</p>
                            <p>jinamudri11@gmail.com</p>
                            <p class="faculty">Fakultas Ilmu Sulap Dan Ilmu Sihir</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Status Ruang Card -->
            <div class="col-md-8">
                <div class="card status-card text-center p-3">
                    <h5>Status Akademik</h5>
                    <p>Fakultas: Ilmu Sulap Dan Ilmu Sihir</p>
                    <div class="status-info d-flex justify-content-around mt-3">
                        <div>
                            <h5>Status Akademik</h5>
                            <p class="text-success fw-bold">Aktif</p>
                        </div>
                        <div>
                            <h5>Semester Akademik Sekarang</h5>
                            <p>2024/2025 Genap</p>
                        </div>
                        <hr>
                        <div>
                            <p>Dosen Wali: <strong>Raya Jumingrat S.J.J., M.Cap.</strong></p>
                            <p>NIP: 17202247052023</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Semester Details Grid -->
        <div class="grid">
            <div class="status-box">
                <h5>Semester Studi</h5>
                <p>4</p>
            </div>
            <div class="status-box">
                <h5>IPK</h5>
                <p>3.30</p>
            </div>
            <div class="status-box">
                <h5>SKS</h5>
                <p>50</p>
            </div>
        </div>

        <!-- Button for Ruang -->
        <div class="text-center mt-4">
            <a href="{{ route('verifikasi.irs') }}" class="btn btn-ruang">
                <i class="fas fa-home"></i> Her-Registrasi
            </a>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('verifikasi.irs') }}" class="btn btn-ruang">
                <i class="fas fa-home"></i> Akademik
            </a>
        </div>
    </div>

    <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>
</html>
