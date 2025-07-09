    <!-- modal tambah -->
    <div class="modal fade" id="create-level" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Tingkatan Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form action="{{ route('school.level-class.store') }}" method="POST" enctype="multipart/form-data">
                    @method('post')
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="mb-3">Nama Tingkatan Kelas</label>
                            <input type="text" class="form-control" name="name" placeholder="Masukkan nama tingkatan kelas">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                        data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
