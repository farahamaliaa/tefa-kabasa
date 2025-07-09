@extends('school.layouts.app')

@section('content')
    <div class="card bg-light-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8 text-primary">Detail Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-primary" aria-current="page">Siswa - {{ $classroom->name }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <span class="mb-1 badge bg-primary p-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                </svg>
            </span>
            <h5 class="ms-2 mb-1 fw-semibold">Data Absensi Siswa</h5>
        </div>

        <div class="d-flex gap-2">
            <form action="" class="d-flex gap-2 align-items-center ms-2">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                <button type="submit" class="btn btn-primary">Cari</button>
            </form>
            <a href="{{ route('school.detail-presence-class.export-preview', $classroom->id) }}" class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none">
                        <path
                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor"
                            d="M16.9 3a1.1 1.1 0 0 1 1.094.98L18 4.1V7h1a3 3 0 0 1 2.995 2.824L22 10v7a2 2 0 0 1-1.85 1.995L20 19h-2v1.9a1.1 1.1 0 0 1-.98 1.094L16.9 22H7.1a1.1 1.1 0 0 1-1.094-.98L6 20.9V19H4a2 2 0 0 1-1.995-1.85L2 17v-7a3 3 0 0 1 2.824-2.995L5 7h1V4.1a1.1 1.1 0 0 1 .98-1.094L7.1 3zM16 16H8v4h8zm3-7H5a1 1 0 0 0-.993.883L4 10v7h2v-1.9a1.1 1.1 0 0 1 .98-1.094L7.1 14h9.8a1.1 1.1 0 0 1 1.094.98l.006.12V17h2v-7a1 1 0 0 0-1-1m-2 1a1 1 0 0 1 .117 1.993L17 12h-2a1 1 0 0 1-.117-1.993L15 10zm-1-5H8v2h8z" />
                    </g>
                </svg>
                Cetak Absensi
            </a>
        </div>
    </div>

    <div class="card card-body mt-3">
        <h5 class="mb-4">Data Absensi</h5>

        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr class="">
                        <th class="text-white" style="background-color: #5D87FF;">No</th>
                        <th class="text-white" style="background-color: #5D87FF;">Nama Pengguna</th>
                        <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                        <th class="text-white" style="background-color: #5D87FF;">Pulang</th>
                        <th class="text-white" style="background-color: #5D87FF;">Point</th>
                        <th class="text-white" style="background-color: #5D87FF;">Status</th>
                        <th class="text-white" style="background-color: #5D87FF;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($attendances as $attendance)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $attendance->student->user->name }}</td>
                            <td>{{ $attendance->attendances->first()->checkin ? Carbon\Carbon::parse($attendance->attendances->first()->checkin)->format('H.i') : '-' }}
                            </td>
                            <td>{{ $attendance->attendances->first()->checkout ? Carbon\Carbon::parse($attendance->attendances->first()->checkout)->format('H.i') : '-' }}
                            </td>
                            <td>{{ $attendance->attendances->first()->point }}</td>
                            <td>
                                <span class="badge {{ $attendance->attendances->first()->status->color() }}">
                                    {{ $attendance->attendances->first()->status->label() }}
                                </span>
                            </td>
                            <td>
                                <button type="button" data-id="{{ $attendance->attendances->first()->id }}"
                                    class="btn mb-1 btn-upload
                            {{ $attendance->attendances->first()->proof == null ? 'btn-light-primary text-primary' : 'btn-light-warning text-warning' }}
                            btn-sm px-4 fs-2 font-medium">
                                    {{ $attendance->attendances->first()->proof == null ? 'Upload' : 'Edit' }} Bukti
                                </button>
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

    @include('school.pages.statistic-presence.widgets.modal-upload')
@endsection

@section('script')
    @include('school.pages.statistic-presence.script.btn-upload')
@endsection
