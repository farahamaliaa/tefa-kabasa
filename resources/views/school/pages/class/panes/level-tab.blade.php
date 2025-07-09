<div class="col-12 col-md-6 col-lg-2 mb-3 me-3">
    <form class="position-relative">
        <input type="text" class="form-control product-search ps-5" name="name"
            value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
    </form>
</div>

<div class="row">
    @forelse ($levelClasses as $levelClass)
        <div class="col-lg-4">
            <div class="card position-relative">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-1">
                        <h2 class="fs-4 mb-0">Tingkatan Kelas</h2>
                        <div class="btn-group">
                            <a class="nav-link label-group p-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                <div>
                                    <span class="more-options text-dark">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"
                                data-popper-placement="bottom-end">
                                <button type="button" data-id="{{ $levelClass->id }}" data-name="{{ $levelClass->name }}" class="btn-update-level note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3">
                                    <i class="fs-4 ti ti-edit"></i>
                                    Edit
                                </button>

                                <button class="btn-delete-level note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center gap-3"
                                    data-id="{{ $levelClass->id }}">
                                    <i class="fs-4 ti ti-trash"></i>
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-center pt-3">
                        <span class="mb-1 badge font-medium fs-5 bg-light-primary text-primary">
                            {{ $levelClass->name }}
                        </span>
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

<div class="pagination justify-content-center mb-0">
    <x-paginate-component :paginator="$levelClasses" />
</div>


