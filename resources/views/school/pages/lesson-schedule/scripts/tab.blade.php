<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tabs = document.querySelectorAll('#pills-tab .nav-link');

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
