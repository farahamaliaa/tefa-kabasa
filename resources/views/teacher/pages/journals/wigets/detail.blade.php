<!-- modal detail -->
<div class="modal fade" id="modal-detail" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Detail Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <img src="{{ asset('admin_assets/dist/images/profile/user-7.jpg') }}" id="image-detail" class="rounded-circle user-profile mb-3" style="object-fit: cover; width: 150px; height: 150px;" alt="User Profile Picture" />
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Nama:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="name-detail">Ahmad Lukman Hakim</p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Email:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="email-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">NISN:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="nisn-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Kelas:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="classroom-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Jenis Kelamin:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="gender-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex" style="margin-bottom: 0.5rem;">
                            <h6 style="margin-bottom: 0;">Agama:</h6>
                            <p class="ms-2" style="margin-bottom: 0;" id="religion-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Tanggal Lahir:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="birth-date-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Tempat Lahir:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="birth-place-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Nomor KK:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="number-kk-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">NIK:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="nik-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Anak Ke-:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="order-child-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Nomor Akta:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="number-akta-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Jumlah Saudara:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="count-siblings-detail"></p>
                        </div>
                        <hr>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="d-flex text-start">
                            <h6 style="margin-bottom: 0;">Alamat:</h6>
                            <p class="ms-2 text-muted text-break" style="margin-bottom: 0;" id="address-detail"></p>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
