<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Edit Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" id="name-edit" name="name" class="form-control"
                            placeholder="Masukan nama mata pelajaran">
                        @error('name', 'update')
                            <div class="text-danger error-edit">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="mb-2" for="category">Kategori<span class="text-danger ms-1">*</span></label>
                        <select id="category-edit" name="category" class="form-select mb-3">
                            <option value="umum">Umum</option>
                            <option value="keagamaan">Keagamaan</option>
                        </select>
                    </div>

                    <div id="religion-field-edit" class="mb-3" style="display: none;"> <label class="mb-2"
                            for="category">Agama<span class="text-danger ms-1"></span></label>
                        <select id="religion-field-edit" name="religion_id" class="form-select form-select mb-3">
                            <option value="">Pilih agama <span class="text-danger"></span></option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
