<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Tambah Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.subject.store') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="mb-2">Mata Pelajaran <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            placeholder="Masukan nama mata pelajaran">
                        @error('name', 'create')
                            <div class="text-danger error-create">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="mb-2" for="category">Kategori<span class="text-danger ms-1">*</span></label>
                        <select id="category" name="category" class="form-select mb-3">
                            <option value="umum">Umum</option>
                            <option value="keagamaan">Keagamaan</option>
                        </select>
                    </div>

                    <div id="religion-field" class="mb-3" style="display: none;">
                        <label for="religion_id" class="mb-2">Agama</label>
                        <select id="religion_id" name="religion_id"
                            class="form-select @error('religion_id') is-invalid @enderror">
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
