@extends('school.layouts.app')

@section('content')
<div class="card card-body">
    <div class="card bg-light-warning border-warning border-1 shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-4">
            <div class="row align-items-center">
                <div class="col-12">
                    <h4 class="fw-semibold mb-8 text-dark">Informasi</h4>
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb ms-3" style="list-style-type: disc;">
                            <li class="text-dark fs-3" aria-current="page">Pada Pengaturan Awal, Jam Pelajaran Dimulai Pada Jam 07:00.</li>
                            <li class="text-dark fs-3" aria-current="page">Saat Anda Menambah Jam Pelajaran, Hanya Perlu Menambah Menit, Jam Akan Otomatis Bertambah Sesuai Menit Dan Jam Pelajaran Terakhir</li>
                            <li class="text-dark fs-3" aria-current="page">Saat Menghapus Data, Maka Yang Terakhir Dalam Jam Pelajaran Akan Terhapus</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-pills mb-3 rounded align-items-center flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-senin-tab" data-bs-toggle="pill" href="#pills-senin" role="tab" aria-controls="pills-senin" aria-selected="true">
                Senin
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-selasa-tab" data-bs-toggle="pill" href="#pills-selasa" role="tab" aria-controls="pills-selasa" aria-selected="false">
                Selasa
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-rabu-tab" data-bs-toggle="pill" href="#pills-rabu" role="tab" aria-controls="pills-rabu" aria-selected="false">
                Rabu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-kamis-tab" data-bs-toggle="pill" href="#pills-kamis" role="tab" aria-controls="pills-kamis" aria-selected="false">
                Kamis
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-jumat-tab" data-bs-toggle="pill" href="#pills-jumat" role="tab" aria-controls="pills-jumat" aria-selected="false">
                Jumat
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-sabtu-tab" data-bs-toggle="pill" href="#pills-sabtu" role="tab" aria-controls="pills-sabtu" aria-selected="false">
                Sabtu
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-minggu-tab" data-bs-toggle="pill" href="#pills-minggu" role="tab" aria-controls="pills-minggu" aria-selected="false">
                Minggu
            </a>
        </li>
    </ul>
</div>

<div class="mt-2 card card-body">
    <div class="tab-content mt-4" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-senin" role="tabpanel" aria-labelledby="pills-senin-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-monday')
        </div>
        <div class="tab-pane fade" id="pills-selasa" role="tabpanel" aria-labelledby="pills-selasa-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-tuesday')
        </div>
        <div class="tab-pane fade" id="pills-rabu" role="tabpanel" aria-labelledby="pills-rabu-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-wednesday')
        </div>
        <div class="tab-pane fade" id="pills-kamis" role="tabpanel" aria-labelledby="pills-kamis-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-thursday')
        </div>
        <div class="tab-pane fade" id="pills-jumat" role="tabpanel" aria-labelledby="pills-jumat-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-friday')
        </div>
        <div class="tab-pane fade" id="pills-sabtu" role="tabpanel" aria-labelledby="pills-sabtu-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-saturday')
        </div>
        <div class="tab-pane fade" id="pills-minggu" role="tabpanel" aria-labelledby="pills-minggu-tab">
            @include('school.pages.subjects.panes.lesson-hours.tab-sunday')
        </div>
    </div>
</div>

<div class="pagination justify-content-end mb-0">
    {{-- <x-paginate-component :paginator="$lessonHours['monday']" /> --}}
</div>

{{-- modal --}}
@include('school.pages.subjects.widgets.modal-create-lesson-hours')
@include('school.pages.subjects.widgets.modal-update-lesson-hours')

<x-delete-modal-component />

@endsection
@section('script')
@include('school.pages.subjects.script.script-lesson-hours')
@endsection
