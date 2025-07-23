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
            const oldReligionEdit = @json(old('religion_id'));
            const editId = @json(session('editId'));
            $('#form-edit').attr('action', '{{ route('school.subject.update', '') }}/' + editId);
            var updatSubjectErrors = document.querySelectorAll('.error-edit');
            if (updatSubjectErrors.length > 0) {
                if (oldReligionEdit) {
                    document.getElementById('religion-field-edit').style.display = 'block';
                }

                var updateSubjectElement = new bootstrap.Modal(document.getElementById('modal-edit'));
                updateSubjectElement.show();
            }
        }
    });
</script>
