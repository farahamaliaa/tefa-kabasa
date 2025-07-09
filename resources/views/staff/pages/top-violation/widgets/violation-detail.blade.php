<!-- modal detail -->
<div class="modal fade" id="violation-student-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai"><b>Detail Pelanggaran / </b> 
                    <span class="mb-1 badge font-medium bg-light-primary text-primary" id="date-detail"></span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4">
                {{-- <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Nama Pelapor:</b></h5>
                    <h6 style="font-size: 14px">Alfian Fahrul Rifa'i</h6>
                </div>
                <hr> --}}
                {{-- <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Nama Siswa Dilaporkan:</b></h5>
                    <h6 style="font-size: 14px">Alfian Fahrul Rifa'i</h6>
                </div> --}}
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Jenis Pelanggaran:</b></h5>
                    <h6 style="font-size: 14px" id="violation-detail"></h6>
                </div>
                <div class="mb-3">
                    <h5 style="font-size: 15px"><b>Point:</b></h5>
                    <h6 style="font-size: 14px" id="point-detail"></h6>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light btn-primary"
                    data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
