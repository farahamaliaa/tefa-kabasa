<div class="modal fade" id="modal-create-school-year" tabindex="-1" aria-labelledby="tambahTahunAjaran" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahTahunAjaran">Tambah Tahun Ajaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('school.school-years.store') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="">Tahun Ajaran <span class="text-danger">*</span></label>
                        <div class="d-flex justify-content-between mt-3">
                            <select name="start_year" id="start-year" class="form-select me-2">
                                @for ($year = now()->year + 5; $year >= now()->year - 10; $year--)
                                    <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                            <p class="fs-7 my-auto">/</p>
                            <select name="end_year" id="end-year" class="form-select ms-2">
                                @for ($year = now()->year + 5; $year >= now()->year - 10; $year--)
                                    <option value="{{ $year }}" {{ $year == now()->year ? 'selected' : '' }}>{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                        @error('school_year', 'create')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>
