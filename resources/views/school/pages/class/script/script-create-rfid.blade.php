<script>
    $('.btn-rfid').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var rfid = $(this).data('rfid');
        var oldRfid = $(this).data('old-rfid');
        var role = $(this).data('role');

        $('#name').text(name);
        $('#rfid').text(rfid);
        $('#old_rfid_input').val(oldRfid);
        $('#form-rfid').attr('action', '/school/add-to-rfid/' + role + '/' + id);

        $('#rfid-student').modal('show');
    });

</script>
