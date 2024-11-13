<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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
            padding: 5rem;
        }

        .profile-pic img {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            border: 2px solid #121212;
        }

        .status-card h5 {
            font-weight: bold;
            color: #121212;
        }

        .faculty {
            border-top: 1px solid #777;
            padding-top: 1rem;
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #121212;
        }

        .status-info p {
            font-size: 1.1rem;
            color: #121212;
        }

        .btn-ruang {
            background-color: #ffffff;
            color: #121212;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 150px;
            margin: 0 auto;
        }

        .btn-ruang i {
            margin-right: 10px;
        }

        .header {
            background-color: #b90000;
            padding: 15px;
            text-align: center;
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: bold;
        }

        .dashboard-title {
            font-size: 1.2rem;
            font-weight: bold;
            padding: 10px;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="header">
        Desktop - 19
    </div>

    <div class="dashboard-title text-center">Dashboard</div>

    <div class="container"> 
        <div class="row">
            <!-- Left Section: Dosen Card (lebih sempit) -->
            <div class="col-md-4">
                <div class="card dosen-card p-3">
                    <div class="d-flex align-items-center">
                        <div class="profile-pic me-3">
                            <img src="https://via.placeholder.com/70" class="rounded-circle" alt="Profile Picture">
                        </div>
                        <div class="text-start">
                            <h5 class="card-title">Dosen</h5>
                            <p>Saipul Mulyono, Si.</p>
                            <p>23151476332111</p>
                            <p>saipulmuly@admin.ac.id</p>
                            <p>saipulmulyono17@gmail.com</p>
                            <p class="faculty">Fakultas Ilmu Sulap Dan Ilmu Sihir</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: Status Ruang Card (lebih lebar) -->
            <div class="col-md-8">
                <div class="card status-card text-center p-3">
                    <h5>Status Ruang</h5>
                    <p>Fakultas: Ilmu Sulap Dan Ilmu Sihir</p>
                    <div class="status-info d-flex justify-content-around mt-3">
                        <div>
                            <p>Jumlah Mahasiswa:</p>
                            <p>67</p>
                        </div>
                        <div>
                            <p>Total Kelas:</p>
                            <p>5</p>
                        </div>
                        <div>
                            <p>Kelas Terisi:</p>
                            <p>4</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Button for Ruang -->
        <div class="text-center mt-4">
            <button class="btn btn-ruang">
                <i class="fas fa-home"></i> RUANG
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>
</html>
