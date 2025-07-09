<!-- modal Edit -->
<div class="modal fade" id="update-class" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Kelas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="edit-class-form" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="class-name" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="name-edit" name="name" placeholder="Masukkan nama kelas">
                    </div>
                    <div class="row">
                        <div class="mb-3 col-md-6">
                            <label for="class-teacher" class="form-label">Wali Kelas</label>
                            <select class="form-control select2-walikelas" id="employee-edit" name="employee_id">
                                <option value="">Pilih wali kelas</option>
                                @forelse ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="class-level" class="form-label">Tingkatan Kelas</label>
                            <select class="form-control" id="class-level" name="level_class_id">
                                <option value="">Pilih tingkatan kelas</option>
                                @forelse ($selectLevel as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary" form="edit-class-form">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
