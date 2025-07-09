<script>
    document.addEventListener('DOMContentLoaded', function() {
        const showCreateSubject = @json(session('showCreateSubject'));
        const showUpdateSubject = @json(session('showUpdateSubject'));

        if (showCreateSubject) {
            var createSubjectErrors = document.querySelectorAll('.error-create');
            if (createSubjectErrors.length > 0) {
                var createSubjectElement = new bootstrap.Modal(document.getElementById('modal-create'));
                createSubjectElement.show();
            }
        }

        if (showUpdateSubject) {
            var updatSubjectErrors = document.querySelectorAll('.error-edit');
            if (updatSubjectErrors.length > 0) {
                var updateSubjectElement = new bootstrap.Modal(document.getElementById('modal-edit'));
                updateSubjectElement.show();
            }
        }
    });
</script>
