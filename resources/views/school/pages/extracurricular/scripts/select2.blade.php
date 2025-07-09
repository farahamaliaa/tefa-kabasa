<script>
    $(document).ready(function() {
        $('.select2-create').select2({
            dropdownParent: $('#modal-create')
        });

        $('.select2-edit').select2({
            dropdownParent: $('#modal-edit')
        });

        $('.select2-create-student').select2({
            dropdownParent: $('#modal-create-student')
        });

        $('.student').select2({
            dropdownParent: $('#modal-create-student')
        });

        $('.category-dropdown').on('show.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'visible');
        });

        $('.category-dropdown').on('hide.bs.dropdown', function() {
            $(this).closest('.table-responsive').css('overflow', 'auto');
        });
    });
</script>

<script>
    $('.classroom').change(function() {
        var id = $(this).val();
        console.log(id);
        getStudents(id);
    })

    function getStudents(id) {
        $.ajax({
            url: "/school/classroom-students",
            method: "GET",
            data: {
                classroom_id: id
            },
            dataType: "JSON",
            beforeSend: function() {
                $('.student').html('')
            },
            success: function(response) {
                $.each(response.data, function(index, data) {
                    $('.student').append('<option value="' + data.student_id + '">' + data.student
                        .user.name + '</option>')
                });
            },
            error: function(error) {
                console.log(error);
            }
        })
    }
</script>
