<div class="row me-3">
    <div class="col-lg-12 col-md-12">
        @forelse ($teacherJournals->take(3) as $teacherJournal)
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100">
                    <div class="card-header bg-primary" style="border-radius: 0.50rem;">
                        <h4 class="mb-0 text-white card-title">
                            {{ $teacherJournal->lessonSchedule->classroom->name }} -
                            {{ $teacherJournal->lessonSchedule->teacherSubject->subject->name }}
                        </h4>
                        <div class="position-absolute top-0 end-0" style="padding: 0px; position: relative;">
                            <img src="{{ asset('assets/images/background/arrow-leftwarning.png') }}" alt="Description"
                                class="img-fluid" style="max-width: 210px; height: auto; position: relative;">
                            <span class="d-flex align-items-center ms-5"
                                style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-weight: bold;width: 100%; font-size: 13px">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="18" height="18"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 12h5v5h-5zm7-9h-1V1h-2v2H8V1H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2m0 2v2H5V5zM5 19V9h14v10z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($teacherJournal->date)->translatedFormat('d F Y') }}
                            </span>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row pb-2" style="border-bottom: 1px solid #c0c0c0">
                            <div class="col-lg-8 col-12 mb-3 mb-lg-0" style="border-right: 1px solid #c0c0c0;">
                                <div class="pe-lg-3">
                                    <h5 class="card-title mb-4">Deskripsi:</h5>
                                    <p>{{ Str::limit($teacherJournal->description, 130) }}</p>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <div class="ps-lg-3">
                                    <h5 class="card-title mb-4 ms-lg-5 ps-lg-3">Rekap Absensi:</h5>
                                    <div class="row px-lg-5">
                                        <div class="col-4">
                                            <div class="text-center">
                                                <span class="badge bg-light-primary text-primary fs-7 fw-semibold mb-1 py-2">
                                                    {{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::PERMIT)->count() }}
                                                </span>
                                                <p class="mb-0">Izin</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center">
                                                <span class="badge bg-light-warning text-warning fs-7 fw-semibold mb-1 py-2">
                                                    {{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::SICK)->count() }}
                                                </span>
                                                <p class="mb-0">Sakit</p>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="text-center">
                                                <span class="badge bg-light-danger text-danger fs-7 fw-semibold mb-1 py-2">
                                                    {{ $teacherJournal->attendanceJournals->where('status', App\Enums\AttendanceEnum::ALPHA)->count() }}
                                                </span>
                                                <p class="mb-0">Alfa</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('teacher.journals.show', $teacherJournal->id) }}" class="btn btn-primary">
                                Lihat Detail Jurnal
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="mb-1" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76" />
                                </svg>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        @empty
            <div class="text-center align-middle">
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                        width="300px">
                    <p class="fs-5 text-dark text-center mt-2">
                        Belum ada data
                    </p>
                </div>
            </div>
        @endforelse
    </div>
</div>
