@extends('school.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-6 mb-3">
        <form class="d-flex gap-2">
            <div class="position-relative">
                <div class="">
                    <input type="text" name="search" class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari">
                    <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                </div>
            </div>

            <div class="d-flex gap-2">
                <select name="" class="form-select" id="search-status">
                    <option value="">2023/2024</option>
                    <option value="">2024/2025</option>
                </select>
            </div>
        </form>
    </div>
    <div class="col-lg-6 mb-3">
        <div class="d-flex gap-2 justify-content-end">
            <a href="{{ route('create-subjects') }}" class="btn btn-success px-4">
                Tambah Data Pelajaran
            </a>
            <button type="button" class="btn btn-primary px-4" data-bs-toggle="modal" data-bs-target="#modal-create-subjectTeacher">
                Tambah Pelajaran Guru
            </button>
        </div>
    </div>
</div>

<div class="row">
    @forelse ($teacherMaples as $teacherMaple)
        <div class="col-lg-3">
            <div class="card card-body bg-transparent border-2 shadow-none">
                <div class="text-center">
                    <h5>{{ $teacherMaple->maple->name }}</h5>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="14" height="14" viewBox="0 0 24 24"><path fill="none" stroke="#5A6A85" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 4V2m0 2v2m0-2h-4.5M3 10v9a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-9zm0 0V6a2 2 0 0 1 2-2h2m0-2v4m14 4V6a2 2 0 0 0-2-2h-.5"/></svg>
                        {{ $teacherMaple->schoolYear->school_year }}
                    </div>
                    <div class="mt-2">
                        <button type="button" class="btn btn-delete mb-1 btn-light-danger text-danger" data-id="{{ $teacherMaple->id }}">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
    <h5>Data Kosong</h5>
    @endforelse
</div>

<x-delete-modal-component/>

<div class="modal fade" id="modal-create-subjectTeacher" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Tambah Pelajaran Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.teacher-subject.store', [$employee_id]) }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Pilih Pelajaran</label>
                        <select class="form-select form-select mb-3" name="maple_id">
                            <option value="">Pilih Mata Pelajaran</option>
                            @foreach ($maples as $maple)
                                <option value="{{ $maple->id }}">{{ $maple->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Tahun Ajaran</label>
                        <select class="form-select form-select mb-3" name="school_year_id">
                            <option value="">Pilih Tahun Ajaran</option>
                            @foreach ($schoolYears as $schoolYear)
                                <option value="{{ $schoolYear->id }}">{{ $schoolYear->school_year }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '/school/delete-maple-teacher/' + id);
        $('#modal-delete').modal('show');
    });
</script>
@endsection
