@extends('school.layouts.app')

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-8 col-md-9">
                    <h4 class="fw-semibold mb-2 text-light">Jurnal Harian</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item" aria-current="page">Daftar jurnal staff setelah berkegiatan di sekolah
                            </li>
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
        <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-column flex-md-row flex-wrap" id="nav-tab"
            role="tablist">
            <li class="nav-item col-12 col-md-auto mb-2 mb-md-0">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="all-tab" data-bs-toggle="pill" href="#all-content" role="tab" aria-controls="all-content">
                    <span>Semua</span>
                </a>
            </li>
            <li class="nav-item col-12 col-md-auto mb-2 mb-md-0">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="fill-tab" data-bs-toggle="pill" href="#fill-content" role="tab" aria-controls="fill-content">
                    <span>Mengisi</span>
                </a>
            </li>
            <li class="nav-item col-12 col-md-auto mb-2 mb-md-0">
                <a class="nav-link note-link d-flex align-items-center justify-content-center px-3 text-body-color"
                    id="notfill-tab" data-bs-toggle="pill" href="#notfill-content" role="tab"
                    aria-controls="notfill-content">
                    <span>Tidak Mengisi</span>
                </a>
            </li>
            <li
                class="nav-item col-12 col-md-auto ms-md-auto d-flex justify-content-center justify-content-md-end align-items-center">
                <a href="{{ route('school.employee-journal.export') }}" type="button"
                    class="btn btn-warning w-100 w-md-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M16 8V5H8v3H6V3h12v5zM4 10h16zm14 2.5q.425 0 .713-.288T19 11.5t-.288-.712T18 10.5t-.712.288T17 11.5t.288.713t.712.287M16 19v-4H8v4zm2 2H6v-4H2v-6q0-1.275.875-2.137T5 8h14q1.275 0 2.138.863T22 11v6h-4zm2-6v-4q0-.425-.288-.712T19 10H5q-.425 0-.712.288T4 11v4h2v-2h12v2z" />
                    </svg>
                    Download Jurnal
                </a>
            </li>
        </ul>


        <!-- Tab Content -->
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade" id="all-content" role="tabpanel" aria-labelledby="all-tab">
                @include('school.pages.journals.panes.journal-all-staff')
            </div>
            <div class="tab-pane fade" id="fill-content" role="tabpanel" aria-labelledby="fill-tab">
                @include('school.pages.journals.panes.journal-fill-staff')
            </div>
            <div class="tab-pane fade" id="notfill-content" role="tabpanel" aria-labelledby="notfill-tab">
                @include('school.pages.journals.panes.journal-notfill-staff')
            </div>
        </div>
    </div>

    @include('school.pages.journals.widgets.modal-detail-staff')
@endsection

@section('script')
    @include('school.pages.journals.scripts.tab-script-staff')
    @include('school.pages.journals.scripts.detail-staff')
@endsection
