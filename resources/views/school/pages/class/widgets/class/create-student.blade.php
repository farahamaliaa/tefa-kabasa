    <!-- tambah modal -->
    <div class="modal fade" id="create-student" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importPegawai">Tambah Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('school.students.store', ['classroom' => $classroom]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mx-3" style="max-height: 70vh; overflow-y: auto;">
                        <div class="row">
                            <div class="col-md-12 ">
                                <div id="imagePreview" class="mt-2 col-4 mb-2"></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="formFile" class="mb-1">Foto Siswa <span class="text-danger">(ekstensi png, jpg, jpeg)</span></label>
                                        <div id="create-image-preview" class="mt-2 mb-2">
                                            <img id="create-preview-img" alt="" style="display: none; width: 200px; height: auto; object-fit: cover;" />
                                        </div>
                                        <input class="form-control" name="image" type="file" id="formFile" onchange="previewImage(event)">
                                        @error('image', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="name" class="mb-1">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="name" class="form-control mb-3" placeholder="Masukkan nama" value="{{ old('name') }}">
                                        @error('name', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="email" class="form-control mb-3" placeholder="Masukkan email" value="{{ old('email') }}">
                                        @error('email', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">NISN <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="nisn" class="form-control" placeholder="Masukkan nisn" value="{{ old('nisn') }}">
                                        @error('nisn', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2 ">Agama <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <select id="religion" name="religion_id" class="form-select">
                                            <option selected>Pilih...</option>
                                            @forelse ($religions as $religion)
                                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                            @empty
                                                <option disabled>Tidak ditemukan</option>
                                            @endforelse
                                        </select>
                                        @error('religion_id', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="" class="mb-2">Jenis kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <select id="gender" name="gender" class="form-select">
                                            <option value="" selected>Pilih...</option>
                                            <option value="male">Laki-Laki</option>
                                            <option value="female">Perempuan</option>
                                        </select>
                                        @error('gender', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="birth_place" class="mb-2">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="birth_place" class="form-control" placeholder="Masukkan tempat lahir" value="{{ old('birth_place') }}">
                                        @error('birth_place', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="birth_date" class="mb-2">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date') }}">
                                        @error('birth_date', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="nik" class="mb-2">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="nik" class="form-control" placeholder="Masukkan nik" value="{{ old('nik') }}">
                                        @error('nik', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="number_kk" class="mb-2">Nomor KK <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="number_kk" class="form-control" placeholder="Masukkan nomer kk" value="{{ old('number_kk') }}">
                                        @error('number_kk', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="number_akta" class="mb-2">Nomor Akta <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="number_akta" class="form-control" placeholder="Masukkan nomer akta" value="{{ old('number_akta') }}">
                                        @error('number_akta', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="order_child" class="mb-2">Anak Ke- <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="order_child" class="form-control" placeholder="Anak ke-" value="{{ old('order_child') }}">
                                        @error('order_child', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <div class="form-group">
                                        <label for="count_siblings" class="mb-2">Jumlah Saudara <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="count_siblings" class="form-control" placeholder="Jumlah saudara" value="{{ old('count_siblings') }}">
                                        @error('count_siblings', 'create')
                                            <strong class="text-danger error-create">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3 form-group">
                                    <label for="address" class="mb-2">Alamat <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <textarea placeholder="Masukkan alamat" name="address" id="address" class="form-control">{{ old('address') }}</textarea>
                                    @error('address', 'create')
                                        <strong class="text-danger error-create">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
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
