@extends('layouts.main')

@section('title', 'Dashboard Bagian Akademik')

@section('content')

<div class="container mt-4">
    <div class="text-end mt-4">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
            </button>
        </form>
    </div>
    <h2>Dashboard Bagian Akademik</h2>
    <div class="row">
        <!-- Left Section: Dosen Card -->
        <div class="col-md-4">
            <div class="card text-center p-3">
                <div class="profile-pic mb-3">
                    <img src="https://via.placeholder.com/70" class="rounded-circle" alt="Profile Picture">
                </div>
                <h5 class="card-title">Dosen</h5>
                <p>Saipul Mulyono, Si.</p>
                <p>23151476332111</p>
                <p>saipulmuly@admin.ac.id</p>
                <p>saipulmulyono17@gmail.com</p>
                <p class="faculty">Fakultas Ilmu Sulap Dan Ilmu Sihir</p>
            </div>
        </div>

        <!-- Right Section: Status Ruang -->
        <div class="col-md-8">
            <div class="card p-3">
                <h5>Status Ruang</h5>
                <p>Fakultas: Ilmu Sulap Dan Ilmu Sihir</p>
                <div class="d-flex justify-content-between mt-3">
                    <div>
                        <p>Jumlah Mahasiswa:</p>
                        <p><strong>67</strong></p>
                    </div>
                    <div>
                        <p>Total Kelas:</p>
                        <p><strong>5</strong></p>
                    </div>
                    <div>
                        <p>Kelas Terisi:</p>
                        <p><strong>4</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Button for Ruang -->
    <div class="text-center mt-4">
        <a href="{{ route('ruang.index') }}" class="btn btn-danger">
            <i class="fas fa-home"></i> RUANG
        </a>
    </div>
</div>

@endsection
