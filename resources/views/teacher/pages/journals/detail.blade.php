@php
    use Carbon\Carbon;
    use App\Enums\AttendanceEnum;
@endphp
@extends('teacher.layouts.app')

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden mb-4">
        <div class="card-body px-4 py-4">
            <div class="d-flex justify-content-between">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold mb-8 text-white">Pengisian Jurnal</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item text-white fs-3" aria-current="page">{{ $journal->lessonSchedule->teacherSubject->subject->name }} - {{ $journal->lessonSchedule->classroom->name }}</li>
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
                <h4 class="ms-3 mb-0">Detail Jurnal</h4>
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

    {{-- <div class="card bg-light-primary shadow-none position-relative overflow-hidden rounded-top-0">
        <div class="card-body px-1 py-0">
            <div class="card-body py-3">
                <div class="d-flex gap-4">
                    <div>
                        <h4><b>Siswa Masuk</b></h4>
                        <h5>89 Masuk</h5>
                    </div>
                    <div class="border-end border-dark"></div>
                    <div>
                        <h4><b>Siswa Izin</b></h4>
                        <h5>89 Masuk</h5>
                    </div>
                    <div class="border-end border-dark"></div>
                    <div>
                        <h4><b>Siswa Sakit</b></h4>
                        <h5>89 Masuk</h5>
                    </div>
                    <div class="border-end border-dark"></div>
                    <div>
                        <h4><b>Siswa Alpha</b></h4>
                        <h5>89 Masuk</h5>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="card shadow">
        <div class="card-body pt-3">
            <h4 class="pb-3">Laporan Kegiatan</h4>
            <div class="form-group">
                <h6 class="mt-4">Judul</h6>
                <input type="text" class="form-control" id="nametext" aria-describedby="name"
                    placeholder="Maling Rambutan" value="{{ $journal->title }}">
            </div>
            <div class="form-group">
                <h6 class="mt-4">Isi Laporan</h6>
                <textarea class="form-control" rows="8"
                    placeholder="Pada pertemuan kali ini, ekstrakurikuler band berjalan dengan lancar. Latihan rutin diadakan setiap Selasa dan Kamis sore, dengan fokus pada teknik bermain musik dan kerjasama tim.
Kegiatan ini memberikan banyak manfaat, termasuk peningkatan bakat musik, rasa percaya diri, disiplin, dan kerjasama. Kami optimis ekstrakurikuler band akan terus berkembang dan meraih prestasi di masa depan.">{{ $journal->description }}</textarea>

            </div>
        </div>
    </div>

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
                                    <h4 class="text-success"><b>{{ $attendanceJournals->where('status', AttendanceEnum::PRESENT)->count() }}</b></h4>
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
                                    <h4 class="text-primary"><b>{{ $attendanceJournals->where('status', AttendanceEnum::PERMIT)->count() }}</b></h4>
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
                                    <h4 class="text-warning"><b>{{ $attendanceJournals->where('status', AttendanceEnum::SICK)->count() }}</b></h4>
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
                                    <h4 class="text-danger"><b>{{ $attendanceJournals->where('status', AttendanceEnum::ALPHA)->count() }}</b></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive rounded-2 mb-4 mt-4">
                <table class="table text-nowrap customize-table mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="text-white rounded-start" style="background-color: #5D87FF;">No</th>
                            <th class="text-white" style="background-color: #5D87FF;">Nama Siswa</th>
                            <th class="text-white" style="background-color: #5D87FF;">Kelas</th>
                            <th class="text-white text-center" style="background-color: #5D87FF;">Status Kehadiran</th>
                            <th class="text-white text-center" style="background-color: #5D87FF;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($attendanceJournals as $attendance)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $attendance->classroomStudent->student->user->name }}</td>

                                <td>{{ $attendance->classroomStudent->classroom->name }}</td>
                                <td class="text-center">
                                    @switch($attendance->status)
                                        @case(AttendanceEnum::SICK)
                                            <span class="mb-1 badge font-medium bg-light-warning text-warning w-25">Sakit</span>
                                        @break

                                        @case(AttendanceEnum::PERMIT)
                                            <span class="mb-1 badge font-medium bg-light-primary text-primary w-25">Izin</span>
                                        @break

                                        @case(AttendanceEnum::ALPHA)
                                            <span class="mb-1 badge font-medium bg-light-danger text-danger w-25">Alfa</span>
                                        @break

                                        @default
                                            <span class="mb-1 badge font-medium bg-light-success text-success w-25">Masuk</span>
                                    @endswitch
                                </td>

                                <td class="text-center">
                                    <button type="button" class="btn btn-primary btn-detail" data-bs-toggle="modal"
                                        data-bs-target="#modal-detail" data-attendance="{{ $attendance->id }}">Detail</button>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('teacher.pages.journals.wigets.detail')
    @endsection

    @section('script')
        <script>
            const attendanceStudents = @json($attendanceJournals);


            $('.btn-detail').click(function () {
                let classroomStudent = attendanceStudents.find(attendanceStudent => attendanceStudent.id == $(this).data('attendance')).classroom_student

                $('#name-detail').text(classroomStudent.student.user.name)
                $('#email-detail').text(classroomStudent.student.user.email)
                $('#phone-detail').text(classroomStudent.student.phone)
                $('#gender-detail').text(classroomStudent.student.gender)
                $('#birth-date-detail').text(classroomStudent.student.birth_date)
                $('#birth-place-detail').text(classroomStudent.student.birth_place)
                $('#number-kk-detail').text(classroomStudent.student.number_kk)
                $('#nik-detail').text(classroomStudent.student.nik)
                $('#order-child-detail').text(classroomStudent.student.order_child)
                $('#number-akta-detail').text(classroomStudent.student.number_akta)
                $('#count-siblings-detail').text(classroomStudent.student.count_siblings)
                $('#address-detail').text(classroomStudent.student.address)
                $('#classroom-detail').text(classroomStudent.classroom.name)
                $('#religion-detail').text(classroomStudent.student.religion_id)
                $('#nisn-detail').text(classroomStudent.student.nisn)

                $('#modal-detail').show('modal')
            });


        </script>
    @endsection
