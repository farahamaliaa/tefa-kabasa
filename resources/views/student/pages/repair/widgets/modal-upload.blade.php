<!-- modal detail -->
<div class="modal fade" id="repair-upload-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai"><b>Detail Perbaikan / </b>
                    <span class="mb-1 badge font-medium bg-light-warning text-warning">Menunggu Konfirmasi</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" id="form-upload" enctype="multipart/form-data">
                @method('put')
                @csrf

                <div class="modal-body px-4" style="max-height: 70vh; overflow-y: auto;">
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Pembuat Perbaikan:</b></h5>
                        <h6 style="font-size: 14px" id="employee-upload"></h6>
                    </div>
                    <hr>
                    <div class="mb-4">
                        <h5 style="font-size: 15px"><b>Nama Siswa Perbaikan:</b></h5>
                        <h6 style="font-size: 14px" id="student-upload"></h6>
                    </div>
                    <div class="mb-4">
                        <h5 style="font-size: 15px"><b>Jenis Pelanggaran:</b></h5>
                        <h6 style="font-size: 14px" id="repair-upload"></h6>
                    </div>
                    <div class="mb-4">
                        <h5 style="font-size: 15px"><b>Pengurangan Point:</b></h5>
                        <h6 style="font-size: 14px" id="point-upload"></h6>
                    </div>
                    <div class="d-flex">
                        <div class="mb-3">
                            <h5 style="font-size: 15px"><b>Tanggal Mulai:</b></h5>
                            <h6 style="font-size: 14px" id="start_date-upload"></h6>
                        </div>
                        <div class="mb-3 ms-5">
                            <h5 style="font-size: 15px"><b>Tanggal Akhir:</b></h5>
                            <h6 style="font-size: 14px" id="end_date-upload"></h6>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Bukti:</b></h5>
                        <input class="form-control mt-3" name="file" type="file" id="formFile">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light" data-bs-dismiss="modal"
                        style="background-color: #C7C7C7; color: black; border: none;">Tutup</button>
                    <button type="submit" class="btn mb-1 waves-effect waves-light btn-primary">Ajukan</button>
                </div>
            </form>
        </div>
    </div>
</div>
