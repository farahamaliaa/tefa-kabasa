@extends('school.layouts.app')

@section('style')
    <style>
        #keagamaan {
            display: none;
        }

        #editKeagamaan {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-10 mb-3">
            <div class="col-12 col-lg-3">
                <div class="d-flex gap-2">
                    <form class="flex-grow-1">
                        <div class="position-relative">
                            <input type="text" name="name" value="{{ old('name', request('name')) }}"
                                class="form-control search-chat py-2 px-4 ps-5" id="search-name" placeholder="Cari...">
                            <i class="ti ti-search position-absolute top-50 translate-middle-y fs-6 text-dark ms-3"></i>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col-12 col-lg-2 mb-3">
            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modal-create">
                Tambah Pelajaran
            </button>
        </div>
    </div>

    <div class="row">
        @forelse ($subjects as $subject)
            <div class="col-lg-4">
                <div class="card position-relative">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="mb-0">{{ $subject->name }}</h4>
                            <div class="btn-group">
                                <a class="nav-link label-group p-0" data-bs-toggle="dropdown" href="#" role="button"
                                    aria-haspopup="true" aria-expanded="true">
                                    <div>
                                        <span class="more-options text-dark">
                                            <i class="ti ti-dots-vertical fs-5"></i>
                                        </span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end">
                                    <button type="button"
                                        class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-edit gap-3"
                                        data-id="{{ $subject->id }}" data-name="{{ $subject->name }}"
                                        data-religion="{{ $subject->religion_id }}">
                                        <i class="fs-4 ti ti-edit"></i>
                                        Edit
                                    </button>

                                    <button
                                        class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete gap-3"
                                        data-id="{{ $subject->id }}">
                                        <i class="fs-4 ti ti-trash"></i>
                                        Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="align-items-center pt-3">
                            <h6 class="mb-3">Jenis Pelajaran :</h6>
                            <div class="d-flex align-items-center">
                                @if ($subject->religion)
                                    <span class="mb-1 badge font-medium fs-5 bg-light-warning text-warning">
                                        Keagamaan
                                    </span>
                                    <span class="mb-1 badge font-medium ms-2 fs-5 bg-light-primary text-primary">
                                        {{ $subject->religion->name }}
                                    </span>
                                @else
                                    <span class="mb-1 badge font-medium fs-5 bg-light-primary text-primary">
                                        Umum
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <!-- Image Container -->
                    <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
                        <img src="{{ asset('assets/images/background/buble.png') }}" alt="Description" class="img-fluid"
                            style="max-width: 100px; height: auto;">
                    </div>
                </div>
            </div>

        @empty
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt="" width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Mata pelajaran belum ditambahkan
                </p>
            </div>
        @endforelse
    </div>
    <div class="pagination justify-content-center mb-0">
        <x-paginate-component :paginator="$subjects->appends(request()->input())" />
    </div>

    @include('school.pages.subjects.widgets.modal-create-subject')
    @include('school.pages.subjects.widgets.modal-update-subject')

    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.pages.subjects.script.script-create-subjects')
    @include('school.pages.subjects.script.session')
@endsection
