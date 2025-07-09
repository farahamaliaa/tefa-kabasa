<!-- modal tambah -->
<div class="modal fade" id="modal-create-remidial" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Perbaikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('employee.violation.student-repair.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <!-- Explanation Section -->
                    <div class="d-flex">
                        <div class="align-items-center mb-4">
                            <span class="mb-1 badge bg-primary p-0 rounded-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 16 16">
                                    <path fill="currentColor"
                                        d="m8.93 6.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                </svg>
                            </span>
                        </div>
                        <h5 class="ms-2 pt-1" style="font-size: 16px"><b>Penjelasan</b></h5>
                    </div>
                    <h6>Perbaikan diri dimaksudkan untuk memperbaiki poin siswa yang sudah mencapai pada batas tertentu,
                        maka siswa membutuhkan suatu treatment atau perbaikan diri supaya dapat memperbaiki nilai sikap
                        siswa.</h6>

                    <!-- Form Section -->
                    <div class="mt-4">
                        <div class="email-repeater mb-3">
                            <div data-repeater-list="repeater-group">
                                <div data-repeater-item="" class="row mb-3">
                                    <div class="col-md-7 mb-3">
                                        <label for="" class="mb-1 text-dark">Perbaikan</label>
                                        <input type="text" class="form-control" name="repair"
                                            placeholder="Masukan perbaikan" value="{{ old('repair') }}">
                                        @error('repair')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="" class="mb-1 text-dark">Jumlah point dikurangi</label>
                                        <input type="number" class="form-control" name="point"
                                            placeholder="Masukan point" value="{{ old('point') }}">
                                        @error('point')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-10 mb-3">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <label for="nama-siswa" class="mb-1 text-dark">Nama siswa melakukan
                                                    perbaikan</label>
                                                <select id="nama-siswa" name="classroom_student_id" multiple
                                                    class="form-control select2 select2-siswa-remidial"
                                                    style="width: 100%; height: 36px" multiple="multiple"
                                                    placeholder="Masukan nama siswa">
                                                    {{-- @forelse ($students as $student)
                                                        <option value="{{ $student->student_id }}">
                                                            {{ $student->student->user->name }}</option>
                                                    @empty
                                                        <option value="">Belum ada siswa</option>
                                                    @endforelse --}}
                                                </select>
                                                @error('classroom_student_ids')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12 col-lg-6">
                                                <label for="" class="mb-2"><b>Kelas</b></label>
                                                <select class="form-select " id="classroom-violation"
                                                    style="width: 100%; height: 36px" name="">
                                                    @foreach ($all_classrooms as $classroom)
                                                        <option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mt-4">
                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light"
                                            type="button">
                                            <i class="ti ti-circle-x fs-5"></i>
                                        </button>
                                    </div>
                                    <div class="col-lg-12">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create=""
                                class="btn btn-info waves-effect waves-light">
                                <div class="d-flex align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mb-1 me-1" width="17"
                                        height="17" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M4 22q-.825 0-1.412-.587T2 20V8q0-.825.588-1.412T4 6h4V4q0-.825.588-1.412T10 2h4q.825 0 1.413.588T16 4v2h4q.825 0 1.413.588T22 8v12q0 .825-.587 1.413T20 22zm0-2h16V8H4zm6-14h4V4h-4zM4 20V8zm7-5v3h2v-3h3v-2h-3v-3h-2v3H8v2z" />
                                    </svg>
                                    Tambah Perbaikan
                                </div>
                            </button>
                        </div>

                        <!-- Duration Section -->
                        <div class="mt-3">
                            <h6 class="fw-semibold">Durasi Pengerjaan</h6>
                            <p>Silahkan tentukan tanggal awal dan tanggal akhir untuk durasi pengerjaan perbaikan.</p>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="" class="mb-1 text-dark">Tanggal Awal</label>
                                    <input type="date" name="start_date" class="form-control"
                                        value="{{ old('start_date', Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-lg-6">
                                    <label for="" class="mb-1 text-dark">Tanggal Akhir</label>
                                    <input type="date" name="end_date" class="form-control"
                                        value="{{ old('end_date', Carbon\Carbon::now()->format('Y-m-d')) }}">
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
