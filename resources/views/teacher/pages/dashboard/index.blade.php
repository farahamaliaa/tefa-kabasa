@extends('teacher.layouts.app')

@section('style')
    <style>
        .scroll-container {
            white-space: nowrap;
            overflow-x: auto;
        }

        /* Customize scrollbar for WebKit browsers (Chrome, Safari) */
        .scroll-container::-webkit-scrollbar {
            height: 6px;
            /* Change height for horizontal scrollbar */
        }

        .scroll-container::-webkit-scrollbar-thumb {
            background-color: #888;
            /* Color of the scrollbar */
            border-radius: 10px;
            /* Rounded corners */
        }

        .scroll-container::-webkit-scrollbar-thumb:hover {
            background-color: #555;
            /* Color when hovered */
        }

        /* Firefox (using scrollbar-width) */
        .scroll-container {
            scrollbar-width: thin;
            /* Reduce scrollbar size in Firefox */
            scrollbar-color: #888 #f0f0f0;
            /* Thumb and track colors */
        }
    </style>

@endsection

@section('content')

    @if (!empty($notifications))
        @foreach ($notifications as $notification)
            <div class="alert alert-warning">
                {{ $notification }}
            </div>
        @endforeach
    @endif

    <div class="row">
        <div class="col-lg-12">
            @include('teacher.pages.dashboard.panes.profile')
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body d-flex justify-content-between">
                    <div class="">
                        <h4 class="mb-3">Absensi Hari Ini:</h4>
                        @if ($todayAttendance != null)
                            <h4>{{ $todayAttendance->created_at->format('d M Y') }} - {{ $todayAttendance->checkin }}</h4>
                        @else
                            <p class="badge bg-light-danger text-danger">Anda belum absen hari ini</p>
                        @endif
                    </div>
                    @if ($todayAttendance != null)
                        <div
                            class="badge bg-light-{{ $todayAttendance->status->color() }} text-{{ $todayAttendance->status->color() }} fs-6 pt-4 px-5">
                            {{ $todayAttendance->status->label() }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="card card-body">
        <h4>Jadwal Mengajar</h4>
        <ul class="nav nav-pills mt-3 rounded align-items-center flex-row" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-senin-tab" data-bs-toggle="pill" href="#pills-senin" role="tab"
                    aria-controls="pills-senin" aria-selected="true">
                    Senin
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-selasa-tab" data-bs-toggle="pill" href="#pills-selasa" role="tab"
                    aria-controls="pills-selasa" aria-selected="false">
                    Selasa
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-rabu-tab" data-bs-toggle="pill" href="#pills-rabu" role="tab"
                    aria-controls="pills-rabu" aria-selected="false">
                    Rabu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-kamis-tab" data-bs-toggle="pill" href="#pills-kamis" role="tab"
                    aria-controls="pills-kamis" aria-selected="false">
                    Kamis
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-jumat-tab" data-bs-toggle="pill" href="#pills-jumat" role="tab"
                    aria-controls="pills-jumat" aria-selected="false">
                    Jumat
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-sabtu-tab" data-bs-toggle="pill" href="#pills-sabtu" role="tab"
                    aria-controls="pills-sabtu" aria-selected="false">
                    Sabtu
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-minggu-tab" data-bs-toggle="pill" href="#pills-minggu" role="tab"
                    aria-controls="pills-minggu" aria-selected="false">
                    Minggu
                </a>
            </li>
        </ul>

        <div class="tab-content mt-4" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-senin" role="tabpanel" aria-labelledby="pills-senin-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-monday')
            </div>
            <div class="tab-pane fade" id="pills-selasa" role="tabpanel" aria-labelledby="pills-selasa-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-tuesday')
            </div>
            <div class="tab-pane fade" id="pills-rabu" role="tabpanel" aria-labelledby="pills-rabu-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-wednesday')
            </div>
            <div class="tab-pane fade" id="pills-kamis" role="tabpanel" aria-labelledby="pills-kamis-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-thursday')
            </div>
            <div class="tab-pane fade" id="pills-jumat" role="tabpanel" aria-labelledby="pills-jumat-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-friday')
            </div>
            <div class="tab-pane fade" id="pills-sabtu" role="tabpanel" aria-labelledby="pills-sabtu-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-saturday')
            </div>
            <div class="tab-pane fade" id="pills-minggu" role="tabpanel" aria-labelledby="pills-minggu-tab">
                @include('teacher.pages.dashboard.panes.schedule-tab.tab-sunday')
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            @include('teacher.pages.dashboard.panes.absence-history')
        </div>
    </div>

    <h4>Riwayat Jurnal</h4>
    <h6 class="mb-4">Daftar jurnal guru setelah berkegiatan mengajar</h6>

   <div class="row">
    <div class="col-lg-12">
         @include('teacher.pages.dashboard.panes.journal-history')
    </div>
   </div>

    @if ($teacherJournals->count() > 3)
        <a class="btn mb-5 waves-effect waves-light btn-outline-info w-100"
            href="{{ route('teacher.journals.index') }}">Lihat Selengkapnya
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                <path fill="currentColor"
                    d="M8.22 2.97a.75.75 0 0 1 1.06 0l4.25 4.25a.75.75 0 0 1 0 1.06l-4.25 4.25a.75.75 0 0 1-1.042-.018a.75.75 0 0 1-.018-1.042l2.97-2.97H3.75a.75.75 0 0 1 0-1.5h7.44L8.22 4.03a.75.75 0 0 1 0-1.06" />
            </svg>
        </a>
    @endif
@endsection

@section('script')
    @include('teacher.pages.dashboard.scripts.donut-chart')
@endsection
