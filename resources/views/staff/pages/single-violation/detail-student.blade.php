@extends('staff.fulllayouts.app')

@section('title')
    Detail Siswa
@endsection

@section('style')
    <style>
        .label-profile {
            width: 100%;
            text-align: left;
            display: flex;
            justify-content: space-between;
        }
        .select2 {
            width: 100% !important;
        }

        .select2-selection__rendered {
            width: 100%;
            height: 36px;
            padding: 6px 12px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .select2-selection {
            height: fit-content !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
        }
    </style>
@endsection

@section('content')
    <h2 class="text-white ms-3"><b>Catatan Pelanggaran & Perbaikan</b></h2>
    <h4 class="text-white ms-3 mb-5">{{ $classroomStudent->student->user->name }}</h4>

    <div class="row">
        <div class="col-lg-3">
            <div class="col-lg-12">
                <div class="card rounded-4">
                    <div class="card-body">
                        <h5><b>Profil Siswa</b></h5>
                        <div class="text-center">
                            <img src="{{ $classroomStudent->student->image ? asset('storage/'. $classroomStudent->student->image) : asset('admin_assets/dist/images/profile/user-1.jpg') }}" alt=""
                                class="img-fluid rounded-circle" width="125" height="125">
                            <div class="d-flex align-items-center justify-content-center my-4 gap-3">
                                <h5><b>{{ $classroomStudent->student->user->name }}</b></h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>RFID</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>0923892733834</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>Kelas</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>{{ $classroomStudent->classroom->name }}</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>Jenis Kelamin</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>{{ $classroomStudent->student->gender->label() }}</h6>
                                <hr class="full-width-hr">
                            </div>
                            <div class="col-5 d-flex align-items-center">
                                <h6 class="label-profile"><b>Agama</b>:</h6>
                            </div>
                            <div class="col-7 d-flex align-items-center">
                                <h6>{{ $classroomStudent->student->religion->name }}</h6>
                                <hr class="full-width-hr">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card rounded-4">
                    <div class="card-body">
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

                        <div class="card position-relative mt-3 py-3 rounded-4"
                            style="background: linear-gradient(135deg, #51B6FF, #4F7CFF); color: #fff;">
                            <div class="card-body p-3" style="background: none;">
                                <h6 class="text-light text-center" style="font-size: 24px"><b>Jumlah Point</b></h6>
                                <h1 class="text-light text-center" style="font-size: 48px"><b>{{ $classroomStudent->student->point }}</b></h1>
                                <p class="card-text text-center" style="font-size: 13px">Siswa dapat melakukan perbaikan
                                    untuk
                                    mengurangi poin.</p>
                                <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Image"
                                    class="position-absolute"
                                    style="bottom: 0; right: 0; width: 130px; height: auto; margin-bottom: 0px; margin-right: 0px; border-bottom-right-radius: 10px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card rounded-4">
                <div class="card-body">
                    <h5 style="border-bottom: 2px solid #CCCCCC; padding-bottom: 13px;">Daftar pelanggaran & Perbaikan</h5>
                    <div class="text-light rounded-3 p-8 border mt-4 position-relative" style="background-color: #5D87FF;">
                        <div class="p-2" style="position: relative; z-index: 10;">
                            <div class="d-flex align-items-center gap-2 mb-2 pt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m12 2l.642.005l.616.017l.299.013l.579.034l.553.046c4.687.455 6.65 2.333 7.166 6.906l.03.29l.046.553l.041.727l.006.15l.017.617L22 12l-.005.642l-.017.616l-.013.299l-.034.579l-.046.553c-.455 4.687-2.333 6.65-6.906 7.166l-.29.03l-.553.046l-.727.041l-.15.006l-.617.017L12 22l-.642-.005l-.616-.017l-.299-.013l-.579-.034l-.553-.046c-4.687-.455-6.65-2.333-7.166-6.906l-.03-.29l-.046-.553l-.041-.727l-.006-.15l-.017-.617l-.004-.318v-.648l.004-.318l.017-.616l.013-.299l.034-.579l.046-.553c.455-4.687 2.333-6.65 6.906-7.166l.29-.03l.553-.046l.727-.041l.15-.006l.617-.017Q11.673 2 12 2m0 9h-1l-.117.007a1 1 0 0 0 0 1.986L11 13v3l.007.117a1 1 0 0 0 .876.876L12 17h1l.117-.007a1 1 0 0 0 .876-.876L14 16l-.007-.117a1 1 0 0 0-.764-.857l-.112-.02L13 15v-3l-.007-.117a1 1 0 0 0-.876-.876zm.01-3l-.127.007a1 1 0 0 0 0 1.986L12 10l.127-.007a1 1 0 0 0 0-1.986z" />
                                </svg>
                                <h5 class="text-light mb-0">Informasi</h5>
                            </div>
                            <ul style="list-style-type: disc; padding-left: 20px;">
                                <li>Siswa melanggar akan di berikan point yang setimpal dengan apa yang telah dilanggar</li>
                                <li>Guru diharuskan untuk menindak lanjuti siswa yang mempunyai banyak point Pelanggaran
                                </li>
                            </ul>
                        </div>

                        <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Left Image"
                            style="position: absolute; bottom: -5px; left: 5px; width: auto; height: 120px; border-bottom-right-radius: 15px; transform: rotate(90deg); z-index: 0;">

                        <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Right Image"
                            style="position: absolute; bottom: 0; right: 0; width: auto; height: 120px; border-bottom-right-radius: 15px;">
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4 mb-4">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#violation" role="tab"
                                    aria-selected="true">
                                    <span>Pelanggaran</span>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#repair" role="tab" aria-selected="false"
                                    tabindex="-1">
                                    <span>Perbaikan</span>
                                </a>
                            </li>
                        </ul>

                        <div>
                            <button id="btn-add-violation" data-id="{{ $classroomStudent->student_id }}" class="btn-create-violation btn btn-warning me-2">
                                <span class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M7.467.133a1.75 1.75 0 0 1 1.066 0l5.25 1.68A1.75 1.75 0 0 1 15 3.48V7c0 1.566-.32 3.182-1.303 4.682c-.983 1.498-2.585 2.813-5.032 3.855a1.7 1.7 0 0 1-1.33 0c-2.447-1.042-4.049-2.357-5.032-3.855C1.32 10.182 1 8.566 1 7V3.48a1.75 1.75 0 0 1 1.217-1.667Zm.61 1.429a.25.25 0 0 0-.153 0l-5.25 1.68a.25.25 0 0 0-.174.238V7c0 1.358.275 2.666 1.057 3.86c.784 1.194 2.121 2.34 4.366 3.297a.2.2 0 0 0 .154 0c2.245-.956 3.582-2.104 4.366-3.298C13.225 9.666 13.5 8.36 13.5 7V3.48a.25.25 0 0 0-.174-.237zM8.75 4.75v3a.75.75 0 0 1-1.5 0v-3a.75.75 0 0 1 1.5 0M9 10.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                    </svg>
                                </span>
                                Tambah Pelanggaran
                            </button>

                            <button id="btn-add-repair" data-id="{{ $classroomStudent->student_id }}" class="btn-create-repair btn btn-success" style="display: none;">
                                <span class="me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                        <g fill="none">
                                            <rect width="38" height="26" x="5" y="16" stroke="currentColor" stroke-linejoin="round" stroke-width="4" rx="3" />
                                            <path fill="currentColor" d="M19 8h10V4H19zm11 1v7h4V9zm-12 7V9h-4v7zm11-8a1 1 0 0 1 1 1h4a5 5 0 0 0-5-5zM19 4a5 5 0 0 0-5 5h4a1 1 0 0 1 1-1z" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M18 29h12m-6-6v12" />
                                        </g>
                                    </svg>
                                </span>
                                Tambah Perbaikan
                            </button>

                        </div>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane active" id="violation" role="tabpanel">
                            @include('staff.pages.single-violation.panes.violation')
                        </div>
                        <div class="tab-pane" id="repair" role="tabpanel">
                            @include('staff.pages.single-violation.panes.repair')
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @include('staff.pages.single-violation.widgets.add-violation')
    @include('staff.pages.single-violation.widgets.add-reapir')

@endsection

@section('script')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('start_date').value = today;
            document.getElementById('end_date').value = today;
        });
    </script>
    @include('staff.pages.single-violation.scripts.button-script')
    @include('staff.pages.single-violation.scripts.tab-script')
    @include('staff.pages.single-violation.scripts.select2-script')

@endsection
