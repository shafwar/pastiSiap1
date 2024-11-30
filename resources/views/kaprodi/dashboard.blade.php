@extends('layouts.main')

@section('title', 'Dashboard Bagian Akademik')

@section('content')
<div class="container mt-4">
    <div class="text-end mb-4">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="left" title="Keluar dari sistem">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>

    <div class="row g-4">
        <!-- Left Section: Dosen Card -->
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body text-center p-4">
                    <div class="profile-pic mb-4 position-relative">
                        <img src="https://via.placeholder.com/70" class="rounded-circle shadow" alt="Profile Picture">
                        <span class="position-absolute bottom-0 end-0 bg-success rounded-circle p-2" 
                              style="width: 20px; height: 20px;" 
                              data-bs-toggle="tooltip" 
                              title="Status: Active">
                        </span>
                    </div>
                    <h5 class="card-title fw-bold mb-3">Dosen</h5>
                    <div class="info-section">
                        <p class="fw-bold text-dark mb-1">Saipul Mulyono, Si.</p>
                        <p class="text-muted small mb-2">
                            <i class="fas fa-id-card me-2"></i>23151476332111
                        </p>
                        <div class="d-flex flex-column gap-2 mt-3">
                            <p class="mb-1">
                                <i class="fas fa-envelope me-2 text-primary"></i>
                                <a href="mailto:saipulmuly@admin.ac.id" class="text-decoration-none">
                                    saipulmuly@admin.ac.id
                                </a>
                            </p>
                            <p class="mb-1">
                                <i class="fas fa-envelope-square me-2 text-primary"></i>
                                <a href="mailto:saipulmulyono17@gmail.com" class="text-decoration-none">
                                    saipulmulyono17@gmail.com
                                </a>
                            </p>
                        </div>
                        <div class="mt-4 p-3 bg-light rounded-3">
                            <p class="faculty mb-0">
                                <i class="fas fa-university me-2"></i>
                                Fakultas Ilmu Sulap Dan Ilmu Sihir
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Section: Status Ruang -->
        <div class="col-md-8">
            <div class="card h-100 shadow-sm border-0">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-chart-bar me-2 text-primary"></i>
                            Status Ruang
                        </h5>
                        <span class="badge bg-primary">Real-time</span>
                    </div>

                    <div class="faculty-info p-3 bg-light rounded-3 mb-4">
                        <p class="mb-0">
                            <i class="fas fa-university me-2"></i>
                            <strong>Fakultas:</strong> Ilmu Sulap Dan Ilmu Sihir
                        </p>
                    </div>

                    <div class="row g-4 mt-2">
                        <div class="col-md-4">
                            <div class="card h-100 bg-primary bg-gradient text-white border-0">
                                <div class="card-body text-center">
                                    <i class="fas fa-users fa-2x mb-3"></i>
                                    <h6>Jumlah Mahasiswa</h6>
                                    <h2 class="mb-0">67</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 bg-success bg-gradient text-white border-0">
                                <div class="card-body text-center">
                                    <i class="fas fa-door-open fa-2x mb-3"></i>
                                    <h6>Total Kelas</h6>
                                    <h2 class="mb-0">5</h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 bg-info bg-gradient text-white border-0">
                                <div class="card-body text-center">
                                    <i class="fas fa-check-circle fa-2x mb-3"></i>
                                    <h6>Kelas Terisi</h6>
                                    <h2 class="mb-0">4</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Button for Kuliah -->
    <div class="row mt-4 justify-content-center">
        <div class="col-md-6 col-12 text-center">
            <a href="{{ route('jadwal.kuliah') }}" class="animated-btn jadwal-kuliah w-100">
                <span class="btn-content">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Jadwal Kuliah
                </span>
            </a>
        </div>
    </div>


<!-- Add these styles to your existing style section -->
<!-- Add these styles to your existing style section -->
<style>
    /* Keep your existing styles and add these new ones */
    .animated-btn {
        display: inline-block;
        width: 100%;
        padding: 15px 25px;
        text-align: center;
        text-decoration: none;
        color: white;
        border-radius: 8px;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        z-index: 1;
        font-weight: 600;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    .jadwal-kuliah {
        background: linear-gradient(45deg, #4b2327, #6d343a);
    }

    .animated-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(45deg, rgba(255, 255, 255, 0.1), rgba(255, 255, 255, 0.2));
        z-index: -1;
        transform: translateX(-100%);
        transition: all 0.3s ease;
    }

    .animated-btn:hover {
        color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }


    .animated-btn:hover::before {
        transform: translateX(0);
    }

    .animated-btn:hover .btn-content {
        transform: scale(1.05);
    }

    .animated-btn:active {
        transform: translateY(-1px);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .animated-btn:hover i {
        animation: bounce 0.5s ease infinite;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-3px);
        }
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .animated-btn {
            margin-bottom: 10px;
            padding: 12px 20px;
        }
    }

    /* Additional animation for smooth appearance */
    .animated-btn {
        animation: fadeInUp 0.5s ease-out backwards;
    }

    .jadwal-kuliah {
        animation-delay: 0.1s;
    }
    .jadwal-kuliah {
        background: linear-gradient(45deg, #4b2327, #6d343a);
    }

    
</style>
