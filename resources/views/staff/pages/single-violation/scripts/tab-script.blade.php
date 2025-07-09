<script>
    document.addEventListener('DOMContentLoaded', function() {
        const violationButton = document.getElementById('btn-add-violation');
        const repairButton = document.getElementById('btn-add-repair');

        repairButton.style.display = 'none';

        const tabLinks = document.querySelectorAll('.nav-tabs a');
        tabLinks.forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(event) {
                const targetTab = event.target.getAttribute('href');

                if (targetTab === '#violation') {
                    violationButton.style.display = 'block';
                    repairButton.style.display = 'none';
                } else if (targetTab === '#repair') {
                    repairButton.style.display = 'block';
                    violationButton.style.display = 'none';
                }
            });
        });
    });
</script>
