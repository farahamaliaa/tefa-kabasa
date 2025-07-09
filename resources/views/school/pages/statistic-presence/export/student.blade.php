@extends('school.layouts.app')
@section('content')
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8" style="color: #5D87FF">Cetak Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-primary">
                                Siswa - {{ $classroom->name }} </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div class="card bg-light-warning shadow-none position-relative overflow-hidden mb-4">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h4 class="fw-semibold mb-3 text-warning">Perhatian</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        Tentukan tanggal awal dan akhir terlebih dahulu untuk export absensi </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row me-n5">
                <form action="" method="GET" class="row align-items-end col-lg-10">
                    <div class="form-group col-lg-4">
                        <label for="startDate" class="mb-2">Tanggal Awal</label>
                        <input type="date" class="form-control" id="startDate" name="start" 
                            value="{{ request('start', now()->format('Y-m-d')) }}">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="endDate" class="mb-2">Tanggal Akhir</label>
                        <input type="date" class="form-control" id="endDate" name="end" 
                            value="{{ request('end', now()->format('Y-m-d')) }}">
                    </div>
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                            </svg>
                            Tampilkan
                        </button>
                    </div>
                </form>
            
                <form id="exportForm" action="{{ route('school.student-attendance.export', $classroom->id) }}" method="GET" class="row align-items-end col-lg-2 text-end">
                    <input type="hidden" id="exportStart" name="start">
                    <input type="hidden" id="exportEnd" name="end">
                    <button type="submit" class="btn btn-success" onclick="updateExportFormAction()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M16.9 3a1.1 1.1 0 0 1 1.094.98L18 4.1V7h1a3 3 0 0 1 2.995 2.824L22 10v7a2 2 0 0 1-1.85 1.995L20 19h-2v1.9a1.1 1.1 0 0 1-.98 1.094L16.9 22H7.1a1.1 1.1 0 0 1-1.094-.98L6 20.9V19H4a2 2 0 0 1-1.995-1.85L2 17v-7a3 3 0 0 1 2.824-2.995L5 7h1V4.1a1.1 1.1 0 0 1 .98-1.094L7.1 3zm3 13H8v4h8zm3-7H5a1 1 0 0 0-.993.883L4 10v7h2v-1.9a1.1 1.1 0 0 1 .98-1.094L7.1 14h9.8a1.1 1.1 0 0 1 1.094.98l.006.12V17h2v-7a1 1 0 0 0-1-1zm-2 1a1 1 0 0 1 .117 1.993L17 12h-2a1 1 0 0 1-.117-1.993L15 10zm-1-5H8v2h8z" />
                        </svg>
                        Ekspor
                    </button>
                </form>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Data Absensi</h5>
            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                    <thead class="text-dark fs-4 bg-primary">
                        <tr class="">
                            <th class="text-white" style="background-color: #5D87FF;">No</th>
                            <th class="text-white" style="background-color: #5D87FF;">Nama</th>
                            <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                            <th class="text-white" style="background-color: #5D87FF;">Pulang</th>
                            <th class="text-white" style="background-color: #5D87FF;">Poin</th>
                            <th class="text-white" style="background-color: #5D87FF;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendances as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->model->student->user->name }}</td>
                                <td>{{ $attendance->checkin ? Carbon\Carbon::parse($attendance->checkin)->format('H.i') : '-' }}</td>
                                <td>{{ $attendance->checkout ? Carbon\Carbon::parse($attendance->checkout)->format('H.i') : '-' }}</td>
                                <td>{{ $attendance->point }}</td>
                                <td>
                                    <span class="mb-1 badge font-medium {{ $attendance->status->color() }}">{{ $attendance->status->label() }}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center align-middle">
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                            width="300px">
                                        <p class="fs-5 text-dark text-center mt-2">
                                            Tidak ada kehadiran siswa
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    function updateExportFormAction() {
        document.getElementById('exportStart').value = document.getElementById('startDate').value;
        document.getElementById('exportEnd').value = document.getElementById('endDate').value;
    }
</script>
@endsection
