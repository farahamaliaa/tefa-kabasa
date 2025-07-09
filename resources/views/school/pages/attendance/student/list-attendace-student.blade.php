@extends('school.layouts.app')
@section('content')
<div class="card bg-light-primary shadow-none position-relative overflow-hidden border border-primary">
    <div class="card-body px-4 py-4">
        <div class="row align-items-center">
            <div class="col-12">
                <h4 class="fw-semibold mb-8 text-dark">Absensi Kehadiran</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-dark fs-3" aria-current="page">{{ $classroom->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 mb-3">
        <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control search-chat py-2 px-5 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>
            <div class="d-flex gap-2">
                <div class="form-group">
                    <input type="date" name="date" class="form-control" value="{{ request('date') }}">
                </div>
                <button type="submit" class="btn btn-primary">Filter</button>
            </div>
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('school.attendance-student-export.show', ['classroom' => $classroom->id]) }}" type="button" class="btn mb-1 btn-success">
                Export
            </a>
        </div>
    </div>
</div>


<div class="table-responsive rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle text-center">
        <thead class="text-dark fs-4">
            <tr class="">
                <th class="fs-4 fw-semibold mb-0">No</th>
                <th class="fs-4 fw-semibold mb-0">Nama</th>
                <th class="fs-4 fw-semibold mb-0">Masuk</th>
                <th class="fs-4 fw-semibold mb-0">Pulang</th>
                <th class="fs-4 fw-semibold mb-0">Point</th>
                <th class="fs-4 fw-semibold mb-0">Status</th>
                <th class="fs-4 fw-semibold mb-0">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- @dd($attendances) --}}
            @forelse ($attendances as $attendance)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $attendance->student->user->name }}</td>
                <td>{{ Carbon\Carbon::parse($attendance->attendances->first()->checkin)->format('H.i') }}</td>
                <td>{{ $attendance->attendances->first()->checkout ? Carbon\Carbon::parse($attendance->attendances->first()->checkout)->format('H.i') : '-' }}</td>
                <td>{{ $attendance->attendances->first()->point }}</td>
                <td>{{ $attendance->attendances->first()->status == 'present' ? 'Masuk' : ($attendance->attendances->first()->status == 'sick' ? 'Sakit' : ($attendance->attendances->first()->status == 'alpha' ? 'Alpha' : ($attendance->attendances->first()->status == 'permit' ? 'Izin' : ($attendance->attendances->first()->status == 'late' ? 'Telat' : '')))) }}</td>
                <td>
                    <button type="button" class="btn mb-1 btn-light-primary text-primary btn-sm px-4 fs-2 font-medium" data-bs-toggle="modal" data-bs-target="#modal-import">
                        Upload
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center align-middle">
                    <div class="d-flex flex-column justify-content-center align-items-center">
                        <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                        <p class="fs-5 text-dark text-center mt-2">
                            Siswa belum ditambahkan
                        </p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$attendances" />
    </div> --}}

<!-- modal upload -->
<div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Upload Surat Izin Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                        <form class="mt-3">
                            <input class="form-control" type="file" id="formFile">
                        </form>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                        <select id="pengajar" class="form-select">
                            <option value="1">izin</option>
                            <option value="2">sakit</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-rounded btn-info">Kirim</button>
            </div>
        </div>
    </div>
</div>

<!-- modal edit -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Surat Izin Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="form-group">
                        <label for="" class="mb-2">Surat izin siswa<span class="text-d">*</span></label>
                        <input class="form-control mb-2" type="file" id="formFile">
                        <small class="text-info">Download</small>
                    </div>
                    <div class="form-group">
                        <label for="" class="mb-2 pt-3">Status<span class="text-d">*</span></label>
                        <select id="pengajar" class="form-select">
                            <option value="1">izin</option>
                            <option value="2">sakit</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-rounded btn-info">Simpan</button>
            </div>
        </div>
    </div>
</div>
@endsection
