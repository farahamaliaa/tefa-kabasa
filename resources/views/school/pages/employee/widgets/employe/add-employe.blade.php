<!-- modal tambah -->
<div class="modal fade" id="modal-add-emplo" tabindex="-1" aria-labelledby="addEmployee" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEmployee">Tambah Pegawai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="">
                    <div class="wizard-content">
                        <form action="{{ route('school.staff.store') }}" id="add-form"  class="tab-wizard wizard-circle wizard clearfix" role="application" method="POST" enctype="multipart/form-data">
                            @method('post')
                            @csrf
                            <!-- Step 1 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-12">
                                        <label for="">Foto Pegawai ( opsional )</label>
                                        <div id="imagePreview" class="mt-2 mb-2">
                                            <img id="previewImg" alt="" style="display: none; width: 200px; height: auto; object-fit: cover;" />
                                        </div>
                                        <input type="file" name="image" id="imageInput" class="form-control mb-3" onchange="previewFile()">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Nama <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="name" placeholder="Masukan nama" class="form-control mb-3" value="{{ old('name') }}">
                                            @error('name', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIP <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="number" name="nip" placeholder="Masukan NIP" class="form-control mb-3" value="{{ old('nip') }}">
                                            @error('nip', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Agama</label>
                                            <select name="religion_id" id="" class="form-select">
                                                <option value="">Pilih agama..</option>
                                                @foreach ($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ old('religion_id') == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('religion_id', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tanggal Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="date" name="birth_date" class="form-control mb-3" value="{{ old('birth_date') }}">
                                            @error('birth_date', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Tempat Lahir <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" class="form-control" placeholder="Masukan Tempat Lahir" name="birth_place" value="{{ old('birth_place') }}">
                                            @error('birth_place', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Jenis Kelamin <span class="text-danger" style="font-size: larger;">*</span></label>
                                        <div class="form-check d-flex align-items-center mt-2">
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationA" name="gender" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlValidationA">Laki-laki</label>
                                            </div>
                                            <div class="custom-control custom-radio me-4">
                                                <input type="radio" class="custom-control-input" id="customControlValidationB" name="gender" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="customControlValidationB">Perempuan</label>
                                            </div>
                                            @error('gender', 'create-employee')
                                                <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn btn-primary next-add-step">Berikutnya</button>
                                </div>
                            </section>

                            <!-- Step 2 -->
                            <section>
                                <div class="row mx-3 pt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">NIK <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="nik" placeholder="Masukan NIK" class="form-control mb-3" value="{{ old('nik') }}">
                                            @error('nik', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">No Telp <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="phone_number" placeholder="Masukan nomor telepon" class="form-control mb-3" value="{{ old('phone_number') }}">
                                            @error('phone_number', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Email <span class="text-danger" style="font-size: larger;">*</span></label>
                                            <input type="text" name="email" placeholder="Masukan Email" class="form-control mb-3" value="{{ old('email') }}">
                                            @error('email', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="active" id="" class="form-select mb-3">
                                                <option value="1">Aktif</option>
                                                <option value="0">NonAktif</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h6>Alamat <span class="text-danger" style="font-size: larger;">*</span></h6>
                                            <textarea name="address" placeholder="Masukan Alamat" class="form-control mb-3" rows="3">{{ old('address') }}</textarea>
                                            @error('address', 'create-employee')
                                            <strong class="text-danger error-create-employee mb-2">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end mt-3 mx-4">
                                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light prev-add-step">Kembali</button>
                                    <button type="submit" class="btn mb-1 waves-effect waves-light btn-rounded btn-primary ms-3">Simpan</button>
                                </div>
                            </section>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
