@extends('staff.layouts.app')
@section('content')
    <div class="card bg-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Detail Jurnal</h4>
                    <h3 class="text-white">{{ $employeeJournal->created_at->translatedFormat('d F Y') }}</h3>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="{{ asset('admin_assets/dist/images/breadcrumb/ChatBc.png') }}" alt=""
                            class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 text-end">
        <a href="{{ route('employee.journal.index') }}" class="btn btn-warning">Kembali</a>
    </div>
    <div class="card shadow-sm overflow-hidden mt-4 border-2">
        <div class="card-header border-2">
            <h4><b>Laporan Kegiatan</b></h4>
        </div>
        <div class="card-body border-2">
            <h5><b>Judul</b></h5>
            <p>{{ $employeeJournal->title }}</p>
        </div>
        <div class="card-footer border-2 bg-transparent py-4">
            <h5><b>Isi Laporan</b></h5>
            <p>{{ $employeeJournal->description }}</p>
        </div>
    </div>
@endsection
