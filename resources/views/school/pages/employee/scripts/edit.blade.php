{{-- edit employe --}}
<script>
    $(document).ready(function() {
        var currentEditSection = 0;
        var editSections = $("#form-edit-employee > section");
        var editSteps = $(".edit-steps li");

        function showStep(stepIndex) {
            editSections.hide();
            editSections.eq(stepIndex).show();
            editSteps.removeClass("current done disabled");
            editSteps.eq(stepIndex).addClass("current");
        }

        showStep(currentEditSection);

        $(".next-edit-step").click(function() {
            if (currentEditSection < editSections.length - 1) {
                currentEditSection++;
                showStep(currentEditSection);
            }
        });

        $(".prev-edit-step").click(function() {
            if (currentEditSection > 0) {
                currentEditSection--;
                showStep(currentEditSection);
            }
        });

        $('.btn-edit-employee').click(function() {
            let id = $(this).data('id');
            let image = $(this).data('image');
            let name = $(this).data('name');
            let nip = $(this).data('nip');
            let religion_id = $(this).data('religion_id');
            let birth_date = $(this).data('birth_date');
            let birth_place = $(this).data('birth_place');
            let gender = $(this).data('gender');
            let nik = $(this).data('nik');
            let phone = $(this).data('phone');
            let email = $(this).data('email');
            let active = $(this).data('active');
            let address = $(this).data('address');

            $('#edit-preview-img').attr('src', image).show();
            $('#edit-name').val(name);
            $('#edit-nip').val(nip);
            $('#edit-birth-date').val(birth_date);
            $('#edit-birth-place').val(birth_place);
            $('#edit-nik').val(nik);
            $('#edit-phone').val(phone);
            $('#edit-email').val(email);
            $('#edit-address').val(address);

            $('input[name="gender"][value="' + gender + '"]').prop('checked', true);
            $('#edit-religion').val(religion_id);
            $('#edit-status').val(active);

            $('#form-edit-employee').attr('action', '/school/staff/' + id);
            $('#modal-edit-employee').modal('show');
        });
    });

    function previewEditImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('edit-preview-img');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

{{-- edit guru --}}
<script>
    $(document).ready(function() {
        $('.btn-edit-teacher').click(function() {
            let id = $(this).data('id');
            let image = $(this).data('image');
            let name = $(this).data('name');
            let nip = $(this).data('nip');
            let religion_id = $(this).data('religion_id');
            let birth_date = $(this).data('birth_date');
            let birth_place = $(this).data('birth_place');
            let gender = $(this).data('gender');
            let nik = $(this).data('nik');
            let phone = $(this).data('phone');
            let email = $(this).data('email');
            let active = $(this).data('active');
            let address = $(this).data('address');

            $('#employeeImagePreview').attr('src', image).show();
            $('#name-edit').val(name);
            $('#nip-edit').val(nip);
            $('#edit-religion-teacher').val(religion_id).trigger('change');
            $('#birth_date-edit-teacher').val(birth_date);
            $('#birth_place-edit-teacher').val(birth_place);
            $('#nik-edit').val(nik);
            $('#phone-edit').val(phone);
            $('#email-edit').val(email);
            $('#address-edit').val(address);

            $('#religion-edit').val(religion_id);
            $('#status-edit').val(active);

            $('input[name="gender"][value="' + gender + '"]').prop('checked', true);

            $('#form-update').attr('action', '/school/teacher/' + id);
            $('#modal-update-teacher').modal('show');
        });

        var currentAddSection = 0;
        var addSections = $("#form-update > section");
        var addSteps = $(".add-steps li");

        function showStep(stepIndex) {
            addSections.hide();
            addSteps.removeClass("current done disabled");
            addSections.eq(stepIndex).show();
            addSteps.eq(stepIndex).addClass("current");
        }

        showStep(currentAddSection);

        $(".next-step").click(function() {
            if (currentAddSection < addSections.length - 1) {
                currentAddSection++;
                showStep(currentAddSection);
            }
        });

        $(".prev-step").click(function() {
            if (currentAddSection > 0) {
                currentAddSection--;
                showStep(currentAddSection);
            }
        });
    });

    function previewAddImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('addImagePreview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>