@extends('school.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6 mb-3">
            <form class="d-flex gap-2">
                <div class="position-relative">
                    <div class="">
                        <input type="text" name="name" value="{{ old('name', request('name')) }}" class="form-control search-chat py-2 px-5 ps-5" id="search-name"
                            placeholder="Cari">
                        <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                    </div>
                </div>

                <div class="d-flex gap-2">
                    {{-- <select name="year" class="form-select w-auto" id="search-status" style="width: 150px;">
                        <option value="">Select Year</option>
                        @foreach($schoolYears as $year)
                            <option value="{{ $year->school_year }}">{{ $year->school_year }}</option>
                        @endforeach
                    </select> --}}

                    <div class="form-group">
                        <input type="date" name="created_at" class="form-control" value="{{ request('created_at') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>

                </div>
            </form>
        </div>
        <div class="col-lg-6 mb-3">
            <div class="d-flex gap-2 justify-content-end">
                <a href="{{ route('presence-student.export-preview', $classroom->id) }}" type="button" class="btn mb-1 btn-success">
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
                @forelse ($attendances as $attendance)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $attendance->classroomStudent->student->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->checkin)->format('H:i') }}</td>
                        <td>{{ \Carbon\Carbon::parse($attendance->checkout)->format('H:i') }}</td>
                        <td>{{ $attendance->point }}</td>
                        <td>{{ $attendance->status == 'present' ? 'Masuk' : ($attendance->status == 'sick' ? 'Sakit' : ($attendance->status == 'alpha' ? 'Alpha' : ($attendance->status == 'permit' ? 'Izin' : ''))) }}</td>
                        <td>
                            <button type="button" class="btn mb-1 btn-light-primary text-primary btn-sm px-4 fs-2 font-medium"
                                data-bs-toggle="modal" data-bs-target="#modal-import">
                                Upload
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Data kosong</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination justify-content-end mb-0">
        <x-paginate-component :paginator="$attendances" />
    </div>

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
