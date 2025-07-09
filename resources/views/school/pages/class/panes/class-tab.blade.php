<div class="col-12 col-md-6 col-lg-2 mb-3 me-3">
    <form class="position-relative">
        <input type="text" class="form-control product-search ps-5" name="name"
            value="{{ old('name', request()->name) }}" id="input-search" placeholder="Cari...">
        <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
    </form>
</div>

<div class="row">
    @forelse ($classrooms as $classroom)
    <div class="col-lg-4 mb-3">
        <div class="card d-flex flex-column h-100 hover-img overflow-hidden rounded-2">
            <div class="card-body d-flex flex-column">
                <div class="d-flex justify-content-between align-items-center mb-1">
                    <h4 class="mb-2"><b>{{ $classroom->name }}</b></h4>
                    <div class="d-flex align-items-center">
                        <span class="mb-1 badge font-medium bg-light-primary text-primary fs-3">{{ $classroom->schoolYear->school_year }}</span>
                        <div class="category-selector btn-group">
                            <a class="nav-link category-dropdown label-group p-0" data-bs-toggle="dropdown"
                                href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                <div class="category d-flex align-items-center">
                                    <div class="category-business"></div>
                                    <div class="category-social"></div>
                                    <span class="more-options text-dark ms-2">
                                        <i class="ti ti-dots-vertical fs-5"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end category-menu overflow-auto" style="max-height: 200px;">
                                <button type="button" data-id="{{ $classroom->id }}" data-name="{{ $classroom->name }}" data-level="{{ $classroom->level_class_id }}" data-employee="{{ $classroom->employee_id }}" class="btn-update-classroom note-business badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-edit">
                                    Edit
                                </button>
                                <button
                                    class="note-business text-danger badge-group-item badge-business dropdown-item position-relative category-business d-flex align-items-center btn-delete-class"
                                    data-id="{{ $classroom->id }}">
                                    Hapus
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <span class="fs-4 mb-2">{{ $classroom->employee->user->name }}</span>
                <div class="d-flex align-items-center pt-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 16 16">
                        <path fill="currentColor"
                            d="M15 14s1 0 1-1s-1-4-5-4s-5 3-5 4s1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276c.593.69.758 1.457.76 1.72l-.008.002l-.014.002zM11 7a2 2 0 1 0 0-4a2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0a3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904c.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724c.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0a3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4a2 2 0 0 0 0-4" />
                    </svg>
                    <span class="ms-2 fs-6">
                        {{ $classroom->classroomStudents->count() }} Siswa
                    </span>
                </div>

                <!-- Spacer to push the button to the bottom -->
                <div class="mt-auto"></div>

                <a href="{{ route('school.class-student.index', ['classroom' => $classroom->id ]) }}" class="btn waves-effect waves-light btn-primary w-100">Masuk Kelas</a>
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
    <x-paginate-component :paginator="$classrooms" />
</div>


