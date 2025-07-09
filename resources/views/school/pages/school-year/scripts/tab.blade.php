<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('#pills-tab .nav-link');
        var button = document.getElementById('btn-create-school-year');

        function updateButtonVisibility() {
            var activeTab = document.querySelector('#pills-tab .nav-link.active');
            if (activeTab && activeTab.getAttribute('href') === '#pills-schoolYears') {
                button.classList.remove('d-none');
            } else {
                button.classList.add('d-none');
            }
        }

        tabs.forEach(function(tab) {
            tab.addEventListener('shown.bs.tab', function(event) {
                localStorage.setItem('activeTab', event.target.getAttribute('href'));
                updateButtonVisibility();
            });
        });

        var activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            var tabToActivate = document.querySelector(`a[href="${activeTab}"]`);
            if (tabToActivate) {
                tabToActivate.click();
            }
        } else {
            tabs[0].click();
        }

        updateButtonVisibility(); 
    });
</script>
