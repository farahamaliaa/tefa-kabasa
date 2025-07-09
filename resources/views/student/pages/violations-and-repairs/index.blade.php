@extends('student.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-8">
        <div class="card bg-primary shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h4 class="fw-semibold text-white mb-8">Statistik Absensi</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-white text-decoration-none" href="javascript:void(0)">Statistik absensi siswa dan pegawai</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card shadow-none position-relative overflow-hidden" style="background: linear-gradient(to bottom, #FFE252, #ffc107);">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <h5 class="fw-semibold text-white mb-8">Statistik Absensi</h5>
                            <span class="mb-1 badge bg-white p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-warning" width="15" height="15" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                                </svg>
                            </span>
                        </div>
                        <nav aria-label="breadcrumb">
                            <span class="badge fw-semibold fs-6 text-warning bg-white p-2">200 Point</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection