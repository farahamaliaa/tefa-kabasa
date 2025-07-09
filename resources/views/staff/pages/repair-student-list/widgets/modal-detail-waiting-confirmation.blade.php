<div class="modal fade" id="modal-waiting-confirmation" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <form id="form-confirm" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">
                        <b>Detail Bukti Perbaikan / </b>
                        <span class="mb-1 badge font-medium bg-light-warning text-warning">Menunggu Konfirmasi</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body px-4">
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Pembuat Perbaikan :</b></h5>
                        <h6 style="font-size: 14px" id="employee-confirm"></h6>
                    </div>
                    <div class="col-lg-12">
                        <hr>
                    </div>
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Nama Siswa Perbaikan:</b></h5>
                        <h6 style="font-size: 14px" id="student-confirm"></h6>
                    </div>
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Pengurangan Point:</b></h5>
                        <h6 style="font-size: 14px" id="point-confirm"></h6>
                    </div>
                    <div class="mb-3 d-flex gap-5">
                        <div>
                            <h5 style="font-size: 15px"><b>Tanggal Mulai:</b></h5>
                            <h6 style="font-size: 14px" id="start_date-confirm"></h6>
                        </div>
                        <div>
                            <h5 style="font-size: 15px"><b>Tanggal Akhir:</b></h5>
                            <h6 style="font-size: 14px" id="end_date-confirm"></h6>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h5 style="font-size: 15px"><b>Bukti:</b></h5>
                        <img id="proof-confirm" src="" alt="Bukti Perbaikan" class="img-fluid rounded-3 pt-2"
                            style="max-width: 100%; height: auto;">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <div>
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-light-primary"
                            data-bs-dismiss="modal">Tutup</button>
                    </div>
                    <div>
                        <button type="submit" data-id="id-confirm" class="btn-reject btn mb-1 me-2 waves-effect waves-light btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                    d="M17.414 16L24 9.414L22.586 8L16 14.586L9.414 8L8 9.414L14.586 16L8 22.586L9.414 24L16 17.414L22.586 24L24 22.586z" />
                            </svg>
                            Tolak
                        </button>
                        <button type="submit" class="btn mb-1 waves-effect waves-light btn-success"
                            data-bs-dismiss="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="m10 15.17l9.192-9.191l1.414 1.414L10 17.999l-6.364-6.364l1.414-1.414z" />
                            </svg>
                            Terima
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
