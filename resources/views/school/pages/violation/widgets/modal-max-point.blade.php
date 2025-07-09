<div class="modal fade" id="modal-max-point" tabindex="-1" aria-labelledby="createRFID" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createRFID">Setting Maksimal Point</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="form-edit-point" action="#" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <div class="form-group">
                            <h6 class="mb-2">Maksimal Point :</h6>
                            <input type="number" name="max_points" class="form-control" value="{{ old('point') }}" placeholder="Point">
                            @error('max_points')
                                <span class="text-danger">{{ $message }}</span>
                                
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-1 waves-effect waves-light btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-rounded btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
