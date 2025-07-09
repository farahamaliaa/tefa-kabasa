<script>
    $('.btn-detail').click(function() {
        var name = $(this).data('name');
        var email = $(this).data('email');
        var phone = $(this).data('phone');
        var gender = $(this).data('gender');
        var nip = $(this).data('nip');
        var address = $(this).data('address');
        var image = $(this).data('image');
        var rfid = $(this).data('rfid');

        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#phone-detail').text(phone);
        $('#gender-detail').text(gender);
        $('#nip-detail').text(nip);
        $('#address-detail').text(address);
        $('#image-detail').attr('src', image);
        $('#rfid-detail').text(rfid);

        $('#modal-detail').modal('show');
    });
</script>
