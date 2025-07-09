<script>
    function previewImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('imagePreview');
                imagePreview.innerHTML =
                    `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 100%;">`;
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('imagePreview').innerHTML = '';
        }
    }

    function previewStudentImage(event) {
        const input = event.target;
        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                const imagePreview = document.getElementById('studentImagePreview');
                imagePreview.innerHTML =
                    `<img src="${e.target.result}" class="img-thumbnail" style="max-width: 100%; height: auto;">`;
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            document.getElementById('studentImagePreview').innerHTML = '';
        }
    }
</script>
