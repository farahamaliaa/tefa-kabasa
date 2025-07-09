<div class="modal fade" id="modal-update" tabindex="-1" aria-labelledby="tambahPelajaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahPelajaran">Edit Jam Pelajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" enctype="multipart/form-data" id="form-update">
                @method('put')
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="">Jam Mulai<span class="text-danger">*</span></label>
                            <input type="time" name="start" class="form-control @error('start') is-invalid @enderror" id="start">
                            @error('start')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="">Jam Berakhir<span class="text-danger">*</span></label>
                            <input type="time" name="end" class="form-control @error('end') is-invalid @enderror" id="end">
                            @error('end')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <label for="">Jam Ke-<span class="text-danger">*</span></label>
                            <input type="number" name="name" class="form-control @error('name') is-active @enderror" id="name">
                            @error('name')
                            <div class="invalid-feedback">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                        <div class="col-lg-12 mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                Istirahat
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
