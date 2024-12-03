@extends('layouts.main')

@section('title', 'Her-Registrasi')

@section('content')
<div class="full-screen">
    <div class="card shadow-sm border-0 rounded-lg full-screen-card">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Pilih Status Akademik</h1>
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

        <div class="card-body p-4">
            <p>Silahkan pilih status akademik untuk semester ini:</p>

            <!-- Status Buttons -->
            <div class="d-flex justify-content-around mb-4">
                <button class="btn btn-primary btn-lg px-5">
                    <i class="fas fa-check-square me-2"></i>Aktif
                </button>
                <button class="btn btn-secondary btn-lg px-5">
                    <i class="fas fa-user-slash me-2"></i>Cuti
                </button>
            </div>

            <!-- Informasi Her-Registrasi -->
            <div class="card bg-light border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Her - Registrasi</h5>
                    <p class="card-text">
                        Status Akademik Anda:<br>
                        Informasi lebih lanjut mengenai her-registrasi, atau mekanisme serta pengajuan penangguhan pembayaran dapat ditanyakan melalui Biro Administrasi Akademik (BAA) atau program studi masing-masing.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
