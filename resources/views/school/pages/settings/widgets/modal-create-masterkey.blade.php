<div class="modal fade" id="modal-create-masterKey" tabindex="-1" aria-labelledby="tambahRfid" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('school.master-key.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahRfid">Tambah Master Key</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">RFID<span class="text-d">*</span></label>
                        <p class="mt-2 fs-2">Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                    </div>
                    <div>
                        <input type="text" id="rfid" name="rfid" placeholder="Masukkan RFID"
                            class="form-control">
                        @error('rfid')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </div>
        </form>
    </div>
</div>