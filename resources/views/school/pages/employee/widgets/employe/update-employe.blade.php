<!-- modal edit employee -->
<div class="modal fade" id="modal-edit-employee" tabindex="-1" aria-labelledby="editEmployee" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEmployee">Edit Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="wizard-content">
                    <form id="form-edit-employee" class="tab-wizard wizard-circle wizard clearfix" role="application" method="POST" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <!-- Step 1 -->
                        <section id="step1-edit-employee">
                            <div class="row mx-3">
                                <div class="col-md-12">
                                    <label for="">Foto Pegawai (opsional)</label>
                                    <div id="edit-image-preview" class="mt-2 mb-2">
                                        <img id="edit-preview-img" alt="" style="display: none; width: 200px; height: auto; object-fit: cover;" />
                                    </div>
                                    <input type="file" name="image" id="edit-image-input" class="form-control mb-3" onchange="previewEditImage(event)">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="name" id="edit-name" placeholder="Masukan nama" class="form-control mb-3" value="{{ old('name') }}">
                                        @error('name', 'update')
                                            <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIP <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="number" name="nip" placeholder="Masukan NIP" id="edit-nip" class="form-control mb-3" value="{{ old('nip') }}">
                                        @error('nip', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Agama</label>
                                        <select name="religion_id" id="edit-religion" class="form-select">
                                            @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}" {{ old('religion_id') == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('religion_id', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="date" name="birth_date" id="edit-birth-date" class="form-control mb-3" value="{{ old('birth_date') }}">
                                        @error('birth_date', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" class="form-control" placeholder="Masukan tempat lahir" id="edit-birth-place" name="birth_place" value="{{ old('birth_place') }}">
                                        @error('birth_place', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jenis Kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                    <div class="form-check d-flex align-items-center mt-2">
                                        <div class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" id="edit-gender-male" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="edit-gender-male">Laki-laki</label>
                                        </div>
                                        <div class="custom-control custom-radio me-4">
                                            <input type="radio" class="custom-control-input" id="edit-gender-female" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="edit-gender-female">Perempuan</label>
                                        </div>
                                        @error('gender', 'update')
                                            <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 mx-4">
                                <button type="button" class="btn btn-primary next-edit-step">Berikutnya</button>
                            </div>
                        </section>

                        <!-- Step 2 -->
                        <section id="step2-edit-employee">
                            <div class="row mx-3 pt-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="nik" id="edit-nik" placeholder="Masukan NIK" class="form-control mb-3" value="{{ old('nik') }}">
                                        @error('nik', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">No Telp <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="phone_number" placeholder="Masukan nomor telepon" id="edit-phone" class="form-control mb-3" value="{{ old('phone_number') }}">
                                        @error('phone_number', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <input type="text" name="email" id="edit-email" placeholder="Masukan email" class="form-control mb-3" value="{{ old('email') }}">
                                        @error('email', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="active" id="edit-status" class="form-select mb-3">
                                            <option value="1">Aktif</option>
                                            <option value="0">NonAktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h6>Alamat <span class="text-danger" style="font-size: larger;">*</span></h6>
                                        <textarea name="address" id="edit-address" placeholder="Masukan alamat" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                        @error('address', 'update')
                                        <strong class="text-danger error-edit-employee mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end mt-3 mx-4">
                                <button type="button" class="btn mb-1 waves-effect waves-light btn-light prev-edit-step">Kembali</button>
                                <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3">Simpan</button>
                            </div>
                        </section>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
