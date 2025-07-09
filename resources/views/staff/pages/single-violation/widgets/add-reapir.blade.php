<div class="modal fade" id="modal-repair" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Tambah Perbaikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-post-repair" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="" class="mb-2">Jenis Perbaikan</label>
                            <input type="text" name="repair" placeholder="Masukkan jenis perbaikan"
                                class="form-control">
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="form-group">
                            <label for="" class="mb-2">Poin Perbaikan</label>
                            <input type="text" name="point" placeholder="Masukkan poin perbaikan"
                                class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tanggal Mulai</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-2">
                                <div class="form-group">
                                    <label for="" class="mb-2">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date">
                                </div>
                            </div>
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
