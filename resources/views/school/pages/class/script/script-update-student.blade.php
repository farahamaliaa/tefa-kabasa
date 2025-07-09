<script>
    $('.btn-edit').click(function() {
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
        var count_siblings = $(this).data('count_siblings');
        var address = $(this).data('address');
        $('#name-edit').val(name);
        $('#email-edit').val(email);
        $('#nisn-edit').val(nisn);
        $('#birth_place-edit').val(birth_place);
        $('#birth_date-edit').val(birth_date);
        $('#nik-edit').val(nik);
        $('#number_kk-edit').val(number_kk);
        $('#number_akta-edit').val(number_akta);
        $('#order_child-edit').val(order_child);
        $('#count_siblings-edit').val(count_siblings);
        $('#address-edit').val(address);
        $('#religion-edit').val(religion_id).trigger('change');
        $('#gender-edit').val(gender).trigger('change');
        $('#form-update').attr('action', '{{ route('school.students.update', '') }}/' + id);
        $('#update-student').modal('show');
    });

</script>
