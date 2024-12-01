@extends('layouts.main')

@section('title', 'Verifikasi IRS')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm border-0 rounded-lg">
        <div class="card-header bg-white border-0 py-3">
            <h1 class="mb-0">Verifikasi IRS</h1>
        </div>
        <div class="card-body">
            <h2 class="mb-4">Daftar Mahasiswa Ilmu Sihir</h2>
            <h4 class="text-muted mb-4">Fakultas Ilmu Sulap dan Ilmu Sihir</h4>

            <!-- IRS Table -->
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <th>Angkatan</th>
                            <th>Status Mahasiswa</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Budi</td>
                            <td>240601221507</td>
                            <td>2022</td>
                            <td>Aktif</td>
                            <td>5</td>
                            <td>20</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Abdul</td>
                            <td>240601221508</td>
                            <td>2022</td>
                            <td>Aktif</td>
                            <td>5</td>
                            <td>22</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Agung</td>
                            <td>240601221547</td>
                            <td>2022</td>
                            <td>Aktif</td>
                            <td>5</td>
                            <td>24</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Udin</td>
                            <td>240601221668</td>
                            <td>2021</td>
                            <td>Aktif</td>
                            <td>7</td>
                            <td>19</td>
                            <td>Belum Disetujui</td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Ibrahim</td>
                            <td>240601221786</td>
                            <td>2020</td>
                            <td>Aktif</td>
                            <td>9</td>
                            <td>18</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Putu</td>
                            <td>240601221234</td>
                            <td>2022</td>
                            <td>Aktif</td>
                            <td>5</td>
                            <td>21</td>
                            <td>Belum Disetujui</td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Agus</td>
                            <td>240601224567</td>
                            <td>2019</td>
                            <td>Aktif</td>
                            <td>11</td>
                            <td>20</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Joko</td>
                            <td>240601213983</td>
                            <td>2021</td>
                            <td>Aktif</td>
                            <td>7</td>
                            <td>22</td>
                            <td>Disetujui</td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Dika</td>
                            <td>240601221445</td>
                            <td>2022</td>
                            <td>Aktif</td>
                            <td>5</td>
                            <td>20</td>
                            <td>Disetujui</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Approval Button -->
            <div class="mt-4 text-end">
                <button class="btn btn-primary">
                    <i class="fas fa-signature me-2"></i>Tanda Tangan
                </button>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 15px;
    }

    .table {
        background-color: #fff;
    }

    .table th {
        text-align: center;
        vertical-align: middle;
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .table td {
        vertical-align: middle;
    }

    .btn-primary {
        background-color: #4b2327;
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #6c757d;
    }

    .table-responsive {
        overflow-x: auto;
    }
</style>
@endsection
