<!-- modal import -->
<div class="modal fade" id="import-violation" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Import Pelanggaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('employee.violation.student-violation.import') }}" method="POST" enctype="multipart/form-data">
                @method('post')
                @csrf
                <div class="modal-body">
                    <div class="card p-3" style="background-color: #FFF5E3;">
                        <div>
                            <h5 class="text-warning">Informasi</h5>
                        </div>
                        <div>
                            <ul style="list-style-type: disc;" class="ms-4">
                                <li>File yang dapat diunggah berupa file excel berekstensi xls, xlsx.
                                </li>
                                <li>Format pengisian file excel seperti dibawah ini.</li>
                                <li>Pada format bila ditemui nama kolom dengan tanda bintang(*) maka kolom tersebut wajib diisi</li>
                                <li>Untuk contoh format pada baris pertama pada excel <b>jangan dihapus !!!</b>.</li>
                            </ul>
                        </div>
                        <div class="ms-4">
                            <a href="{{ route('employee.student-violation.download') }}" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="me-1" width="17" height="17" viewBox="0 0 256 256">
                                    <path fill="white" d="m213.66 82.34l-56-56A8 8 0 0 0 152 24H56a16 16 0 0 0-16 16v176a16 16 0 0 0 16 16h144a16 16 0 0 0 16-16V88a8 8 0 0 0-2.34-5.66M160 51.31L188.69 80H160ZM200 216H56V40h88v48a8 8 0 0 0 8 8h48zm-42.34-82.34L139.31 152l18.35 18.34a8 8 0 0 1-11.32 11.32L128 163.31l-18.34 18.35a8 8 0 0 1-11.32-11.32L116.69 152l-18.35-18.34a8 8 0 0 1 11.32-11.32L128 140.69l18.34-18.35a8 8 0 0 1 11.32 11.32" />
                                </svg>
                                Download Format Excel
                            </a>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">File Excel</label>
                        <input type="file" class="form-control" name="file">    
                        @error('')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
