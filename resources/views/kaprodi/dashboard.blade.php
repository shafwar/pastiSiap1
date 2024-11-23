@extends('layouts.main')

@section('title', 'Dashboard Kaprodi')

@section('content')
<div class="container mt-5">
    <h1>Selamat datang di Dashboard Kaprodi</h1>
    <p>Halo, {{ auth()->user()->name }}! Ini adalah halaman dashboard khusus Kaprodi.</p>

    <!-- Konten tambahan dari kode sebelumnya -->
    <div class="card mt-4">
        <div class="card-header bg-success text-white">Informasi Kaprodi</div>
        <div class="card-body">
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
            <p><strong>Role:</strong> Kaprodi</p>
            <p><strong>Fakultas:</strong> {{ auth()->user()->faculty ?? 'Fakultas Tidak Tersedia' }}</p>
        </div>
    </div>

    <!-- Tombol Navigasi -->
    <div class="row mt-4">
        <div class="col-md-6">
            <a href="{{ route('jadwal.kuliah') }}" class="btn btn-primary btn-block">Jadwal Kuliah</a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('verifikasi.irs') }}" class="btn btn-secondary btn-block">Verifikasi IRS</a>
        </div>
    </div>
</div>
@endsection
