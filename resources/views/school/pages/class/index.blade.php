@extends('school.layouts.app')

@section('style')
<style>
    .category-selector .dropdown-menu {
        position: absolute;
        z-index: 1050;
        transform: translate3d(0, 0, 0);
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

<style>
    .category-selector .dropdown-menu {
        position: absolute;
        z-index: 1050;
        transform: translate3d(0, 0, 0);
    }

    .select2-create-walikelas {
        width: 100% !important;
    }

    .select2-create-walikelas-selection__rendered {
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

    .select2-create-walikelas-selection {
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
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-8 col-md-9">
                    <h4 class="fw-semibold mb-2 text-light">Kelas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Atur kelas dan tingkatan kelas di sini</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-4 col-md-3 text-center mb-n5">
                    <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                        class="img-fluid mb-n4">
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid note-has-grid">
        <!-- Navigation Tabs -->
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row flex-wrap" id="nav-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="teacher-tab" data-bs-toggle="pill" href="#teacher-content" role="tab"
                    aria-controls="teacher-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"
                        class="me-2">
                        <path fill="currentColor"
                            d="M232 212h-20V40a20 20 0 0 0-20-20H64a20 20 0 0 0-20 20v172H24a12 12 0 0 0 0 24h208a12 12 0 0 0 0-24M68 44h120v168H68Zm104 88a16 16 0 1 1-16-16a16 16 0 0 1 16 16" />
                    </svg>
                    <span class="d-none d-md-block font-weight-medium">Kelas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="employee-tab" data-bs-toggle="pill" href="#employee-content" role="tab"
                    aria-controls="employee-content">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                        class="me-2">
                        <g fill="none">
                            <path
                                d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                            <path fill="currentColor"
                                d="M14 3a2 2 0 0 1 2 2v3h4a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-6a2 2 0 0 1 2-2h4V5a2 2 0 0 1 2-2zm0 2h-4v14h4zm6 5h-4v9h4zM8 13H4v6h4z" />
                        </g>
                    </svg>
                    <span class="d-none d-md-block font-weight-medium">Tingkatan Kelas</span>
                </a>
            </li>
            <li class="nav-item d-flex align-items-center ms-auto mt-2 mt-md-0" id="guru-buttons">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#create-class">
                    Tambah Kelas
                </button>
            </li>

            <li class="nav-item d-flex align-items-center ms-auto mt-2 mt-md-0 d-none" id="pegawai-buttons">
                <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#create-level">
                    Tambah Tingkatan Kelas
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="teacher-content" role="tabpanel" aria-labelledby="teacher-tab">
                @include('school.pages.class.panes.class-tab')
            </div>
            <div class="tab-pane fade" id="employee-content" role="tabpanel" aria-labelledby="employee-tab">
                @include('school.pages.class.panes.level-tab')
            </div>
        </div>
    </div>

    @include('school.pages.class.widgets.class.create-class')
    @include('school.pages.class.widgets.class.update-class')

    @include('school.pages.class.widgets.class-level.update-level')
    @include('school.pages.class.widgets.class-level.create-level')

    <x-delete-modal-component />
@endsection
@section('script')
    @include('school.pages.class.script.script-class-level')
    @include('school.pages.class.script.script-class-level-class')
    @include('school.pages.class.script.script-select2')
@endsection
