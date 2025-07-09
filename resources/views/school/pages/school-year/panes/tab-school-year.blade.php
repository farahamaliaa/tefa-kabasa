@section('style')
    <style>
        .bg-semester {
            /* background-image: url('{{ asset('assets/images/bg-ekstra.png') }}');
        background-size: cover;
        background-clip: padding-box;
        width: 100%; */
        }
    </style>
@endsection

<div class="row">
    @forelse ($schoolYears as $schoolYear)
        <div class="col-lg-4 col-md-12">
            <div class="card position-relative">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h5>Tahun Ajaran</h5>
                        <div class="btn-group">
                            <div class="mb-2 me-2">
                                @if ($schoolYear->active)
                                    <span class="badge bg-light-success text-success">Aktif</span>
                                    @else
                                    <span class="badge bg-light-danger text-danger">Nonaktif</span>
                                @endif
                            </div>
                            <a class="nav-link label-group p-0 mt-1" data-bs-toggle="dropdown" href="#" role="button"
                                aria-haspopup="true" aria-expanded="true">
                                <div>
                                    <span class="more-options text-dark">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end">
                                @if (!$schoolYear->active)
                                    <button type="button" data-id="{{ $schoolYear->id }}" data-name="{{ $schoolYear->school_year }}" data-status="{{ $schoolYear->active }}" class="note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3 activated-btn" data-bs-toggle="modal" data-bs-target="#modal-confirm-active">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4z"/></svg>
                                        Aktifkan
                                    </button>
                                @endif
                                <button type="button" data-id="{{ $schoolYear->id }}" data-name="{{ $schoolYear->school_year }}" data-status="{{ $schoolYear->active }}" class="btn-update-year note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-edit"></i>
                                    Edit
                                </button>
                                <button data-id="{{ $schoolYear->id }}"
                                    class="btn-delete-year note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                    data-id="">
                                    <i class="fs-4 ti ti-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <span
                            class="badge bg-light-primary fs-5 fw-semibold text-primary">{{ $schoolYear->school_year }}</span>
                    </div>
                </div>
                <div class="position-absolute bottom-0 end-0" style="padding: 0px;">
                    <img src="{{ asset('assets/images/background/buble.png') }}" alt="Description" class="img-fluid"
                        style="max-width: 100px; height: auto;">
                </div>
            </div>
        </div>
    @empty
    <tr>
        <td colspan="7" class="text-center align-middle">
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('admin_assets/dist/images/empty/no-data.png') }}" alt=""
                    width="300px">
                <p class="fs-5 text-dark text-center mt-2">
                    Belum ada data
                </p>
            </div>
        </td>
    </tr>
    @endforelse
</div>
