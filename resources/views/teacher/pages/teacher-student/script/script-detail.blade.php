<script>
    $('.btn-detail').click(function() {

        var name = $(this).data('name');
        var email = $(this).data('email');
        var nisn = $(this).data('nisn');
        var classroom = $(this).data('classroom');
        var gender = $(this).data('gender');
        var religion = $(this).data('religion');
        var birth_place = $(this).data('birth_place');
        var birth_date = $(this).data('birth_date');
        var number_kk = $(this).data('number_kk');
        var nik = $(this).data('nik');
        var childnumber = $(this).data('childnumber');
        var number_akta = $(this).data('number_akta');
        var numbersibling = $(this).data('numbersibling');
        var address = $(this).data('address');
        var image = $(this).data('image');
        

        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#nisn-detail').text(nisn);
        $('#classroom-detail').text(classroom);
        $('#gender-detail').text(gender);
        $('#religion-detail').text(religion);
        $('#birthdate-detail').text(birth_date);
        $('#birthplace-detail').text(birth_place);
        $('#kknumber-detail').text(number_kk);
        $('#nik-detail').text(nik);
        $('#childnumber-detail').text(childnumber);
        $('#numberAkta-detail').text(number_akta);
        $('#numbersibling-detail').text(numbersibling);
        $('#address-detail').text(address);
        $('#image-detail').attr('src', image);

        $('#modal-detail-student').modal('show');
    });
</script>
