<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Dekan</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f0f0f0;
            min-height: 100vh;
        }

        .container {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .pasti-siap {
            color: #511c1c;
            font-size: 24px;
            font-weight: bold;
        }

        .logout-btn {
            background-color: #511c1c;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .logout-btn:hover {
            background-color: #3a1414;
        }

        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 24px;
        }

        /* Profile Card Styles */
        .profile-card {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .profile-image {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #e0e0e0;
            position: relative;
            margin-bottom: 20px;
        }

        .online-status {
            width: 16px;
            height: 16px;
            background: #22c55e;
            border-radius: 50%;
            border: 2px solid white;
            position: absolute;
            bottom: 0;
            right: 0;
        }

        .profile-info h2 {
            font-size: 20px;
            margin-bottom: 8px;
        }

        .profile-info p {
            margin: 4px 0;
            color: #666;
        }

        .profile-info .email {
            color: #2563eb;
        }

        /* Status Card Styles */
        .status-card {
            display: flex;
            flex-direction: column;
        }

        .status-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .realtime-badge {
            background: #2563eb;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
        }

        .faculty-name {
            color: #666;
            margin-bottom: 20px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }

        .stat-box {
            padding: 16px;
            border-radius: 8px;
            color: white;
            text-align: center;
        }

        .stat-box h3 {
            font-size: 14px;
            margin-bottom: 8px;
        }

        .stat-box .number {
            font-size: 28px;
            font-weight: bold;
        }

        .students {
            background: #2563eb;
        }

        .total-class {
            background: #22c55e;
        }

        .filled-class {
            background: #06b6d4;
        }

        .action-buttons {
            display: flex;
            gap: 16px;
        }

        .action-btn {
            background: #511c1c;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .action-btn:hover {
            background: #3a1414;
        }

        @media (max-width: 768px) {
            .dashboard-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="pasti-siap">PASTI SIAP</div>
            <button class="logout-btn">Logout</button>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            <!-- Profile Card -->
            <div class="card profile-card">
                <div class="profile-image">
                    <div class="online-status"></div>
                </div>
                <div class="profile-info">
                    <h2>Dosen</h2>
                    <h3>Saipul Mulyono, Si.</h3>
                    <p>23151476332111</p>
                    <p class="email">saipulmuly@admin.ac.id</p>
                    <p class="email">saipulmulyono17@gmail.com</p>
                    <p style="margin-top: 16px">Fakultas Ilmu Sulap Dan Ilmu Sihir</p>
                </div>
            </div>

            <!-- Status Card -->
            <div class="card status-card">
                <div class="status-header">
                    <h2>Status Ruang</h2>
                    <span class="realtime-badge">Real time</span>
                </div>
                <div class="faculty-name">
                    <p>Fakultas: Ilmu Sulap Dan Ilmu Sihir</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-box students">
                        <h3>Jumlah Mahasiswa</h3>
                        <div class="number">67</div>
                    </div>
                    <div class="stat-box total-class">
                        <h3>Total Kelas</h3>
                        <div class="number">5</div>
                    </div>
                    <div class="stat-box filled-class">
                        <h3>Kelas Terisi</h3>
                        <div class="number">4</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-buttons">
            <button class="action-btn">RUANG</button>
            <button class="action-btn">JADWAL KULIAH</button>
        </div>
    </div>

    <script>
        // Add any JavaScript functionality here if needed
        document.querySelector('.logout-btn').addEventListener('click', function() {
            // Handle logout functionality
            console.log('Logout clicked');
        });

        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function() {
                // Handle button clicks
                console.log(this.textContent + ' clicked');
            });
        });
    </script>
</body>
</html>