<script>
    function previewEditStudentImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('edit-preview-img');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('imagePreview');
            output.innerHTML = '<img src="' + reader.result + '" class="img-fluid" />';
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>