{{-- handle delete student from extracurricular --}}
<script>
    $('.btn-delete-student').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', `{{ route('school.extracurricular-students.destroy', '') }}/${id}`);
        $('#modal-delete').modal('show');
    });
</script>

{{-- handle detail student --}}
<script>
    $('.btn-detail').click(function() {
        let image = $(this).data('image');
        let name = $(this).data('name');
        let email = $(this).data('email');
        let nisn = $(this).data('nisn');
        let classroom = $(this).data('classroom');
        let gender = $(this).data('gender');
        let religion = $(this).data('religion');
        let birthdate = $(this).data('birthdate');
        let birthplace = $(this).data('birthplace');
        let number_kk = $(this).data('number_kk');
        let nik = $(this).data('nik');
        let order_child = $(this).data('order_child');
        let number_akta = $(this).data('number_akta');
        let count_sibling = $(this).data('count_sibling');
        let address = $(this).data('address');

        $('#image-detail').attr('src', image);
        $('#name-detail').text(name);
        $('#email-detail').text(email);
        $('#nisn-detail').text(nisn);
        $('#class-detail').text(classroom);
        $('#gender-detail').text(gender);
        $('#religion-detail').text(religion);
        $('#birthdate-detail').text(birthdate);
        $('#birthplace-detail').text(birthplace);
        $('#number_kk-detail').text(number_kk);
        $('#nik-detail').text(nik);
        $('#order_child-detail').text(order_child);
        $('#number_akta-detail').text(number_akta);
        $('#count_sibling-detail').text(count_sibling);
        $('#address-detail').text(address);
        $('#detail-student').modal('show');
    });
</script>
