@extends('layouts.main')

@section('title', 'Dashboard Pembimbing Akademik')

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

    <!-- Button for Ruang -->
    <div class="text-center mt-4">
        <a href="{{ route('verifikasi-irs') }}" class="btn btn-danger btn-lg shadow-sm">
            <i class="fas fa-home me-2"></i> Verifikasi IRS
        </a>
    </div>
</div>

<!-- Add custom styles -->
<style>
    .card {
        transition: transform 0.2s ease-in-out;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }

    .info-section p {
        margin-bottom: 0.5rem;
    }

    .faculty {
        font-size: 0.9rem;
        color: #666;
    }

    .badge {
        padding: 0.5em 1em;
    }

    /* Custom card colors */
    .bg-primary {
        background-color: #4b2327 !important;
    }

    .text-primary {
        color: #4b2327 !important;
    }

    /* Animated stats */
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

    .card-body h2 {
        animation: fadeInUp 0.5s ease-out;
    }
</style>
