<!-- modal detail -->
<div class="modal fade" id="repair-list-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai"><b>Detail Perbaikan / </b>
                    <span class="mb-1 badge font-medium bg-light-success text-success">Selesai Dikerjakan</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4" style="max-height: 70vh; overflow-y: auto;">
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Pembuat Perbaikan:</b></h5>
                    <h6 style="font-size: 14px" id="employee-detail"></h6>
                </div>
                <hr>
                <div class="mb-4">
                    <h5 style="font-size: 15px"><b>Nama Siswa Perbaikan:</b></h5>
                    <h6 style="font-size: 14px" id="student-detail"></h6>
                </div>
                <div class="mb-4">
                    <h5 style="font-size: 15px"><b>Jenis Perbaikan:</b></h5>
                    <h6 style="font-size: 14px" id="repair-detail"></h6>
                </div>
                <div class="mb-4">
                    <h5 style="font-size: 15px"><b>Pengurangan Point:</b></h5>
                    <h6 style="font-size: 14px" id="point-detail"></h6>
                </div>
                <div class="d-flex">
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Tanggal Mulai:</b></h5>
                        <h6 style="font-size: 14px" id="start_date-detail"></h6>
                    </div>
                    <div class="mb-3 ms-5">
                        <h5 style="font-size: 15px"><b>Tanggal Akhir:</b></h5>
                        <h6 style="font-size: 14px" id="end_date-detail"></h6>
                    </div>
                </div>
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Bukti:</b></h5>
                    <img id="proof-detail" src alt="Bukti Perbaikan"
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
