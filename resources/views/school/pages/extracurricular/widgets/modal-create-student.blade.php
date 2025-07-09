<div class="modal fade" id="modal-create-student" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.extracurricular-students.store', $extracurricular->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="" class="mb-2">Kelas</label>
                            <select class="form-select classroom select2-create-student" name="classroom_id">
                                <option value="">Pilih kelas</option>
                                @forelse ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}"
                                        {{ old('classroom_id') == $classroom->id ? 'selected' : '' }}>
                                        {{ $classroom->name }}
                                    </option>
                                @empty
                                    <option>Tidak ada data</option>
                                @endforelse
                            </select>
                            @error('classroom_id', 'create')
                                <div class="text-danger mt-2 error-create">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="mb-2 pt-3">Nama Siswa</label>
                            <select class="form-select student" name="student_id">
                            </select>
                            @error('student_id', 'create')
                                <div class="text-danger mt-2 error-create">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>

        </div>
    </div>
</div>
