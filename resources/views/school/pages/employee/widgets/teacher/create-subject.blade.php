<div class="modal fade" id="subject-teacher" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Mata Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.teacher-subject.store', ['employee' => $teacher->id]) }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <input type="hidden" name="old_rfid" id="old_rfid_input">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="subject" class="form-label">Pilih Mata Pelajaran</label>
                            <div>
                                <select id="subject" name="subject[]" multiple class="select2 @error('subject') is-invalid @enderror" aria-label="Pilih Mata Pelajaran">
                                    @forelse ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                @error('subject', 'create')
                                <strong class="text-danger error-create">{{ $message }}</strong>
                                @enderror
                            </div>
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
