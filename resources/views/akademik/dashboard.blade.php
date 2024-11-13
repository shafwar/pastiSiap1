@extends('admin')

@section('content')

                <div class="container mt-4">
                        <div class="row">
                            <!-- Left Section: Dosen Card -->
                            <div class="col-md-4">
                                <div class="card dosen-card text-center p-3">
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

                            <!-- Right Section: Status Ruang Card -->
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

@endsection
