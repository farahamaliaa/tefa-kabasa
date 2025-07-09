@extends('school.layouts.app')

@section('style')
    <style>
        @media (max-width: 991px) {
            .card {
                margin-bottom: 1rem;
            }

            .h-75 {
                height: auto !important;
            }

            .img-background {
                width: 100%;
                height: auto;
            }

            .card-body {
                padding: 1rem;
            }

            .position-absolute {
                position: relative;
                margin-bottom: 1rem;
            }

            .col-lg-3,
            .col-lg-9 {
                width: 100%;
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    @if (!empty($notification))
        <div class="alert alert-warning">
            {{ $notification }}
        </div>
    @endif

    <div class="row d-flex align-items-stretch">
        <div class="col-lg-3">
            <div class="card shadow-none position-relative overflow-hidden h-75"
                style="background: linear-gradient(to bottom, #5D87FF, #5D87FF);">
                <div class="card-body px-4 py-3 position-relative">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="fw-semibold text-white mb-4 pt-3">Maks Poin Pada Sekolah</h5>
                            </div>
                            <nav aria-label="breadcrumb">
                                <span
                                    class="badge fw-semibold fs-8 text-primary bg-white p-2 px-3">{{ $maxPoint }}</span>
                            </nav>
                        </div>
                    </div>
                    <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Image" class="position-absolute"
                        style="bottom: 0; right: 0; width: 130px; height: auto; margin-bottom: -10px; margin-right: -10px;">
                </div>
            </div>
        </div>


        <div class="col-lg-9">
            <div class="card border border-grey shadow-none position-relative overflow-hidden h-75"
                style="background-color: #FEF5E5;">
                <div class="card-body px-4 py-4">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <h4 class="fs-5 mt-1"><b>Poin Peringatan</b></h4>
                            <nav aria-label="breadcrumb">
                                <ul style="list-style-type:disc; padding-left: 20px;">
                                    @forelse ($schoolPoints as $schoolPoint)
                                        <li style="padding-bottom: 3px">Poin peringatan {{ $schoolPoint->point }}+ :
                                            {{ $schoolPoint->description }}</li>
                                    @empty
                                        <li style="padding-bottom: 3px">Poin peringatan belum ditambahkan</li>
                                    @endforelse
                                    <li style="padding-bottom: 3px">Guru diharuskan untuk menindak lanjuti siswa yang
                                        mempunyai banyak poin Pelanggaran</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border border-grey shadow position-relative overflow-hidden h-75">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-12 col-md-9">
                    <h5 class="fw-semibold">Atur point pelanggaran dan peringatan pelanggaran</h5>
                </div>
                <div
                    class="col-12 col-lg-3 d-flex justify-content-md-end justify-content-start align-items-center mt-3 mt-md-0">
                    <button class="btn btn-warning d-flex align-items-center justify-content-center w-100"
                        data-bs-toggle="modal" data-bs-target="#modal-warning-point">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            class="me-2">
                            <g fill="none">
                                <path
                                    d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                <path fill="currentColor"
                                    d="m13.299 3.148l8.634 14.954a1.5 1.5 0 0 1-1.299 2.25H3.366a1.5 1.5 0 0 1-1.299-2.25l8.634-14.954c.577-1 2.02-1 2.598 0M12 4.898L4.232 18.352h15.536zM12 15a1 1 0 1 1 0 2a1 1 0 0 1 0-2m0-7a1 1 0 0 1 1 1v4a1 1 0 1 1-2 0V9a1 1 0 0 1 1-1" />
                            </g>
                        </svg>
                        Atur Peringatan Point
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex align-items-center mb-4 pt-3">
        <span class="badge bg-primary d-flex align-items-center justify-content-center p-1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
            </svg>
        </span>
        <h4 class="ms-3 mb-0" style="font-size: 18px; line-height: 1.5;"><b>Daftar Pelanggaran dan Perbaikan</b></h4>
    </div>


    <div class="row mb-3">
        <div class="col-12 col-lg-8">
            <form>
                <div class="row g-2">
                    <div class="col-12 col-lg-3">
                        <input type="text" name="search" class="form-control" placeholder="Cari...">
                    </div>
                    <div class="col-12 col-lg-3">
                        <select name="points" class="form-select">
                            <option value="highest">Point Tertinggi</option>
                            <option value="lowest">Point Terendah</option>
                        </select>
                    </div>
                    <div class="col-12 col-lg-2">
                        <button type="submit" class="btn btn-primary w-100">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-12 col-lg-4 d-flex justify-content-lg-end mt-3 mt-lg-0">
            <button class="btn btn-success d-flex align-items-center me-2" type="button" data-bs-toggle="modal"
                data-bs-target="#import-violation-school">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                    <g fill="none" fill-rule="evenodd">
                        <path
                            d="M24 0v24H0V0zM12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                        <path fill="currentColor"
                            d="M13.586 2a2 2 0 0 1 1.284.467l.13.119L19.414 7a2 2 0 0 1 .578 1.238l.008.176V20a2 2 0 0 1-1.85 1.995L18 22h-6v-2h6V10h-4.5a1.5 1.5 0 0 1-1.493-1.356L12 8.5V4H6v8H4V4a2 2 0 0 1 1.85-1.995L6 2zM7.707 14.465l2.829 2.828a1 1 0 0 1 0 1.414l-2.829 2.828a1 1 0 1 1-1.414-1.414L7.414 19H3a1 1 0 1 1 0-2h4.414l-1.121-1.121a1 1 0 1 1 1.414-1.415ZM14 4.414V8h3.586z" />
                    </g>
                </svg>
                Import Pelanggaran
            </button>

            <button class="btn btn-primary btn-create ms-2" type="button">Tambah Pelanggaran</button>
        </div>
    </div>



    <div class="row">
        <div class="table-responsive rounded-2 mb-4">
            <table class="table border text-nowrap customize-table mb-0 align-middle">
                <thead class="text-dark fs-4">
                    <tr>
                        <th class="text-start">Jenis Pelanggaran</th>
                        <th class="text-center">Point</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($regulations as $regulation)
                        <tr>
                            <td class="text-start">{{ $regulation->violation }}</td>
                            <td class="text-center">
                                <span class="mb-1 badge font-medium bg-light-primary text-primary"><b>+
                                        {{ $regulation->point }}</b></span>
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center align-items-center gap-2">
                                    <a class="btn-detail" type="button" data-point="{{ $regulation->point }}"
                                        data-violation="{{ $regulation->violation }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="1.5">
                                                <path d="M3 13c3.6-8 14.4-8 18 0" />
                                                <path d="M12 17a3 3 0 1 1 0-6a3 3 0 0 1 0 6" />
                                            </g>
                                        </svg>
                                    </a>
                                    <a data-id="{{ $regulation->id }}" data-violation="{{ $regulation->violation }}"
                                        data-point="{{ $regulation->point }}" class="btn-update" type="button">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="text-warning" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M21 12a1 1 0 0 0-1 1v6a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1h6a1 1 0 0 0 0-2H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-6a1 1 0 0 0-1-1m-15 .76V17a1 1 0 0 0 1 1h4.24a1 1 0 0 0 .71-.29l6.92-6.93L21.71 8a1 1 0 0 0 0-1.42l-4.24-4.29a1 1 0 0 0-1.42 0l-2.82 2.83l-6.94 6.93a1 1 0 0 0-.29.71m10.76-8.35l2.83 2.83l-1.42 1.42l-2.83-2.83ZM8 13.17l5.93-5.93l2.83 2.83L10.83 16H8Z" />
                                        </svg>
                                    </a>

                                    <a data-id="{{ $regulation->id }}" type="button" class="btn-delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            class="text-danger" viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-width="2"
                                                d="M9.5 14.5v-3m5 3v-3M3 6.5h18v0c-1.404 0-2.107 0-2.611.337a2 2 0 0 0-.552.552C17.5 7.893 17.5 8.596 17.5 10v5.5c0 1.886 0 2.828-.586 3.414s-1.528.586-3.414.586h-3c-1.886 0-2.828 0-3.414-.586S6.5 17.386 6.5 15.5V10c0-1.404 0-2.107-.337-2.611a2 2 0 0 0-.552-.552C5.107 6.5 4.404 6.5 3 6.5zm6.5-3s.5-1 2.5-1s2.5 1 2.5 1" />
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center align-middle">
                                <div class="d-flex flex-column justify-content-center align-items-center">
                                    <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                                        width="300px">
                                    <p class="fs-5 text-dark text-center mt-2">
                                        Belum ada data
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    @include('school.pages.violation.widgets.modal-create-violation')
    @include('school.pages.violation.widgets.modal-update-violation')
    @include('school.pages.violation.widgets.modal-max-point')
    @include('school.pages.violation.widgets.modal-import')
    @include('school.pages.violation.widgets.modal-point-warning')
    @include('school.pages.violation.widgets.modal-detail')


    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.pages.violation.scripts.script-modal-create')
    @include('school.pages.violation.scripts.script-modal-update')
    @include('school.pages.violation.scripts.script-modal-delete')
    @include('school.pages.violation.scripts.script-modal-detail')
    @include('school.pages.violation.scripts.script-modal-warning-point')
@endsection
