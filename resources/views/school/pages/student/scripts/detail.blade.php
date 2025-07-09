<script>
    $('.btn-detail').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var nisn = $(this).data('nisn');
        var religion_id = $(this).data('religion_id');
        var gender = $(this).data('gender');
        var birth_place = $(this).data('birth_place');
        var birth_date = $(this).data('birth_date');
        var nik = $(this).data('nik');
        var number_kk = $(this).data('number_kk');
        var number_akta = $(this).data('number_akta');
        var order_child = $(this).data('order_child');
        var address = $(this).data('address');
        var rfid = $(this).data('rfid');
        var image = $(this).data('image');
        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#nisn-detail').text(nisn);
        $('#birth_place-detail').text(birth_place);
        $('#birth_date-detail').text(birth_date);
        $('#nik-detail').text(nik);
        $('#number_kk-detail').text(number_kk);
        $('#number_akta-detail').text(number_akta);
        $('#order_child-detail').text(order_child);
        $('#address-detail').text(address);
        $('#gender-detail').text(gender);
        $('#rfid-detail').text(rfid);
        $('#image-detail').attr('src', image);
        $('#modal-detail-student').modal('show');
    });

    $('.btn-detail-alumni').click(function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var gender = $(this).data('gender');
        var nik = $(this).data('nik');
        var rfid = $(this).data('rfid');
        var address = $(this).data('address');
        var image = $(this).data('image');
        $('#name-detail-alumni').text(name);
        $('#email-detail-alumni').text(email);
        $('#gender-detail-alumni').text(gender);
        $('#nik-detail-alumni').text(nik);
        $('#rfid-detail-alumni').text(rfid);
        $('#address-detail-alumni').text(address);
        $('#image-detail-alumni').attr('src', image);
        $('#modal-detail-alumni').modal('show');
    });
</script>
