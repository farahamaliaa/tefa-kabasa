@extends('school.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('school.settings-information.update', $school->id) }}" method="POST" enctype="multipart/form-data">
            <div class="row pb-4 mt-5 mx-3">
                <h4>Edit Profil Sekolah</h4>
                <div class="d-flex justify-content-center">
                    <img id="preview-image" src="{{ $school->image && Storage::exists('public/' . $school->image) ? asset('storage/' . $school->image) : asset('assets/images/default-user.jpeg') }}" width="180px" alt="Foto Profil Sekolah">
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <button type="button" id="change-photo-button" class="btn btn-primary px-4">Ganti Foto</button>
                </div>
                <input type="file" id="photo-input" name="image" accept="image/*" style="display: none;">
                @method('PUT')
                @csrf
                <div class="row mt-5">
                    <div class="col-md-6 mb-4">
                        <label for="">Nama Sekolah<span class="text-d">*</span></label>
                        <input type="text" class="form-control mt-1" placeholder="Masukan nama sekolah" name="name" value="{{ old('name', $school->user->name) }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Kepala Sekolah<span class="text-d">*</span></label>
                        <input type="text" class="form-control mt-1" placeholder="Masukan kepala sekolah" name="head_school" value="{{ old('head_school', $school->head_school) }}">
                        @error('head_school')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Email Sekolah<span class="text-d">*</span></label>
                        <input type="text" class="form-control mt-1" placeholder="Masukan email sekolah" name="email" value="{{ old('email', $school->user->email) }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Telepon Sekolah<span class="text-d">*</span></label>
                        <input type="text" name="phone_number" class="form-control mt-1" placeholder="Masukan telepon sekolah" value="{{ old('phone_number', $school->phone_number) }}">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Alamat Sekolah<span class="text-d">*</span></label>
                        <textarea name="address" class="form-control mt-1" placeholder="Masukan alamat sekolah" rows="2">{{ old('address', $school->address) }}</textarea>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-12 mb-4">
                        <label for="">Deskripsi Sekolah<span class="text-d">*</span></label>
                        <textarea name="description" class="form-control mt-1" placeholder="Masukan deskripsi sekolah" rows="6">{{ old('description', $school->description) }}</textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Akreditasi<span class="text-d">*</span></label>
                        <input type="text" class="form-control mt-1" name="accreditation" placeholder="Masukan akreditasi sekolah" value="{{ old('accreditation', $school->accreditation) }}">
                        @error('accreditation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="">Website<span class="text-d">*</span></label>
                        <input type="text" class="form-control" name="website_school" id="" placeholder="Masukan website sekolah" value="{{ old('website_school', $school->website_school) }}">
                        @error('website_school')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">Kode Pos<span class="text-d">*</span></label>
                        <input type="text" class="form-control" name="pas_code" id="" placeholder="Masukan kode pos sekolah" value="{{ old('pas_code', $school->pas_code) }}">
                        @error('pas_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">NPSN<span class="text-d">*</span></label>
                        <input type="text" class="form-control" name="npsn" id="" placeholder="Masukan NPSN sekolah" value="{{ old('npsn', $school->npsn) }}">
                        @error('npsn')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="">NIP<span class="text-d">*</span></label>
                        <input type="text" class="form-control" name="nip" id="" placeholder="Masukan NIP sekolah" value="{{ old('nip', $school->nip) }}">
                        @error('nip')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="text-end">
                        <a href="{{ route('school.settings-information.index') }}" class="btn btn-primary me-2">Kembali</a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
    @include('school.pages.settings.scripts.script-update-information')
@endsection
