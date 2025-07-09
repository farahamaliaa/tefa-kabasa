@extends('school.layouts.app')
@section('content')
<div class="card bg-light-info shadow-none position-relative overflow-hidden">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8" style="color: #5D87FF">Ekspor Data Absensi </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-primary">
                            Siswa -
                        </li>
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
                                    isi filter di bawah untuk ekspor data absensi sesuai tanggal yang dibutuhkan
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div>
                <form id="form-action" class="row">
                    <div class="col-lg-8 col-md-12 gap-2 d-flex">
                        <div class="form-group">
                            <label for="startDate" class="mb-2">Tanggal Awal</label>
                            <input type="date" class="form-control" id="startDate" name="start" value="{{ request('start', now()->format('Y-m-d')) }}">
                        </div>
                        <div class="form-group ms-2">
                            <label for="endDate" class="mb-2">Tanggal Akhir</label>
                            <input type="date" class="form-control" id="endDate" name="end" value="{{ request('end', now()->format('Y-m-d')) }}">
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 col-md-12 d-flex justify-content-end">
                        <div class="form-group">
                            <button type="submit" data-id="{{ $classroom->id }}" class="btn-review btn btn-warning ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14" />
                                </svg>
                                Tampilkan
                            </button>
                        </div>
                        <div>
                            <button type="submit" data-id="{{ $classroom->id }}" class="btn-export btn btn-success ms-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                    <g fill="none">
                                        <path d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                        <path fill="currentColor" d="M16.9 3a1.1 1.1 0 0 1 1.094.98L18 4.1V7h1a3 3 0 0 1 2.995 2.824L22 10v7a2 2 0 0 1-1.85 1.995L20 19h-2v1.9a1.1 1.1 0 0 1-.98 1.094L16.9 22H7.1a1.1 1.1 0 0 1-1.094-.98L6 20.9V19H4a2 2 0 0 1-1.995-1.85L2 17v-7a3 3 0 0 1 2.824-2.995L5 7h1V4.1a1.1 1.1 0 0 1 .98-1.094L7.1 3zM16 16H8v4h8zm3-7H5a1 1 0 0 0-.993.883L4 10v7h2v-1.9a1.1 1.1 0 0 1 .98-1.094L7.1 14h9.8a1.1 1.1 0 0 1 1.094.98l.006.12V17h2v-7a1 1 0 0 0-1-1m-2 1a1 1 0 0 1 .117 1.993L17 12h-2a1 1 0 0 1-.117-1.993L15 10zm-1-5H8v2h8z" />
                                    </g>
                                </svg>
                                Ekspor
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="card">
    <div class="card-body">
        <h5 class="mb-4">Preview Absensi</h5>
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
                <thead class="text-dark fs-4 bg-primary">
                    <tr class="">
                        <th class="text-white" style="background-color: #5D87FF;">No</th>
                        <th class="text-white" style="background-color: #5D87FF;">Nama</th>
                        <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                        <th class="text-white" style="background-color: #5D87FF;">Pulang</th>
                        <th class="text-white" style="background-color: #5D87FF;">Poin</th>
                        <th class="text-white" style="background-color: #5D87FF;">Max Point</th>
                        <th class="text-white" style="background-color: #5D87FF;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->student->user->name }}</td>
                        <td>{{ $attendance->attendances->first()->checkin }}</td>
                        <td>{{ $attendance->attendances->first()->checkout }}</td>
                        <td>{{ $attendance->attendances->first()->point }}</td>
                        <td>{{ $attendance->attendances->first()->point }}</td>
                        <td>{{ $attendance->attendances->first()->status == 'present' ? 'Masuk' : ($attendance->attendances->first()->status == 'sick' ? 'Sakit' : ($attendance->attendances->first()->status == 'alpha' ? 'Alpha' : ($attendance->attendances->first()->status == 'permit' ? 'Izin' : ($attendance->attendances->first()->status == 'late' ? 'Telat' : '')))) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Belum ada data
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
        $('.btn-preview').on('click', function() {
            var id = $(this).data('id');
            $('#form-action').attr('action', '{{ route('school.student-attendance.show', '') }}/' + id);
        });

        $('.btn-export').on('click', function() {
            var id = $(this).data('id');
            $('#form-action').attr('action', '{{ route('school.student-attendance.export', '') }}/' + id);
        });
    </script>
@endsection
