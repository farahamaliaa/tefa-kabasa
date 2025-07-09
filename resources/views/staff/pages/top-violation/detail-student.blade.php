@extends('staff.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-3">
            <div class=" d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden border">
                    <div class="card-body p-4">
                        <h5 class="card-title fw-semibold">
                            Profil Siswa
                        </h5>
                        <div class="text-center">
                            <img src="{{ $student->image ? asset('storage/'. $student->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}" alt=""
                                class="img-fluid rounded-circle" width="125" height="125">
                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                <h5><b>{{ $student->user->name }}</b></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 d-flex align-items-center">
                                <h6><b>RFID :</b></h6>
                            </div>
                            <div class="col-7">
                                <h6>{{ $student->modelHasRfid ? $student->modelHasRfid->rfid : 'Tidak ada rfid' }}</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6><b>Kelas :</b></h6>
                            </div>
                            <div class="col-7">
                                <h6>{{ $student->classroomStudents->isNotEmpty() ? $student->classroomStudents->first()->classroom->name : 'Tidak dalam kelas' }}</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6><b>Jenis Kelamin :</b></h6>
                            </div>
                            <div class="col-7">
                                <h6>{{ $student->gender->label() }}</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6><b>Agama :</b></h6>
                            </div>
                            <div class="col-7">
                                <h6>{{ $student->religion->name }}</h6>
                                <hr class="full-width-hr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class=" d-flex align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden border">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center">
                            <h5 class="card-title fw-semibold mb-0 me-1">
                                <b>Total Point</b>
                            </h5>
                            <div class="d-flex align-items-center justify-content-center"
                                style="width: 24px; height: 24px; background-color: #FEF5E5; border-radius: 50%;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"
                                    style="color: #FFAE1F;">
                                    <path fill="currentColor"
                                        d="M15.333 9.5A3.5 3.5 0 0 0 8.8 7.75a1 1 0 0 0 1.733 1a1.5 1.5 0 0 1 1.3-.75a1.5 1.5 0 1 1 0 3h-.003a1 1 0 0 0-.19.039a1 1 0 0 0-.198.04a1 1 0 0 0-.155.105a1 1 0 0 0-.162.11a1 1 0 0 0-.117.174a1 1 0 0 0-.097.144a1 1 0 0 0-.043.212a1 1 0 0 0-.035.176v1l.002.011v.491a1 1 0 0 0 1 .998h.003a1 1 0 0 0 .998-1.002l-.002-.662A3.49 3.49 0 0 0 15.333 9.5m-4.203 6.79a1 1 0 0 0 .7 1.71a1.04 1.04 0 0 0 .71-.29a1.015 1.015 0 0 0 0-1.42a1.034 1.034 0 0 0-1.41 0" />
                                </svg>
                            </div>
                        </div>


                        <div class="card position-relative mt-3 py-3"
                            style="background: linear-gradient(135deg, #51B6FF, #4F7CFF); color: #fff;">
                            <div class="card-body p-3" style="background: none;">
                                <h6 class="text-light text-center" style="font-size: 24px"><b>Jumlah Point</b></h6>
                                <h1 class="text-light text-center" style="font-size: 48px"><b>{{ $student->point }}</b></h1>
                                <p class="card-text text-center" style="font-size: 13px">Siswa dapat melakukan perbaikan
                                    untuk
                                    mengurangi poin.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="align-items-stretch">
                <div class="card w-100 position-relative overflow-hidden border" style="background-color: #FEF5E5">
                    <div class="card-body">
                        <h4><b>Perhatian</b></h4>
                        <ul style="list-style-type:disc; padding-left: 20px;">
                            <li style="padding-bottom: 3px">Siswa melanggar akan di berikan point yang setimpal dengan apa
                                yang telah dilanggar</li>
                            <li>Guru diharuskan untuk menindak lanjuti siswa yang mempunyai banyak point Pelanggaran</li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <span class="mb-1 badge bg-primary p-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                        </svg>
                    </span>
                    <h4 class="ms-3 mb-0"><b>Daftar Pelanggaran dan Perbaikan</b></h4>
                </div>

                <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row border" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link d-flex align-items-center active" data-bs-toggle="tab" href="#student"
                            role="tab" aria-selected="true">
                            <span class="d-none d-md-block">Pelanggaran</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link d-flex align-items-center" data-bs-toggle="tab" href="#class" role="tab"
                            aria-selected="false" tabindex="-1">
                            <span class="d-none d-md-block">Perbaikan</span>
                        </a>
                    </li>
                    <div class="d-flex ms-auto">
                        <a href="{{ route('employee.violation.student-repair.index') }}" type="button" class="btn btn-success me-2 d-none" id="tambah-perbaikan">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="20" height="20" viewBox="0 0 48 48">
                                <g fill="none">
                                    <rect width="38" height="26" x="5" y="16" stroke="currentColor"
                                        stroke-linejoin="round" stroke-width="4" rx="3" />
                                    <path fill="currentColor"
                                        d="M19 8h10V4H19zm11 1v7h4V9zm-12 7V9h-4v7zm11-8a1 1 0 0 1 1 1h4a5 5 0 0 0-5-5zM19 4a5 5 0 0 0-5 5h4a1 1 0 0 1 1-1z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="4" d="M18 29h12m-6-6v12" />
                                </g>
                            </svg>
                            Tambah Perbaikan</a>
                        <a href="{{ route('employee.violation.students') }}" type="button" class="btn btn-warning d-none" id="tambah-pelanggaran">
                            <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="20" height="20"
                                viewBox="0 0 16 16">
                                <path fill="currentColor"
                                    d="M7.467.133a1.75 1.75 0 0 1 1.066 0l5.25 1.68A1.75 1.75 0 0 1 15 3.48V7c0 1.566-.32 3.182-1.303 4.682c-.983 1.498-2.585 2.813-5.032 3.855a1.7 1.7 0 0 1-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 0 1 1.217-1.667Zm.61 1.429a.25.25 0 0 0-.153 0l-5.25 1.68a.25.25 0 0 0-.174.238V7c0 1.358.275 2.666 1.057 3.86c.784 1.194 2.121 2.34 4.366 3.297a.2.2 0 0 0 .154 0c2.245-.956 3.582-2.104 4.366-3.298C13.225 9.666 13.5 8.36 13.5 7V3.48a.25.25 0 0 0-.174-.237zM8.75 4.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 1.5 0M9 10.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                            </svg>
                            Tambah
                            Pelanggaran</a>
                    </div>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane active show" id="student" role="tabpanel">
                        @include('staff.pages.top-violation.panes.student-detail.violation')
                    </div>
                    <div class="tab-pane" id="class">
                        @include('staff.pages.top-violation.panes.student-detail.repair')
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    @include('staff.pages.top-violation.script.script-tab')
    @include('staff.pages.top-violation.script.script-button')
@endsection
