@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Admin Dashboard</h1>

    <div class="card mb-3">
        <div class="card-header">
            Informasi Admin
        </div>
        <div class="card-body">
            <p><strong>Nama:</strong> Edgar Alip Mong</p>
            <p><strong>NIM:</strong> 240701133456</p>
            <p><strong>Email Admin:</strong> edgarbrobro@admin.ac.id</p>
            <p><strong>Email Pribadi:</strong> mongsky@gmail.com</p>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            Status Ruangan
        </div>
        <div class="card-body">
            <ul>
                <li>Total Kelas: 13</li>
                <li>Kelas Terisi: 8</li>
                <li>Kelas Tidak Terisi: 4</li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <a href="{{ route('jadwal.kuliah') }}" class="btn btn-primary btn-block">Jadwal Kuliah</a>
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('verifikasi.irs') }}" class="btn btn-secondary btn-block">Verifikasi IRS</a>
        </div>
    </div>
</div>
@endsection
