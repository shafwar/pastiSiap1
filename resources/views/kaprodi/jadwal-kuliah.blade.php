@extends('layouts.main')

@section('title', 'Jadwal Kuliah')

@section('content')
<div class="full-screen">
    <div class="card shadow-sm border-0 rounded-lg full-screen-card">
        <div class="card-header bg-white border-0 py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h1 class="mb-0">Jadwal Kuliah</h1>
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

        <div class="card-body p-0">
            <div class="d-flex">
                <!-- Tabel Jadwal Kuliah -->
                <div class="col-md-8" id="jadwal">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-schedule">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>Senin</th>
                                    <th>Selasa</th>
                                    <th>Rabu</th>
                                    <th>Kamis</th>
                                    <th>Jumat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Jadwal Kuliah Kosong untuk Drag-and-Drop -->
                                @for ($i = 7; $i <= 17; $i++)
                                    <tr>
                                        <td>{{ $i }}:00 - {{ $i+1 }}:00</td>
                                        <td class="schedule-cell" data-day="senin"></td>
                                        <td class="schedule-cell" data-day="selasa"></td>
                                        <td class="schedule-cell" data-day="rabu"></td>
                                        <td class="schedule-cell" data-day="kamis"></td>
                                        <td class="schedule-cell" data-day="jumat"></td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pilihan Mata Kuliah -->
                <div class="col-md-4" id="available-courses">
                    <h5>Pilih Mata Kuliah</h5>
                    <ul id="courses-list" class="list-group">
                        <li class="list-group-item" data-id="algoritma">Algoritma</li>
                        <li class="list-group-item" data-id="matematika">Matematika</li>
                        <li class="list-group-item" data-id="pemrograman">Pemrograman</li>
                        <li class="list-group-item" data-id="struktur-data">Struktur Data</li>
                        <li class="list-group-item" data-id="jaringan">Jaringan</li>
                        <li class="list-group-item" data-id="ai">AI</li>
                        <li class="list-group-item" data-id="basis-data">Basis Data</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include SortableJS CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Enable sorting on the available courses list
        new Sortable(document.getElementById("courses-list"), {
            group: "shared",  // Allow drag and drop from the list to the schedule
            animation: 150,
            onEnd: function (evt) {
                const draggedCourse = evt.item;
                const targetCell = document.querySelector(`.schedule-cell[data-day="${evt.to.id}"]`);
                
                // Add the dragged course to the schedule cell
                if (targetCell) {
                    targetCell.innerHTML = draggedCourse.innerHTML;
                }
            }
        });

        // Enable sorting on the schedule cells
        const scheduleCells = document.querySelectorAll('.schedule-cell');
        scheduleCells.forEach(cell => {
            new Sortable(cell, {
                group: "shared",
                animation: 150,
                onEnd: function (evt) {
                    const draggedCourse = evt.item;
                    if (draggedCourse) {
                        // Move the dragged course to the new cell in the schedule
                        evt.target.appendChild(draggedCourse);
                    }
                }
            });
        });
    });
</script>

<style>
    /* Full Screen Styles */
    html, body {
        height: 100%; /* Make sure the html and body take up 100% of the height */
        margin: 0; /* Remove default margin */
    }

    .full-screen {
        width: 100%;
        height: 100vh; /* Use full height of the viewport */
        display: flex;
        flex-direction: row; /* Layout horizontally for left and right */
    }

    /* Card Styles */
    .full-screen-card {
        flex: 1;
        overflow: auto;
        background: #fff;
        border-radius: 15px;
    }

    /* Jadwal Table Styles */
    .table-schedule {
        width: 100%;
        border-collapse: collapse;
        background-color: #fff;
    }

    .table-schedule th, .table-schedule td {
        text-align: center;
        padding: 15px;
        font-size: 14px;
        border: 1px solid #dee2e6;
    }

    .table-schedule th {
        background-color: #f8f9fa;
        font-weight: bold;
    }

    .schedule-cell {
        min-height: 50px;
        cursor: pointer;
        background-color: #e9ecef;
    }

    .schedule-cell:hover {
        background-color: #dcdcdc;
    }

    /* Pilihan Mata Kuliah Styles */
    #available-courses {
        padding-left: 20px;
        padding-top: 20px;
    }

    #courses-list .list-group-item {
        cursor: move;
        margin-bottom: 5px;
        background-color: #28a745;
        color: white;
        border-radius: 5px;
        font-weight: bold;
    }

    #courses-list .list-group-item:hover {
        background-color: #218838;
    }

    /* Responsive Styles */
    @media (max-width: 992px) {
        .full-screen {
            flex-direction: column; /* Stack vertically on smaller screens */
        }
    }
</style>

@endsection
