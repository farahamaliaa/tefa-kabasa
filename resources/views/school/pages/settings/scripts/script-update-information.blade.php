<script>
    document.getElementById('change-photo-button').addEventListener('click', function() {
        document.getElementById('photo-input').click();
    });

    document.getElementById('photo-input').addEventListener('change', function(event) {
        var input = event.target;
        var reader = new FileReader();

        reader.onload = function(){
            var dataURL = reader.result;
            var output = document.getElementById('preview-image');
            output.src = dataURL;
        };

        reader.readAsDataURL(input.files[0]);
    });
</script>