{{-- handle detail staff --}}
<script>
    $('.btn-detail-employee').click(function() {
        let image = $(this).data('image');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let phone = $(this).data('phone');
        let gender = $(this).data('gender');
        let nip = $(this).data('nip');
        let rfid = $(this).data('rfid');
        let address = $(this).data('address');

        $('#image-detail').attr('src', image);
        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#phone-detail').text(phone);
        $('#gender-detail').text(gender);
        $('#nip-detail').text(nip);
        $('#rfid-detail').text(rfid);
        $('#address-detail').text(address);
        $('#modal-detail').modal('show');
    });


    $('.btn-detail-teacher').click(function() {
        let image = $(this).data('image');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let phone = $(this).data('phone');
        let gender = $(this).data('gender');
        let nip = $(this).data('nip');
        let rfid = $(this).data('rfid');
        let address = $(this).data('address');

        $('#image-detail-teacher').attr('src', image);
        $('#name-detail-teacher').text(name);
        $('#email-detail-teacher').text(email);
        $('#phone-detail-teacher').text(phone);
        $('#gender-detail-teacher').text(gender);
        $('#nip-detail-teacher').text(nip);
        $('#rfid-detail-teacher').text(rfid);
        $('#address-detail-teacher').text(address);
        $('#teacher-detail').modal('show');
    });
</script>