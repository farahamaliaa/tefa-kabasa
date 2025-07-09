@extends('student.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8 text-white">Daftar Perbaikan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">Daftar perbaikan dan jumlah point siswa</a>
                            </li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/award.png') }}" alt=""
                            class="img-fluid mb-n3" style="width: 170px; height: 120px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column flex-md-row justify-content-between mb-4">
        <form class="d-flex flex-column flex-md-row" method="GET">
            <div class="mb-3 mb-md-0 me-md-3">
                <input type="text" name="search" value="{{ old('search', request('search')) }}" class="form-control"
                    placeholder="Cari..." value="">
            </div>

            <div class="row">
                <div class="col-6 mb-3">
                    <select name="point" class="form-select">
                        <option value="highest">Point Tertinggi</option>
                        <option value="lowest">Point Terendah</option>
                    </select>
                </div>

                <div class="col-6 mb-3">
                    <select name="order" class="form-select">
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mt-md-0 ms-md-3 mb-3">Filter</button>
        </form>
    </div>

    <div class="table-responsive rounded-2 mb-4">
        <table class="table border text-nowrap customize-table mb-0 align-middle">
            <thead class="text-dark fs-4">
                <tr class="">
                    <th>No</th>
                    <th>Jenis Perbaikan</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                    <th>Point</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($repairs as $repair)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($repair->repair, 30) }}</td>
                        <td>{{ \Carbon\Carbon::parse($repair->start_date)->translatedFormat('d F Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($repair->end_date)->translatedFormat('d F Y') }}</td>
                        <td>
                            <span
                                class="badge {{ $repair->is_approved == false ? 'bg-light-danger text-danger' : 'bg-light-success text-success' }}">{{ $repair->is_approved == false ? 'Belum Dikerjakan' : 'Sudah Dikerjakan' }}</span>
                        </td>
                        <td>
                            <span class="badge bg-light-success text-success">- {{ $repair->point }}
                                Point</span>
                        </td>
                        <td>
                            <button data-id="{{ $repair->id }}" data-employee="{{ $repair->employee->user->name }}"
                                data-student="{{ $repair->classroomStudent->student->user->name }}"
                                data-repair="{{ $repair->repair }}" data-point="{{ $repair->point }}"
                                data-start_date="{{ $repair->start_date }}" data-end_date="{{ $repair->end_date }}"
                                data-proof="{{ $repair->proof ? asset('storage/' . $repair->proof) : asset('admin_assets/dist/images/empty/no-data.png') }}"
                                class="btn {{ $repair->is_approved == false ? 'btn-upload' : 'btn-detail' }} btn-{{ $repair->is_approved == false ? 'warning' : 'primary' }} py-1 px-4">{{ $repair->is_approved == false ? 'Kirim Bukti' : 'Detail' }}</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center align-middle">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                    width="300px">
                                <p class="fs-5 text-dark text-center mt-2">
                                    Kamu belum pernah melanggar peraturan sekolah
                                </p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('student.pages.repair.widgets.modal-detail')
    @include('student.pages.repair.widgets.modal-upload')
@endsection

@section('script')
    @include('student.pages.repair.scripts.btn-script')
@endsection
