@extends('layouts.main')

@section('title', 'Akademik')

@section('content')
<div class="full-screen">
    <div class="card shadow-sm border-0 rounded-lg full-screen-card">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Akademik</h1>
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
            <!-- Tabs -->
            <div class="d-flex justify-content-around mb-4">
                <button class="btn btn-primary btn-lg px-5">Buat IRS</button>
                <button class="btn btn-secondary btn-lg px-5">IRS</button>
                <button class="btn btn-secondary btn-lg px-5">KHS</button>
            </div>

            <!-- Responsive Table -->
            <div class="table-responsive">
                <table class="table table-bordered text-center align-middle" id="jadwal-table">
                    <thead class="table-light">
                        <tr>
                            <th>Hari</th>
                            <th>Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Jam</th>
                            <th>Ruang</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwal as $item)
                        <tr class="schedule-row" data-id="{{ $item->id }}">
                            <td>{{ $item->day }}</td>
                            <td>{{ $item->mata_kuliah }}</td>
                            <td>{{ $item->sks }}</td>
                            <td>{{ $item->time }}</td>
                            <td>{{ $item->ruang }}</td>
                            <td>{{ ucfirst($item->status) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Action Button -->
            <div class="text-end mt-4">
                <button class="btn btn-danger btn-lg" id="select-row-button">Pilih</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const rows = document.querySelectorAll('.schedule-row');
        let selectedRow = null;

        // Add click event listener to each row
        rows.forEach(row => {
            row.addEventListener('click', function () {
                // Deselect previously selected row
                if (selectedRow) {
                    selectedRow.style.backgroundColor = ''; // Reset background
                }

                // Highlight the clicked row
                selectedRow = row;
                row.style.backgroundColor = 'lightgreen'; // Highlight in green
            });
        });

        // Handle the "Pilih" button click
        document.getElementById('select-row-button').addEventListener('click', function () {
            if (selectedRow) {
                alert(`You selected: ${selectedRow.cells[1].innerText}`);
            } else {
                alert('No row selected!');
            }
        });
    });
</script>
@endsection
