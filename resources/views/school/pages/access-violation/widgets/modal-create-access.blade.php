<div class="modal fade" id="modal-create-access" tabindex="-1" aria-labelledby="createRFID" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRFID">Tambah Pengakses</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.account-access-violation') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <h6 class="mb-2">Pilih Pegawai:</h6>
                            <select name="query[]" id="" multiple class="form-select select2 select2-create">
                                <option value="">Pilih Pegawai</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->user->id }}">{{ $employee->user->name }}</option>
                                @endforeach
                            </select>
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
