<div class="modal fade" id="modal-rfid-staff" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-rfid-staff" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="old_rfid" id="old_rfid_input_staff">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group d-flex">
                            <h6 class="mb-2">Nama :</h6>
                            <p class="ms-3" id="name-staff-rfid"></p>
                        </div>
                        <div class="form-group">
                           <div class="d-flex">
                            <h6 class="mb-2">RFID :</h6>
                            <p class="ms-3" id="detail-staff-rfid"></p>
                           </div>
                            <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                            <input type="text" name="rfid" id="rfid" class="form-control" placeholder="Masukkan RFID">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
