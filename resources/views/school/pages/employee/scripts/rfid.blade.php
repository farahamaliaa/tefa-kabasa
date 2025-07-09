{{-- handle rfid teacher --}}
<script>
    $(document).ready(function() {
        $('.btn-rfid').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var rfid = $(this).data('rfid');
            var oldRfid = $(this).data('old-rfid');
            var role = $(this).data('role');
            $('#name-detail-rfid').text(name);
            $('#detail-rfid').text(rfid);
            $('#old_rfid_input').val(oldRfid);
            $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);
            $('#rfid-teacher').modal('show');
        });

        $('#rfid-teacher').on('shown.bs.modal', function() {
            $('#rfid').focus();
        });
    });
</script>

{{-- handle rfid staff --}}
<script>
    $(document).ready(function() {
        $('.btn-rfid').on('click', function() {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var rfid = $(this).data('rfid');
            var oldRfid = $(this).data('old-rfid');
            var role = $(this).data('role');

            $('#name-staff-rfid').text(name);
            $('#detail-staff-rfid').text(rfid);
            $('#old_rfid_input_staff').val(oldRfid);
            $('#form-rfid-staff').attr('action', '/school/add-to-rfid/' + role + '/' + id);
            $('#modal-rfid-staff').modal('show');
        });

        $('#modal-rfid-staff').on('shown.bs.modal', function() {
            $('#modal-rfid-staff #rfid').focus(); 
        });
    });
</script>