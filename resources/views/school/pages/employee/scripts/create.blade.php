{{-- tambah guru --}}
<script>
    $(document).ready(function() {
        var currentAddSection = 0;
        var addSections = $("#form-add > section");
        var addSteps = $(".add-steps li");

        addSections.hide();
        addSections.eq(currentAddSection).show();

        $(".next-add-step").click(function() {
            if (currentAddSection < addSections.length - 1) {
                addSections.eq(currentAddSection).hide();
                addSteps.eq(currentAddSection).removeClass("current").addClass("done");
                currentAddSection++;
                addSections.eq(currentAddSection).show();
                addSteps.eq(currentAddSection).removeClass("disabled").addClass("current");
            }
        });

        $(".prev-add-step").click(function() {
            if (currentAddSection > 0) {
                addSections.eq(currentAddSection).hide();
                addSteps.eq(currentAddSection).removeClass("current").addClass("disabled");
                currentAddSection--;
                addSections.eq(currentAddSection).show();
                addSteps.eq(currentAddSection).removeClass("done").addClass("current");
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


{{-- tambah pegawai --}}
<script>
    $(document).ready(function() {
        // Namespace the script
        var employeeFormWizard = (function() {
            var currentStep = 0;
            var steps = $("#add-form > section");
            var stepIndicators = $(".wizard-steps li"); // If you have step indicators

            function showStep(stepIndex) {
                steps.hide();
                steps.eq(stepIndex).show();
                stepIndicators.removeClass("current").addClass("disabled");
                stepIndicators.eq(stepIndex).removeClass("disabled").addClass("current");
            }

            function nextStep() {
                if (currentStep < steps.length - 1) {
                    currentStep++;
                    showStep(currentStep);
                }
            }

            function prevStep() {
                if (currentStep > 0) {
                    currentStep--;
                    showStep(currentStep);
                }
            }

            // Ensure that the button selectors match those in your HTML
            $(document).on('click', '.next-add-step', nextStep);
            $(document).on('click', '.prev-add-step', prevStep);

            // Initialize
            showStep(currentStep);

            return {
                nextStep: nextStep,
                prevStep: prevStep
            };
        })();

        function previewFile() {
            var file = document.getElementById('imageInput').files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    var output = document.getElementById('previewImg');
                    output.src = event.target.result;
                    output.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }

        // Attach the preview function to the file input change event
        $("#imageInput").on('change', previewFile);
    });
</script>