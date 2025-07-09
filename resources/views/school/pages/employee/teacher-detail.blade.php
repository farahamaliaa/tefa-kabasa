@extends('school.layouts.app')

@section('style')
    <style>
        .select2 {
            width: 100% !important;
        }

        .select2-container--default .select2-selection--multiple {
            background-color: #f8f9fa;
            border: 1px solid #ced4da;
            border-radius: 4px;
            padding: 4px;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid #b9b9b9 1px;
            outline: 0;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
            border: 1px solid #0056b3;
            color: white;
            padding: 2px 5px;
            border-radius: 4px;
            margin: 2px 4px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: #ffffff;
            margin-right: 5px;
        }

        .select2-container--default .select2-selection--multiple .select2-search--inline .select2-search__field {
            background: none;
            border: none;
            outline: none;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            background-color: transparent;
            border: none;
            border-right: 1px solid #aaa;
            /* border-top-left-radius: 4px; */
            /* border-bottom-left-radius: 4px; */
            color: #ffffff;
            cursor: pointer;
            font-size: 1em;
            font-weight: bold;
            padding: 0 4px 5px 5px;
            position: absolute;
            left: 0;
            top: 0;
            margin-right: 5px;
            /* right: 2px; */
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            cursor: default;
            padding-left: 12px;
            margin-left: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-auto mb-2">
                    <img src="{{ $teacher->image ? asset('storage/' . $teacher->image) : asset('assets/images/default-user.jpeg') }}"
                        alt="Profile Image" class="img-fluid rounded-circle" style="width: 84px; height: 84px;">
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

    <div class="row mb-3">
        <div class="col-lg-8 col-md-12 mb-3">
            <div class="d-flex align-items-center">
                <span class="badge bg-primary d-flex align-items-center justify-content-center p-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M12 7q-.825 0-1.412-.587T10 5t.588-1.412T12 3t1.413.588T14 5t-.587 1.413T12 7m0 14q-.625 0-1.062-.437T10.5 19.5v-9q0-.625.438-1.062T12 9t1.063.438t.437 1.062v9q0 .625-.437 1.063T12 21" />
                    </svg>
                </span>
                <h4 class="ms-3 mb-0 fw-semibold" style="font-size: 18px; line-height: 1;">Daftar Mata Pelajaran Guru</h4>
            </div>
        </div>

        <div class="col-lg-4 col-12">
            <div class="row">
                <div class="col-12 col-lg-6 mb-2">
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal"
                        data-bs-target="#subject-teacher">
                        Tambah Mapel Guru
                    </button>
                </div>
                <div class="col-12 col-lg-6 mb-2 mb-lg-0 mb-2">
                    <a href="/school/employees" class="btn w-100 d-flex align-items-center justify-content-center"
                        style="background-color: #E8E8E8;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M20 11v2H8l5.5 5.5l-1.42 1.42L4.16 12l7.92-7.92L13.5 5.5L8 11z" />
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>


    @include('school.pages.employee.widgets.teacher.create-subject')
    <x-delete-modal-component />

    <div class="row">
        @forelse ($teacher_subjects as $teacher_subject)
            <div class="col-lg-4">
                <div class="card position-relative border">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h4 class="mb-0">{{ $teacher_subject->subject->name }}</h4>
                            <div class="dropdown dropstart">
                                <a href="#" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <div class="category">
                                        <div class="category-business"></div>
                                        <div class="category-social"></div>
                                        <span class="more-options text-dark">
                                            <i class="ti ti-dots-vertical fs-5"></i>
                                        </span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
                                    <li>
                                        <button data-id="{{ $teacher_subject->id }}"
                                            class="btn-delete dropdown-item d-flex align-items-center gap-3 text-danger"
                                            data-id="">
                                            <i class="fs-4 ti ti-trash"></i>Delete
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="align-items-center pt-3">
                            <h6 class="mb-3">Jenis Pelajaran :</h6>
                            @if ($teacher_subject->subject->religion_id != null)
                                <div class="align-items-center pt-3">
                                    <div class="d-flex align-items-center">
                                        <span class="mb-1 badge font-medium fs-5 bg-light-warning text-warning">
                                            Keagamaan
                                        </span>
                                        <span class="mb-1 badge font-medium ms-2 fs-5 bg-light-primary text-primary">
                                            {{ $teacher_subject->subject->religion->name }}
                                        </span>
                                    </div>
                                </div>
                            @else
                                <span class="mb-1 badge font-medium fs-5 bg-light-primary text-primary">
                                    Umum
                                </span>
                            @endif
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
                    Belum ada data
                </p>
            </div>
        @endforelse
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showSubjectTeacher = @json(session('showSubjectTeacher'));

            if (showSubjectTeacher) {
                var showSubjectErrors = document.querySelectorAll('.error-create');
                if (showSubjectErrors.length > 0) {
                    var showSubjectElement = new bootstrap.Modal(document.getElementById('subject-teacher'));
                    showSubjectElement.show();
                }
            }
        });
    </script>


    <script>
        $(document).ready(function() {
            $('.select2').select2({
                dropdownParent: $('#subject-teacher')
            });
        });

        $('.btn-delete').on('click', function() {
            var id = $(this).data('id');
            $('#form-delete').attr('action', `{{ route('school.teacher-subject.destroy', '') }}/${id}`);
            $('#modal-delete').modal('show');
        });
    </script>
@endsection
