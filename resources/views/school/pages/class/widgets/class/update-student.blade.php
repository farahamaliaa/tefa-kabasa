<div class="modal fade" id="update-student" tabindex="-1" aria-labelledby="importPegawai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importPegawai">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-update" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div id="studentImagePreview" class="mt-2 col-4 mb-2"></div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="formFile" class="mb-2">Foto Siswa <span class="text-danger">(ekstensi png, jpg, jpeg)</span></label>
                                    <div id="edit-image-preview" class="mt-2 mb-2">
                                        <img id="edit-preview-img" alt="" style="display: none; width: 200px; height: auto; object-fit: cover;" />
                                    </div>
                                    <input class="form-control mb-3" name="image" type="file" id="studentImageInput" onchange="previewEditStudentImage(event)">
                                    @error('image', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="name-edit" class="mb-2">Nama<span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name-edit" class="form-control mb-3" placeholder="Masukkan nama" value="{{ old('name') }}">
                                    @error('name', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="email-edit" class="mb-2">Email<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="email" id="email-edit" class="form-control mb-3" placeholder="Masukkan email" value="{{ old('email') }}">
                                    @error('email', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="nisn-edit" class="mb-2">NISN<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="nisn" id="nisn-edit" class="form-control" placeholder="Masukkan nisn" value="{{ old('nisn') }}">
                                    @error('nisn', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="religion-edit" class="mb-2">Agama<span
                                            class="text-danger">*</span></label>
                                    <select id="religion-edit" name="religion_id" class="form-select">
                                        @forelse ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @empty
                                            <option disabled>Tidak ditemukan</option>
                                        @endforelse
                                    </select>
                                    @error('religion_id', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="gender-edit" class="mb-2">Jenis kelamin<span
                                            class="text-danger">*</span></label>
                                    <select id="gender-edit" name="gender" class="form-select">
                                        <option value="male">Laki-Laki</option>
                                        <option value="female">Perempuan</option>
                                    </select>
                                    @error('gender', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="birth_place-edit" class="mb-2">Tempat Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="birth_place" id="birth_place-edit" placeholder="Masukkan tempat lahir"
                                        class="form-control" value="{{ old('birth_place') }}">
                                    @error('birth_place', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="birth_date-edit" class="mb-2">Tanggal Lahir<span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="birth_date" id="birth_date-edit"
                                        class="form-control" value="{{ old('birth_date') }}">
                                    @error('birth_date', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="nik-edit" class="mb-2">NIK<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="nik" id="nik-edit" class="form-control" placeholder="Masukkan nik"
                                        value="{{ old('nik') }}">
                                    @error('nik', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="number_kk-edit" class="mb-2">Nomor KK<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="number_kk" id="number_kk-edit" class="form-control" placeholder="Masukkan nomer kk"
                                        value="{{ old('number_kk') }}">
                                    @error('number_kk', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="number_akta-edit" class="mb-2">Nomor Akta<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="number_akta" id="number_akta-edit" placeholder="Masukkan nomer akta"
                                        class="form-control" value="{{ old('number_akta') }}">
                                    @error('number_akta', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="order_child-edit" class="mb-2">Anak Ke-<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="order_child" id="order_child-edit" placeholder="Anak ke-"
                                        class="form-control" value="{{ old('order_child') }}">
                                    @error('order_child', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <div class="form-group">
                                    <label for="count_siblings-edit" class="mb-2">Jumlah Saudara<span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="count_siblings" id="count_siblings-edit" placeholder="Masukkan jumlah saudara"
                                        class="form-control" value="{{ old('count_siblings') }}">
                                    @error('count_siblings', 'edit')
                                        <strong class="text-danger error-edit">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3 form-group">
                                <label for="address-edit" class="mb-2">Alamat<span
                                        class="text-danger">*</span></label>
                                <textarea name="address" id="address-edit" class="form-control" placeholder="Masukkan alamat">{{ old('address') }}</textarea>
                                @error('address', 'edit')
                                    <strong class="text-danger error-edit">{{ $message }}</strong>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light"
                        data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
