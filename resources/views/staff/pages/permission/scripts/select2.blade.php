<script>
    $(document).ready(function() {

        $('#list-classroom').change(function () {
            const selectedValue = $(this).val();
            listStudent(selectedValue);
        });

        function fetchStudent(index, value)
        {
            return `
                <option value="${value.student_id}">${value.student}</option>
            `
        }

        function listStudent(id)
        {
            $.ajax({
                type: "GET",
                url: "/api/student/classroom/" + id,
                dataType: "json",
                success: function (response) {
                    $('#list-student').empty();
                    $('#list-student').append('<option value="">Pilih Siswa</option>');
                    if (response.data && response.data.length > 0) {
                        $.each(response.data, function (index, value) {
                            $('#list-student').append(fetchStudent(index, value));
                        });
                    } else {
                        $('#list-student').append('<option value="">Tidak ada siswa</option>');
                    }
                }
            });
        }


        $('.select2-create').select2({
            dropdownParent: $('#modal-create')
        });
    });
</script>
