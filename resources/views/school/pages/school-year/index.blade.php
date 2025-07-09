@php
    use App\Enums\SemesterEnum;
    use Carbon\Carbon;
@endphp
@extends('school.layouts.app')

@section('style')
    <style>
        .form-group {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .select-start-container,
        .select-end-container {
            width: 100% !important;
        }

        .select2-container {
            z-index: 1050;
            /* Higher than modal */
        }

        .select2-container .select2-selection--single {
            height: 36px !important;
            padding: 6px 12px !important;
            font-size: 14px !important;
            line-height: 1.42857143 !important;
            color: #555 !important;
            background-color: #fff !important;
            background-image: none !important;
            border: 1px solid #ccc !important;
            border-radius: 4px !important;
            width: 200px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            color: #555 !important;
            line-height: 1.42857143 !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: 5px !important;
        }

        .slash {
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>

    <style>
        .img-background {
            width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            .img-background {
                height: 100px;
            }
        }
    </style>
@endsection
@section('content')
    <div class="card bg-primary shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold text-white mb-8">Tahun Ajaran</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-white text-decoration-none"
                                    href="javascript:void(0)">Atur tahun ajaran dan semester disini</a></li>
                        </ol>
                    </nav>
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

    <ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="pills-semesters-tab" data-bs-toggle="pill" href="#pills-schoolYears"
                role="tab" aria-controls="pills-semesters" aria-selected="false">
                <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17" height="17" viewBox="0 0 24 24">
                    <path fill="currentColor"
                        d="M19 19H5V8h14m-3-7v2H8V1H6v2H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2h-1V1m-1 11h-5v5h5z" />
                </svg>

                Tahun Ajaran

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="pills-student-tab" data-bs-toggle="pill" href="#pills-semesters" role="tab"
                aria-controls="pills-student" aria-selected="true">
                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24" class="mb-1 me-1">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"
                        d="M2 5a2 2 0 0 1 2-2h6v18H4a2 2 0 0 1-2-2zm12-2h6a2 2 0 0 1 2 2v5h-8zm0 11h8v5a2 2 0 0 1-2 2h-6z" />
                </svg>
                Semester
            </a>
        </li>
        <li class="nav-item ms-auto pt-3 pt-md-0">
            <a href="javascript:void(0)" class="btn btn-primary d-flex align-items-center px-3" id="btn-create-school-year"
                data-bs-toggle="modal" data-bs-target="#modal-create-school-year">
                <span class="d-block font-weight-medium fs-3">Tambah tahun ajaran</span>
            </a>
        </li>

    </ul>


    <div class="tab-content mt-4" id="pills-tabContent">
        <div class="tab-pane fade" id="pills-semesters" role="tabpanel" aria-labelledby="pills-student-tab">
            @include('school.pages.school-year.panes.tab-semesters')

        </div>
        <div class="tab-pane fade show active" id="pills-schoolYears" role="tabpanel" aria-labelledby="pills-semesters-tab">
            @include('school.pages.school-year.panes.tab-school-year')
        </div>
    </div>

    {{-- modal --}}
    @include('school.pages.school-year.widgets.modal-create-school-year')
    @include('school.pages.school-year.widgets.modal-update-school-year')
    @include('school.pages.school-year.widgets.modal-confirm-active')

    <x-delete-modal-component />
@endsection

@section('script')
    @include('school.pages.school-year.scripts.active-year')
    @include('school.pages.school-year.scripts.delete-year')
    @include('school.pages.school-year.scripts.tab')
    @include('school.pages.school-year.scripts.update-year')
    @include('school.pages.school-year.scripts.modal-create')

    <script>
        $(document).ready(function() {
            $('.select-start').select2({
                dropdownParent: $('#modal-create-school-year')
            });

            $('.select-end').select2({
                dropdownParent: $('#modal-create-school-year')
            });

            $('.select-start-update').select2({
                dropdownParent: $('#modal-update-school-year')
            });

            $('.select-end-update').select2({
                dropdownParent: $('#modal-update-school-year')
            });

            $('.toggle-btn').click(function() {
                $(this).toggleClass('active');
                $('.toggle-btn').not(this).removeClass('active');
                $(this).attr('aria-pressed', $(this).hasClass('active'));
                $('.toggle-btn').not(this).attr('aria-pressed', false);
            });

            function appendRow(type, createdAt) {
                var formattedDate = new Date(createdAt).toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: 'long',
                    year: 'numeric'
                });

                var newRow = `
                <tr>
                    <td>
                        <div class="d-flex justify-content-center">
                            <p>${type.charAt(0).toUpperCase() + type.slice(1)}</p>
                        </div>
                    </td>
                    <td>${formattedDate}</td>
                </tr>
            `;
                $('#tbody').append(newRow);
            }

            $('.btn-ganjil').click(function() {
                Swal.fire({
                    title: "Apa kamu yakin?",
                    text: "Mengubah semester ke ganjil?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('school.semesters.store') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                            },
                            data: {
                                type: '{{ SemesterEnum::GANJIL->value }}'
                            },
                            success: function(res) {
                                location.reload()
                                // appendRow('ganjil', res.created_at);
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    }
                });
            });

            $('.btn-genap').click(function() {
                Swal.fire({
                    title: "Apa kamu yakin?",
                    text: "Mengubah semester ke genap?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya",
                    cancelButtonText: "Tidak",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('school.semesters.store') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
                            },
                            data: {
                                type: '{{ SemesterEnum::GENAP->value }}'
                            },
                            success: function(res) {
                                location.reload()
                                // appendRow('genap', res.created_at);
                            },
                            error: function(err) {
                                console.log(err);
                            }
                        });
                    }
                });
            });
        });
    </script>

    <script>
        < script >
            $(document).ready(function() {
                // Initialize Select2 inside the modal
                $('#modal-create-school-year').on('shown.bs.modal', function() {
                    $('#start-year').select2({
                        theme: 'bootstrap4',
                        width: 'resolve'
                    }).data('select2').$container.addClass('select-start-container');

                    $('#end-year').select2({
                        theme: 'bootstrap4',
                        width: 'resolve'
                    }).data('select2').$container.addClass('select-end-container');
                });
            });
    </script>
@endsection
