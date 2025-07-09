@php
use Carbon\Carbon;
    use App\Enums\AttendanceEnum;
@endphp
@extends('teacher.layouts.app')

@section('style')
    <style>
        .select2-selection__rendered {
            width: 100% !important;
        }
    </style>
@endsection
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-4">
            <div class="d-flex justify-content-between">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8 text-white">Pengisian Jurnal</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-white fs-3" aria-current="page">{{ $teacherJournal->lessonSchedule->teacherSubject->subject->name }} - {{ $teacherJournal->lessonSchedule->classroom->name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex row me-0 mb-2 align-items-center">
        <div class="col-lg-6 col-md-12 mb-3">
            <div class="d-flex align-items-center">
                <span class="mb-1 badge bg-primary p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h4 class="ms-3 mb-0">Edit Jurnal</h4>
            </div>
        </div>
        <div class="col-lg-6 col-md-12 mb-3 p-0">
            <div class="d-flex align-items-center justify-content-end">
                <h4 class="ms-3 mb-0">Tanggal saat ini : </h4>
                <div class="badge bg-light-primary ms-3">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" class="text-primary"><path fill="currentColor" d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 16H5V10h14zm0-12H5V6h14zm-7 5h5v5h-5z"/></svg>
                        <h6 class="mt-2 ms-3 me-2 text-primary">{{ Carbon::now()->isoFormat('DD MMM YYYY') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('teacher.journals.update', $teacherJournal->id) }}" method="POST">
        @method('put')
        @csrf

        {{-- description --}}
        <div class="card shadow">
            <div class="card-body">
                <h5 class="fw-bold pb-3">Laporan Kegiatan</h5>
                <div class="form-group mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ $teacherJournal->title ?? '' }}">
                </div>
                <div class="form-group">
                    <label for="description" class="form-label">Tuliskan laporan di sini</label>
                    <textarea class="form-control" id="description" name="description" rows="5"
                        placeholder="Tuliskan deskripsi kegiatan di sini...">{{ $teacherJournal->description ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- attendance --}}
        <div class="card shadow">
            <div class="card-body pt-3">
                <h4 class="pb-3 mt-3">Presensi Siswa</h4>
                <div class="row g-2">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body py-3">
                                <div class="d-flex">
                                    <div class="border border-success"></div>
                                    <div class="ms-3">
                                        <h4>Jumlah Siswa Masuk</h4>
                                        <h4 class="text-success"><b>{{ $teacherJournal->attendanceJournals->where('status', AttendanceEnum::PRESENT)->count() }}</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body py-3">
                                <div class="d-flex">
                                    <div class="border border-primary"></div>
                                    <div class="ms-3">
                                        <h4>Jumlah Siswa Izin</h4>
                                        <h4 class="text-primary"><b>{{ $teacherJournal->attendanceJournals->where('status', AttendanceEnum::PERMIT)->count() }}</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body py-3">
                                <div class="d-flex">
                                    <div class="border border-warning"></div>
                                    <div class="ms-3">
                                        <h4>Jumlah Siswa Sakit</h4>
                                        <h4 class="text-warning"><b>{{ $teacherJournal->attendanceJournals->where('status', AttendanceEnum::SICK)->count() }}</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body py-3">
                                <div class="d-flex">
                                    <div class="border border-danger"></div>
                                    <div class="ms-3">
                                        <h4>Jumlah Siswa Alpha</h4>
                                        <h4 class="text-danger"><b>{{ $teacherJournal->attendanceJournals->where('status', AttendanceEnum::ALPHA)->count() }}</b></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive rounded-2 mb-4">
                    <table class="table text-nowrap customize-table mb-0 align-middle" id="student-table">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="text-white rounded-start" style="background-color: #5D87FF;">No</th>
                                <th class="text-white" style="background-color: #5D87FF;">Siswa</th>
                                <th class="text-white" style="background-color: #5D87FF;">Jenis Kelamin</th>
                                <th class="text-white" style="background-color: #5D87FF;">NISN</th>
                                <th class="text-white" style="background-color: #5D87FF;">NIK</th>
                                <th class="text-white" style="background-color: #5D87FF;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @dd($classroomStudents->attendanceJournals) --}}
                            @foreach ($classroomStudents as $classroomStudent)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $classroomStudent->classroomStudent->student->user->name }}</td>
                                    <td>{{ $classroomStudent->classroomStudent->student->gender->label() }}</td>
                                    <td>{{ $classroomStudent->classroomStudent->student->nisn }}</td>
                                    <td>{{ $classroomStudent->classroomStudent->student->nik }}</td>
                                    <td>
                                        <div class="d-flex gap-5 align-items-center">
                                            <div class="form-check">
                                                <input class="form-check-input" {{ $classroomStudent->status == AttendanceEnum::PRESENT ? 'checked' : '' }} type="radio"
                                                    name="attendance[{{ $classroomStudent->classroom_student_id }}]"
                                                    id="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::PRESENT->value }}"
                                                    value="{{ AttendanceEnum::PRESENT->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::PRESENT->value }}">
                                                    Masuk
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" {{ $classroomStudent->status == AttendanceEnum::PERMIT ? 'checked' : '' }} type="radio"
                                                    name="attendance[{{ $classroomStudent->classroom_student_id }}]"
                                                    id="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::PERMIT->value }}"
                                                    value="{{ AttendanceEnum::PERMIT->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::PERMIT->value }}">
                                                    Izin
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" {{ $classroomStudent->status == AttendanceEnum::SICK ? 'checked' : '' }} type="radio"
                                                    name="attendance[{{ $classroomStudent->classroom_student_id }}]"
                                                    id="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::SICK->value }}"
                                                    value="{{ AttendanceEnum::SICK->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::SICK->value }}">
                                                    Sakit
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" {{ $classroomStudent->status == AttendanceEnum::ALPHA ? 'checked' : '' }} type="radio"
                                                    name="attendance[{{ $classroomStudent->classroom_student_id }}]"
                                                    id="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::ALPHA->value }}"
                                                    value="{{ AttendanceEnum::ALPHA->value }}">
                                                <label class="form-check-label"
                                                    for="attendance-{{ $classroomStudent->classroom_student_id . '-' . AttendanceEnum::ALPHA->value }}">
                                                    Alpha
                                                </label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="d-flex gap-2 justify-content-end mb-5">
            <a href="{{ route('teacher.journals.index') }}" type="button" class="btn mb-1 btn-light-secondary">
                Kembali
            </a>
            <button type="submit" class="btn mb-1 btn-success" id="submit-btn">
                Simpan Laporan
            </button>
        </div>
    </form>
@endsection
