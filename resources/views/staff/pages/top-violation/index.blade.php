@extends('staff.layouts.app')

@section('style')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="card bg-primary shadow-none position-relative overflow-hidden">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <b class="text-white fs-2">Daftar Point Siswa</b>
                            <h4 class="fw-semibold text-white fs-5 mt-1">{{ $students->count() }} Siswa
                                Melanggar</h4>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a class="text-white fs-2" href="javascript:void(0)">Daftar
                                            daftar siswa yang melanggar akan mendapatkan point sesuai apa yang dilanggar</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="col-3">
                            <div class="text-center mb-n5">
                                <img src="{{ asset('admin_assets/dist/images/breadcrumb/pagar.png') }}" width="130px"
                                    alt="" class="img-fluid mb-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card shadow-none position-relative overflow-hidden"
                style="background: linear-gradient(to bottom, #FFE252, #ffc107);">
                <div class="card-body px-4 py-3">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="d-flex justify-content-between mb-2">
                                <h5 class="fw-semibold text-white mb-8">Maksimal point pada sekolah</h5>
                                <span class="mb-1 badge bg-white p-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="15"
                                        height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                                    </svg>
                                </span>
                            </div>
                            <nav aria-label="breadcrumb">
                                <span class="badge fw-semibold fs-6 text-warning bg-white p-2">{{ $maxPoint }}
                                    Point</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link d-flex align-items-center active" data-bs-toggle="tab" href="#student" role="tab"
                aria-selected="true">
                <span class="d-flex align-items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="20" height="20"
                        viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                    </svg>
                </span>
                <span class="d-none d-md-block">Siswa</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link d-flex align-items-center" data-bs-toggle="tab" href="#class" role="tab"
                aria-selected="false" tabindex="-1">
                <span class="d-flex align-items-center me-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256"
                        class="me-2">
                        <path fill="currentColor"
                            d="M232 212h-20V40a20 20 0 0 0-20-20H64a20 20 0 0 0-20 20v172H24a12 12 0 0 0 0 24h208a12 12 0 0 0 0-24M68 44h120v168H68Zm104 88a16 16 0 1 1-16-16a16 16 0 0 1 16 16" />
                    </svg>
                </span>
                <span class="d-none d-md-block">Kelas</span>
            </a>
        </li>

    </ul>

    <div class="tab-content">
        <div class="tab-pane active show" id="student" role="tabpanel">
            @include('staff.pages.top-violation.panes.student')
        </div>
        <div class="tab-pane" id="class">
            @include('staff.pages.top-violation.panes.class')
        </div>
    </div>
@endsection

@section('script')
    @include('staff.pages.top-violation.script.script-tab')
@endsection
