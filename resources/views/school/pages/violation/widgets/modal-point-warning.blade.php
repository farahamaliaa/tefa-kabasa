<div class="modal fade" id="modal-warning-point" tabindex="-1" aria-labelledby="createRFID" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRFID"><b>Peringatan Point</b></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-point" action="{{ route('school.school-points.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto;">
                    <div style="background-color: #EFF3FF; color: white; padding: 16px; border-radius: 8px;" class="mb-3">
                        <div class="d-flex">
                            <div class="align-items-center mb-4">
                                <span style="background-color: #5D87FF; padding: 4px; border-radius: 4px;" class="badge p-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="m8.93 6.588l-2.29.287l-.082.38l.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319c.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246c-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0a1 1 0 0 1 2 0" />
                                    </svg>
                                </span>
                            </div>
                            <h5 class="ms-2 pt-1" style="font-size: 16px;"><b>Penjelasan</b></h5>
                        </div>
                        <p class="mt-0 text-muted">
                            Point Peringatan digunakan untuk siswa dengan point pelanggaran yang sudah mencapai
                            peringatan yang ditentukan untuk menindak lanjuti siswa yang melanggar
                        </p>
                    </div>

                <div class="email-repeater mb-3">
                    <div data-repeater-list="repeater-group">
                    @forelse ($schoolPoints as $key => $schoolPoint)
                        <div data-repeater-item class="mb-3 position-relative repeater-item" data-id="{{ $schoolPoint->id }}">
                            <div class="mb-3">
                                <label for="" class="mb-2"><b>Point Peringatan Ke-<span class="repeater-index">1</span></b></label>
                                <input type="number" class="form-control" name="repeater-group[{{ $key }}][point]" value="{{ $schoolPoint->point }}"
                                    placeholder="Masukkan Point Peringatan Ke-<span class='repeater-index'>1</span>"
                                    style="width: 100%; height: 36px;">
                                @error('point.*')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-3">
                                    <label for="" class="mb-2"><b>Deskripsi</b></label>
                                    <input type="text" class="form-control" name="repeater-group[{{ $key }}][description]" value="{{ $schoolPoint->description }}"
                                        placeholder="Masukkan Deskripsi" style="width: 100%; height: 36px;">
                                    @error('description.*')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <input type="hidden" name="repeater-group[{{ $key }}][id]" value="{{ $schoolPoint->id }}">
                                <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light repeater-delete"
                                    type="button" style="padding: 6px 12px; height: 38px; margin-top: 24px;">
                                    <i class="ti ti-circle-x fs-5"></i>
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                    @empty
                        <div data-repeater-item class="mb-3 position-relative repeater-item">
                            <div class="mb-3">
                                <label for="" class="mb-2"><b>Point Peringatan Ke-<span class="repeater-index">1</span></b></label>
                                <input type="number" class="form-control" name="repeater-group[][point]"
                                    placeholder="Masukkan Point Peringatan Ke-<span class='repeater-index'>1</span>"
                                    style="width: 100%; height: 36px;">
                                @error('point.*')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 me-3">
                                    <label for="" class="mb-2"><b>Deskripsi</b></label>
                                    <input type="text" class="form-control" name="repeater-group[][description]"
                                        placeholder="Masukkan Deskripsi" style="width: 100%; height: 36px;">
                                    @error('description.*')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                                </div>
                                <button data-repeater-delete="" class="btn btn-danger waves-effect waves-light repeater-delete"
                                    type="button" style="padding: 6px 12px; height: 38px; margin-top: 24px;">
                                    <i class="ti ti-circle-x fs-5"></i>
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                    @endforelse
                    </div>
                    <button type="button" data-repeater-create="" class="btn btn-primary waves-effect waves-light">
                        <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" class="me-2" viewBox="0 0 48 48">
                                <g fill="none">
                                    <rect width="38" height="26" x="5" y="16" stroke="currentColor" stroke-linejoin="round"
                                        stroke-width="4" rx="3" />
                                    <path fill="currentColor"
                                        d="M19 8h10V4H19zm11 1v7h4V9zm-12 7V9h-4v7zm11-8a1 1 0 0 1 1 1h4a5 5 0 0 0-5-5zM19 4a5 5 0 0 0-5 5h4a1 1 0 0 1 1-1z" />
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                        d="M18 29h12m-6-6v12" />
                                </g>
                            </svg>
                            Tambah Point
                        </div>
                    </button>
                </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light"
                        style="background-color: #C7C7C7; color: white;" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>