<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Ekstrakurikuler</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Nama Ekstrakurikuler</label>
                            <input type="text" class="form-control" id="name-update" name="name" value="{{ old('name') }}">
                            @error('name', 'edit')
                                <span class="text-danger error-edit">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Pengajar</label>
                            <select id="employee-update" class="form-control form-select select2 select2-edit"
                                name="employee_id">
                                <option value="">Pilih Pengajar</option>
                                @forelse ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->user->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            @error('employee_id', 'edit')
                                <span class="text-danger error-edit">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
