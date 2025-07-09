<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showCreateEmployee = @json(session('showCreateEmployee'));
        const showCreateTeacher = @json(session('showCreateTeacher'));

        const showUpdateEmployee = @json(session('showUpdateEmployee'));
        const showUpdateTeacher = @json(session('showUpdateTeacher'));

        if (showCreateTeacher) {
            var createTeacherElement = document.getElementById('create-teacher');

            var createModalErrors = document.querySelectorAll('.error-create-teacher');

            if (createModalErrors.length > 0) {
                var createModal = new bootstrap.Modal(createTeacherElement);
                createModal.show();
            }
        }

        if (showCreateEmployee) {
            var addEmployeeElement = document.getElementById('modal-add-emplo');

            var createModalErrors = document.querySelectorAll('.error-create-employee');

            if (createModalErrors.length > 0) {
                var addEmployeeModal = new bootstrap.Modal(addEmployeeElement);
                addEmployeeModal.show();
            }
        }

        if (showUpdateTeacher) {
            var updateTeacherElement = document.getElementById('modal-update-teacher');

            var editModalErrors = document.querySelectorAll('.error-edit-teacher');

            if (editModalErrors.length > 0) {
                var updateModal = new bootstrap.Modal(updateTeacherElement);
                updateModal.show();
            }
        }

        if (showUpdateEmployee) {
            var updateEmployeeElement = document.getElementById('modal-edit-employee');

            var editModalErrors = document.querySelectorAll('.error-edit-employee');

            if (editModalErrors.length > 0) {
                var updateEmployeeModal = new bootstrap.Modal(updateEmployeeElement);
                updateEmployeeModal.show();
            }
        }
    });
</script>
