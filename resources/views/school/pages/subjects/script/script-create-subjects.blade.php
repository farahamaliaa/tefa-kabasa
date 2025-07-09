<script>
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var religion = $(this).data('religion');
        $('#form-edit').attr('action', '{{ route('school.subject.update', '') }}/' + id);
        $('#name-edit').val(name);
        $('#religion-edit').val(religion).trigger('change');
        religion == '' ? $('#check').prop('checked', false) : $('#check').prop('checked', true);
        religion == '' ? $('#religion-edit').hide() : $('#religion-edit').show();
        $('#modal-edit').modal('show');
    });

    $('.btn-delete').on('click', function() {
        var id = $(this).data('id');
        $('#form-delete').attr('action', '{{ route('school.subject.destroy', '') }}/' + id);
        $('#modal-delete').modal('show');
    });
</script>

{{-- <script>
    document.getElementById('flexSwitchCheckDefault').addEventListener('change', function() {
        var keagamaanSelect = document.getElementById('keagamaan');
        if (this.checked) {
            keagamaanSelect.style.display = 'block';
        } else {
            keagamaanSelect.style.display = 'none';
        }
    });

    document.getElementById('check').addEventListener('change', function() {
        var keagamaanSelect = document.getElementById('religion-edit');
        if (this.checked) {
            keagamaanSelect.style.display = 'block';
        } else {
            keagamaanSelect.style.display = 'none';
            keagamaanSelect.innerHTML = '<option value="">Pilih agama <span class="text-danger">*</span></option>';
        }
    });
</script>

<script>
    document.getElementById('editflexSwitchCheckDefault').addEventListener('change', function() {
        var editKeagamaanSelect = document.getElementById('editKeagamaan');
        if (this.checked) {
            editKeagamaanSelect.style.display = 'block';
        } else {
            editKeagamaanSelect.style.display = 'none';
            keagamaanSelect.innerHTML = '<option value="">Pilih agama <span class="text-danger">*</span></option>';
        }
    });
</script> --}}

<script>
    document.getElementById('category').addEventListener('change', function() {
        var religionField = document.getElementById('religion-field');
        if (this.value === 'keagamaan') {
            religionField.style.display = 'block';
        } else {
            religionField.style.display = 'none';
        }
    });

    document.getElementById('category-edit').addEventListener('change', function() {
        var religionFieldedit = document.getElementById('religion-field-edit');
        if (this.value === 'keagamaan') {
            religionFieldedit.style.display = 'block';
        } else {
            religionFieldedit.style.display = 'none';
        }
    });
</script>
