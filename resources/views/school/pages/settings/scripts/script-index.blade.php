<script>
    $('.btn-rfid').on('click', function() {
        $('#modal-create-masterKey').modal('show');
    });
</script>

<script>
    $(document).ready(function() {
        $('#modal-create-masterKey').on('shown.bs.modal', function() {
            $('#rfid').focus().select();
        });
    });
</script>