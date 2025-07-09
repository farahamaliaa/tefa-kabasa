@extends('teacher.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-8 col-md-9">
                    <h4 class="fw-semibold mb-2 text-light">Absensi</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Riwayat absensi harian Guru</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-4 col-md-3 text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                        class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card border">
            <div class="card-body">
                <div class="">
                    <div class="table-responsive rounded-2 ">
                        <table class="table border text-nowrap customize-table mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="text-white" style="background-color: #5D87FF;">No</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Hari</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Tanggal</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Masuk</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Pulang</th>
                                    <th class="text-white" style="background-color: #5D87FF;">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($attendances as $attendance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ \Carbon\Carbon::parse($attendance->created_at)->translatedFormat('l') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($attendance->created_at)->translatedFormat('d F Y') }}</td>
                                        <td>{{ $attendance->checkin == null ? '-' : \Carbon\Carbon::parse($attendance->checkin)->format('H:i') }}</td>
                                        <td>{{ $attendance->checkout == null ? '-' : \Carbon\Carbon::parse($attendance->checkout)->format('H:i') }}</td>
                                        <td>
                                            <span class="badge {{ $attendance->status->color() }}">
                                                {{ $attendance->status->label() }}
                                            </span>
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center align-middle">
                                            <div class="d-flex flex-column justify-content-center align-items-center">
                                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}"
                                                    alt="" width="300px">
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
                    <div class="pagination justify-content-end mt-2 mb-0">
                        {{-- <x-paginate-component :paginator="$teachers" /> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
