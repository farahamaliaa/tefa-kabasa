<div class="modal fade" id="modal-create-rfid" tabindex="-1" aria-labelledby="createRFID" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRFID">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-rfid" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="old_rfid" id="old_rfid_input">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group d-flex">
                            <h6 class="mb-2">Nama:</h6>
                            <p class="ms-3" id="name"></p>
                        </div>
                        <div class="form-group">
                            <h6 class="mb-2">RFID: <span id="rfid"></span></h6>
                            <p>Lakukan tab pada RFID reader untuk menginputkan RFID</p>
                            <input type="text" id="rfid-input" name="rfid" class="form-control" placeholder="Masukkan RFID">
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
