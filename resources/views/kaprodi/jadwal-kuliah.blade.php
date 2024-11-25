@extends('layouts.main')

@section('title', 'Jadwal Kuliah')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Penyusun Jadwal</h1>
                <div class="d-flex align-items-center">
                    <div class="notification-bell me-3">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="user-profile d-flex align-items-center">
                        <i class="fas fa-user-circle me-2"></i>
                        <span>User Akademik</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Search Bar with Icon -->
            <div class="search-container mb-4">
                <div class="position-relative">
                    <input type="text" class="form-control search-input" placeholder="Cari Mata Kuliah">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </div>

            <!-- Mata Kuliah Form Section -->
            <div class="jadwal-form mb-4">
                <div class="row g-3 align-items-end">
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Mata Kuliah</label>
                        <select class="form-select custom-select">
                            <option selected>Algoritma Pemrograman</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Dosen Pengampu</label>
                        <select class="form-select custom-select">
                            <option selected>Yanto</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Waktu</label>
                        <select class="form-select custom-select">
                            <option selected>Sebelum UTS</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label fw-bold">Aksi</label>
                        <div class="d-flex gap-2">
                            <button class="btn btn-success flex-grow-1 custom-btn">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                            <button class="btn btn-danger flex-grow-1 custom-btn">
                                <i class="fas fa-trash-alt me-1"></i> Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Jadwal Table -->
            <div class="jadwal-table mt-5">
                <h2 class="mb-3">Jadwal Mingguan</h2>
                <div class="table-responsive">
                    <table class="table table-bordered table-schedule">
                        <thead>
                            <tr>
                                <th width="10%">Waktu</th>
                                <th>Senin</th>
                                <th>Selasa</th>
                                <th>Rabu</th>
                                <th>Kamis</th>
                                <th>Jum'at</th>
                                <th>Sabtu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="align-middle">7:00</td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                            </tr>
                            <tr>
                                <td class="align-middle">8:00</td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                                <td><select class="form-select schedule-select"><option>Pilih Mata Kuliah</option></select></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Card Styles */
    .card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
    }

    /* Search Bar Styles */
    .search-container {
        max-width: 600px;
        margin: 0 auto;
    }

    .search-input {
        padding: 12px 20px;
        padding-left: 45px;
        border-radius: 8px;
        border: 1px solid #e0e0e0;
        background-color: #f8f9fa;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        background-color: #fff;
        box-shadow: 0 0 0 3px rgba(75, 35, 39, 0.1);
        border-color: #4b2327;
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #6c757d;
    }

    /* Custom Select Styles */
    .custom-select {
        padding: 10px 15px;
        border-radius: 6px;
        border: 1px solid #e0e0e0;
        background-color: #fff;
        transition: all 0.3s ease;
    }

    .custom-select:focus {
        box-shadow: 0 0 0 3px rgba(75, 35, 39, 0.1);
        border-color: #4b2327;
    }

    /* Button Styles */
    .custom-btn {
        padding: 10px 20px;
        border-radius: 6px;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    /* Schedule Table Styles */
    .table-schedule {
        border-collapse: separate;
        border-spacing: 0;
        background: #fff;
    }

    .table-schedule th {
        background-color: #f8f9fa;
        padding: 15px;
        font-weight: 600;
        border: 1px solid #dee2e6;
    }

    .table-schedule td {
        padding: 10px;
        border: 1px solid #dee2e6;
        vertical-align: middle;
    }

    .schedule-select {
        padding: 8px 12px;
        border-radius: 4px;
        border: 1px solid #e0e0e0;
        width: 100%;
        transition: all 0.3s ease;
    }

    .schedule-select:focus {
        box-shadow: 0 0 0 2px rgba(75, 35, 39, 0.1);
        border-color: #4b2327;
    }

    /* User Profile and Notification Styles */
    .notification-bell {
        padding: 8px;
        border-radius: 50%;
        background-color: #f8f9fa;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .notification-bell:hover {
        background-color: #e9ecef;
        transform: scale(1.1);
    }

    .user-profile {
        padding: 8px 15px;
        border-radius: 20px;
        background-color: #f8f9fa;
        font-size: 0.9rem;
    }

    /* Form Label Styles */
    .form-label {
        color: #495057;
        margin-bottom: 0.5rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .jadwal-form .row {
            row-gap: 1rem;
        }
        
        .custom-btn {
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .card-header {
            padding: 15px;
        }

        .user-profile span {
            display: none;
        }
    }

    /* Animation Styles */
    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .card {
        animation: fadeIn 0.3s ease-out;
    }

    .custom-select, .custom-btn, .schedule-select {
        transition: all 0.2s ease-in-out;
    }

    .custom-select:hover, .schedule-select:hover {
        border-color: #4b2327;
    }
</style>
@endsection