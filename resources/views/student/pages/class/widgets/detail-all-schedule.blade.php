<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-center rounded-top-3 position-relative">
                <h5 class="modal-title text-center w-100 text-white fw-semibold" id="importPegawai">Detail Pelajaran</h5>
                <button type="button" class="btn-close text-white ms-auto" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form id="form-create" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col-lg-4">
                            <h5 class="fw-semibold">Mata Pelajaran :</h5>
                            <div class="d-flex justify-content-between">
                                <h6 id="lesson-detail"></h6>
                                <h6 id="clock-detail"></h6>
                            </div>
                        </div>
                        <div class=" col-lg-12">
                            <h5 class="fw-semibold">Pengajar :</h5>
                            <p class="text-muted">Guru yang akan mengajar pada pelajaran</p>
                            <div class="card bg-primary shadow-none position-relative overflow-hidden text-light">
                                <div class="card-body px-4 py-2">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <img src="{{ asset('assets/images/default-user.jpeg') }}"
                                                alt="Profile Image" class="img-fluid rounded-circle"
                                                style="width: 70px; height: 70px;">

                                        </div>
                                        <div class="col">
                                            <h5 class="fw-semibold mb-2 text-light" id="teacher_name-detail"></h5>
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb bg-transparent p-0 m-0">
                                                    <li class="breadcrumb-item" aria-current="page" id="teacher_email-detail"></li>
                                                </ol>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/images/background/buble-1.png') }}" alt="Image"
                                    class="position-absolute"
                                    style="bottom: 0; right: 0; width: 110px; height: auto; margin-bottom: 0px; margin-right: 0px;">
                            </div>
                        </div>
                        <div class="mb-3 col-lg-12">
                            <h5 class="fw-semibold mb-3">Tanggapan :</h5>
                            <div class="form-group mb-4">
                                <h6 class="mr-sm-2 mb-2 fw-semibold" for="inlineFormCustomSelect">Apakah pengajar masuk?</h6>
                                <h6 id="all_is_teacher_present-detail" class="mt-2"></h6>
                                <h6 class="mr-sm-2 mb-2 fw-semibold" for="inlineFormCustomSelect">Deskripsi </h6>
                                <h6 id="all_summary-detail" class="mt-2"></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
