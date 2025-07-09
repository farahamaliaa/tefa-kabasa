<!-- modal tambah -->
<div class="modal fade" id="create-class" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('school.classroom.store') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="">
                        <div class="email-repeater mb-3">
                            <div data-repeater-list="store-class">
                                <div data-repeater-item class="row mb-3 align-items-end">
                                    <div class="col-md-12 mb-2">
                                        <div class="custom-file">
                                            <label for="" class="mb-2">Nama Kelas</label>
                                            <input type="text" name="name" class="form-control" placeholder="Masukkan nama kelas" />
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="custom-file">
                                            <label for="" class="mb-2">Tingkatan Kelas</label>
                                            <select class="form-control" name="level_class_id">
                                                <option value="">Pilih tingkatan kelas</option>
                                                @forelse ($classLevel as $level)
                                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="custom-file">
                                            <label for="" class="mb-2">Wali Kelas</label>
                                            <select class="form-control" name="employee_id">
                                                <option value="">Pilih wali kelas</option>
                                                @forelse ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light" type="button">
                                            <i class="ti ti-circle-x fs-5"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <button type="button" data-repeater-create="" class="btn btn-info waves-effect waves-light">
                                <div class="d-flex align-items-center">
                                    Tambah data
                                    <i class="ti ti-circle-plus ms-1 fs-5"></i>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
