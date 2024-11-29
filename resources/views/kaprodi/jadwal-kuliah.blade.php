@extends('layouts.main')

@section('title', 'Jadwal Kuliah')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Penyusun Jadwal</h1>
            </div>
        </div>
        <div class="card-body">
            <!-- Mata Kuliah Form Section -->
            <div class="jadwal-form mb-4">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="row g-3 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Mata Kuliah</label>
                            <select name="mata_kuliah_id" class="form-select custom-select" required>
                                @foreach($mataKuliah as $mk)
                                    <option value="{{ $mk->id }}">{{ $mk->nama_mata_kuliah }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Dosen Pengampu</label>
                            <select name="dosen_id" class="form-select custom-select" required>
                                @foreach($dosenPengampu as $dosen)
                                    <option value="{{ $dosen->id }}">{{ $dosen->nama_dosen }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Jam Mulai</label>
                            <input type="time" name="jam_mulai" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Jam Selesai</label>
                            <input type="time" name="jam_selesai" class="form-control" required>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Hari</label>
                            <select name="hari" class="form-select custom-select" required>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-bold">Aksi</label>
                            <button type="submit" class="btn btn-success custom-btn w-100">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
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
                                <th>Jumat</th>
                                <th>Sabtu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jadwal as $jam => $hariSchedules)
                                <tr>
                                    <!-- Display Time Slot as "Jam Mulai - Jam Selesai" -->
                                    <td class="align-middle">
                                        {{ \Carbon\Carbon::parse($jam)->format('H:i') }} -
                                        {{ \Carbon\Carbon::parse($hariSchedules->first()->jam_selesai)->format('H:i') }}
                                    </td>

                                    <!-- Display Schedule for Each Day -->
                                    @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'] as $day)
                                        <td>
                                            @php
                                                $currentSchedules = $hariSchedules->where('hari', $day);
                                            @endphp

                                            @if($currentSchedules->isNotEmpty())
                                                @foreach($currentSchedules as $currentJadwal)
                                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                                        <span>
                                                            {{ $currentJadwal->mataKuliah->nama_mata_kuliah }}<br>
                                                            <small>{{ $currentJadwal->dosen->nama_dosen }}</small>
                                                        </span>
                                                        <form action="{{ route('jadwal.destroy', $currentJadwal->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            @else
                                                <span class="text-muted">-</span>
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
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