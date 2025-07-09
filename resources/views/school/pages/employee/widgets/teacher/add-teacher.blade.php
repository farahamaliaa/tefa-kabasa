<!-- modal tambah -->
<div class="modal fade" id="create-teacher" tabindex="-1" aria-labelledby="guru" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="guru">Tambah Guru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="wizard-content">
                        <form action="{{ route('school.teacher.store') }}" class="tab-wizard wizard-circle wizard clearfix"
                            role="application" id="form-add" method="POST" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <!-- Step 1 -->
                            <section>
                                <div class="row mx-3 mb-3">
                                    <div class="col-md-12">
                                        <label for="" class="mb-2">Foto Guru (opsional)</label>
                                        <img id="addImagePreview" src="#" alt="Preview"
                                            style="max-width: 200px; display: none; height: auto;">
                                        <input type="file" name="image" id="image"
                                            class="form-control mt-2" onchange="previewAddImage(event)">
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <div class="form-group">
                                            <label for="">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="name" placeholder="Masukkan nama" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">NIP <span class="text-danger"
                                                    style="font-size: larger;">*</span></label>
                                            <input type="number" name="nip" placeholder="Masukkan nip"
                                                class="form-control mb-3" value="{{ old('nip') }}">
                                            @error('nip', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6  mb-3">
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select name="religion_id" id="" class="form-select">
                                                <option value="">Pilih agama..</option>
                                                @foreach ($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id') == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('religion_id', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir <span class="text-danger"
                                                    style="font-size: larger;">*</span></label>
                                            <input type="date" name="birth_date" class="form-control"
                                                value="{{ old('birth_date') }}">
                                            @error('birth_date', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir <span class="text-danger"
                                                    style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan tempat lahir"
                                                class="form-control" name="birth_place"
                                                value="{{ old('birth_place') }}">
                                            @error('birth_place', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Jenis Kelamin <span class="text-danger"
                                                style="font-size: larger;">*</span></label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidationA" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input"
                                                    id="customControlValidationB" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                <label class="custom-control-label"
                                                    for="customControlValidationB">Perempuan</label>
                                            </div>
                                        </div>
                                        @error('gender', 'create')
                                            <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                        @enderror
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-add-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">NIK <span class="text-danger"
                                                    style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan nik" name="nik"
                                                class="form-control mb-3" value="{{ old('nik') }}">
                                            @error('nik', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">No Telp <span class="text-danger"
                                                    style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan no telp" name="phone_number"
                                                class="form-control mb-3" value="{{ old('phone_number') }}">
                                            @error('phone_number', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger"
                                                    style="font-size: larger;">*</span></label>
                                            <input type="text" placeholder="Masukkan email" name="email"
                                                class="form-control mb-3" value="{{ old('email') }}">
                                            @error('email', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="active" id="" class="form-select">
                                                <option value="1">Aktif</option>
                                                <option value="0">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-group">
                                            <h6>Alamat <span class="text-danger" style="font-size: larger;">*</span>
                                            </h6>
                                            <textarea name="address" class="form-control mb-3" placeholder="Masukkan alamat" rows="3">{{ old('address') }}</textarea>
                                            @error('address', 'create')
                                                <strong class="text-danger error-create-teacher mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button"
                                        class="btn mb-1 waves-effect waves-light btn-outline-primary prev-add-step">Kembali</button>
                                    <button type="submit"
                                        class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3 next-add-step">Simpan</button>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
