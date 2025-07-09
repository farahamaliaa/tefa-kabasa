@extends('school.layouts.app')

@section('style')
<style>
    .nav-tabs .nav-link.active.success {
        color: var(--bs-nav-tabs-link-active-color);
        background-color: #13deb9;
        border-color: var(--bs-nav-tabs-link-active-border-color);
    }

</style>
@endsection

@section('content')
<div class="card p-3">
    <ul class="nav nav-tabs gap-2" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-bs-toggle="tab" href="#senin" role="tab">
                <span>Senin</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#selasa" role="tab">
                <span>Selasa</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#rabu" role="tab">
                <span>Rabu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#kamis" role="tab">
                <span>Kamis</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#jumat" role="tab">
                <span>Jumat</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#sabtu" role="tab">
                <span>Sabtu</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#minggu" role="tab">
                <span>Minggu</span>
            </a>
        </li>
    </ul>
</div>

<div class="tab-content">
    <!-- Senin -->
    <div class="tab-pane active" id="senin" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-senin" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-senin" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-senin" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-senin" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Selasa -->
    <div class="tab-pane" id="selasa" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-selasa" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-selasa" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-selasa" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-selasa" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rabu -->
    <div class="tab-pane" id="rabu" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-rabu" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-rabu" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-rabu" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-rabu" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kamis -->
    <div class="tab-pane" id="kamis" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-kamis" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-kamis" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-kamis" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-kamis" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Jumat -->
    <div class="tab-pane" id="jumat" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-jumat" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-jumat" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-jumat" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-jumat" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Sabtu -->
    <div class="tab-pane" id="sabtu" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-sabtu" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-sabtu" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-sabtu" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-sabtu" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Minggu -->
    <div class="tab-pane" id="minggu" role="tabpanel">
        <div class="card p-3 mt-2">
            <ul class="nav nav-tabs gap-2" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active success" data-bs-toggle="tab" href="#siswa-minggu" role="tab">
                        <span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link success" data-bs-toggle="tab" href="#guru-minggu" role="tab">
                        <span>Guru</span>
                    </a>
                </li>
            </ul>
            <div class="tab-content mt-3">
                <div class="tab-pane active" id="siswa-minggu" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="guru-minggu" role="tabpanel">
                    <div class="row">
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Masuk Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Dimulai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="col-lg-6 mb-3">
                            <label for="" class="mb-2">Waktu Pulang Selesai<span class="text-danger">*</span></label>
                            <input type="time" class="form-control">
                        </div>
                        <div class="mt-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Libur</label>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-4 mb-3">
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
