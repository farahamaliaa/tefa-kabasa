<div class="modal fade" id="modal-confirm-active" tabindex="-1" aria-labelledby="tambahdataLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <form class="modal-content" method="post" id="active-school-year-form" method="POST">
            @csrf
            @method('PATCH')
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">
                    Aktifkan tahun ajaran
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan mengaktifkan tahun ajaran ini? </p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                    Aktifkan
                </button>
            </div>
        </form>
    </div>
</div>
