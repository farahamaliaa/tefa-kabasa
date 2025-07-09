<!-- modal detail -->
<div class="modal fade" id="repair-student-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai"><b>Detail Bukti Perbaikan</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Jenis Perbaikan:</b></h5>
                    <h6 style="font-size: 14px" id="name-detail"></h6>
                </div>
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Point:</b></h5>
                    <h6 style="font-size: 14px" id="point-detail-repair"></h6>
                </div>
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Tenggat Pengerjaan:</b></h5>
                    <h6 style="font-size: 14px" id="date-detail-repair"></h6>
                </div>
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Status Pengerjaan:</b></h5>
                    <h6 style="font-size: 14px" id="approved-detail"></h6>
                </div>
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Bukti:</b></h5>
                    <img id="proof-detail" src="" alt="Bukti Perbaikan"
                        class="img-fluid rounded-3 pt-2" style="max-width: 100%; height: auto;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light btn-primary"
                    data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
