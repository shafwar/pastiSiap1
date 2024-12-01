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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Rows -->
                        @foreach ($students as $index => $student)
                        <tr id="row-{{ $student['id'] }}">
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $student['nama'] }}</td>
                            <td>{{ $student['nim'] }}</td>
                            <td>{{ $student['angkatan'] }}</td>
                            <td>{{ $student['status_mahasiswa'] }}</td>
                            <td>{{ $student['semester'] }}</td>
                            <td>{{ $student['sks'] }}</td>
                            <td class="status" data-id="{{ $student['id'] }}">
                                <span class="badge bg-{{ $student['status_color'] }}">
                                    {{ $student['status'] }}
                                </span>
                            </td>
                            <td>
                                <button class="btn btn-sm btn-info lihat-btn" data-id="{{ $student['id'] }}">Lihat</button>
                                <button class="btn btn-sm btn-success tanda-tangan-btn" data-id="{{ $student['id'] }}">Tanda Tangan</button>
                                <button class="btn btn-sm btn-danger tidak-disetujui-btn" data-id="{{ $student['id'] }}">Tidak Disetujui</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Lihat Pop-Up Modal -->
<div id="lihatModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Mata Kuliah</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Ruangan</th>
                            <th>Jadwal</th>
                            <th>SKS</th>
                        </tr>
                    </thead>
                    <tbody id="subjectList"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Tanda Tangan Pop-Up Modal -->
<div id="tandaTanganModal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tanda Tangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="signatureForm">
                    <div class="mb-3">
                        <label for="signatureUpload" class="form-label">Unggah Tanda Tangan</label>
                        <input type="file" id="signatureUpload" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Handle "Lihat" Button
        document.querySelectorAll('.lihat-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const subjects = generateSubjects(); // Call random subject generator

                let tbody = '';
                subjects.forEach((subject, index) => {
                    tbody += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${subject.name}</td>
                            <td>${subject.room}</td>
                            <td>${subject.schedule}</td>
                            <td>${subject.sks}</td>
                        </tr>
                    `;
                });
                document.getElementById('subjectList').innerHTML = tbody;
                new bootstrap.Modal(document.getElementById('lihatModal')).show();
            });
        });

        // Handle "Tanda Tangan" Button
        document.querySelectorAll('.tanda-tangan-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                const modal = new bootstrap.Modal(document.getElementById('tandaTanganModal'));

                document.getElementById('signatureForm').addEventListener('submit', function (e) {
                    e.preventDefault();
                    document.querySelector(`#row-${id} .status span`).className = 'badge bg-success';
                    document.querySelector(`#row-${id} .status span`).innerText = 'Disetujui';
                    modal.hide();
                });

                modal.show();
            });
        });

        // Handle "Tidak Disetujui" Button
        document.querySelectorAll('.tidak-disetujui-btn').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.dataset.id;
                document.querySelector(`#row-${id} .status span`).className = 'badge bg-danger';
                document.querySelector(`#row-${id} .status span`).innerText = 'Tidak Disetujui';
            });
        });
    });

    function generateSubjects() {
        return [
            { name: 'Mantra Dasar', room: 'R101', schedule: 'Senin 08:00-10:00', sks: 3 },
            { name: 'Ramuan Ajaib', room: 'R102', schedule: 'Selasa 10:00-12:00', sks: 2 },
            { name: 'Astronomi Magis', room: 'R103', schedule: 'Rabu 08:00-10:00', sks: 3 },
            { name: 'Sejarah Sihir', room: 'R104', schedule: 'Kamis 10:00-12:00', sks: 2 },
            { name: 'Ilmu Makhluk Gaib', room: 'R105', schedule: 'Jumat 08:00-10:00', sks: 3 },
            { name: 'Pertahanan Terhadap Ilmu Hitam', room: 'R106', schedule: 'Senin 14:00-16:00', sks: 3 },
            { name: 'Ilmu Levitation', room: 'R107', schedule: 'Rabu 14:00-16:00', sks: 2 },
        ];
    }
</script>
@endsection
