<!-- tambah rfid -->
<div class="modal fade" id="rfid-teacher" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah RFID</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-rfid" method="POST" enctype="multipart/form-data">
                @method('put')
                @csrf
                <input type="hidden" name="old_rfid" id="old_rfid_input">
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group d-flex">
                            <h6 for="" class="mb-2">Nama : </h6>
                            <p class="ms-3" id="name-detail-rfid"></p>
                        </div>
                        <div class="form-group">
                            <div class="d-flex">
                                <h6 for="" class="mb-2">RFID :</h6>
                                <p class="ms-3" id="detail-rfid"></p>
                            </div>
                            <p>Lakukan tab pada rfid reader untuk menginputkan rfid</p>
                            <input type="text" id="rfid" name="rfid" class="form-control" placeholder="Masukkan RFID">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light-danger text-danger" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
