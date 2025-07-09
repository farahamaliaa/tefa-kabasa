@extends('teacher.layouts.app')
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-auto">
                    <img src="{{ asset('assets/images/default-user.jpeg') }}" alt="Profile Image"
                        class="img-fluid rounded-circle" style="width: 84px; height: 84px;">

                </div>
                <div class="col">
                    <h4 class="fw-semibold mb-2 text-light">{{ $teacher->user->name }}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent p-0 m-0">
                            <li class="breadcrumb-item" aria-current="page">{{ $teacher->user->email }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card border">
            <div class="card-body">

                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="mb-4">
                            <h5 class="mb-0 fw-semibold">Mata Pelajaran</h5>
                            <p>Daftar Mata Pelajaran Guru</p>
                        </div>
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach ($teacherSubjects as $teacherSubject)
                                <a class="nav-link @if ($loop->first) active @endif d-flex align-items-center"
                                    id="v-pills-{{ $teacherSubject->id }}-tab" data-bs-toggle="pill"
                                    href="#v-pills-{{ $teacherSubject->id }}" role="tab"
                                    aria-controls="v-pills-{{ $teacherSubject->id }}"
                                    aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                        viewBox="0 0 20 20" class="me-2">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M10 5.5a4.5 4.5 0 1 0 0 9a4.5 4.5 0 0 0 0-9M3.5 10a6.5 6.5 0 1 1 13 0a6.5 6.5 0 0 1-13 0"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $teacherSubject->subject->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="mb-2">
                            <h5 class="mb-0 fw-semibold">Tanggapan Siswa</h5>
                            <p>Daftar tanggapan dari siswa pada proses mengajar guru</p>
                        </div>
                        <div class="d-flex align-items-center mb-4 pt-2">
                            <form class="row g-3 align-items-center col-md-9">
                                <div class="col-md-4">
                                    <input type="text" name="search" value="{{ request()->search }}" class="form-control" placeholder="Cari...">
                                </div>
                                <div class="col-md-4">
                                    <select name="gender" class="form-select">
                                        <option value="">Semua</option>
                                        <option value="male" {{ request()->gender == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="female" {{ request()->gender == 'female' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="d-flex gap-2 col-md-4 ms-auto text-end">
                                    <input type="date" name="date" value="{{ request()->date }}" class="form-control">
                                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-content" id="v-pills-tabContent">
                            @foreach ($teacherSubjects as $teacherSubject)
                                <div class="tab-pane fade @if($loop->first) show active @endif" id="v-pills-{{ $teacherSubject->id }}" role="tabpanel"
                                    aria-labelledby="v-pills-{{ $teacherSubject->id }}-tab">
                                    @include('teacher.pages.student-feedback.panes.tab-detail', ['teacherSubject' => $teacherSubject->lessonScheadules])
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('teacher.pages.student-feedback.widgets.detail-feedback')
@endsection

@section('script')
    @include('teacher.pages.student-feedback.scripts.detail-feedback')
@endsection
