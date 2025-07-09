<script>
    document.addEventListener('DOMContentLoaded', function() {
        const repeaterContainer = document.querySelector('[data-repeater-list]');

        function updateRepeaterIndexes() {
            const repeaterItems = repeaterContainer.querySelectorAll('[data-repeater-item]');
            repeaterItems.forEach((item, idx) => {
                const indexSpan = item.querySelector('.repeater-index');
                indexSpan.textContent = idx + 1;
                const input = item.querySelector('input[name$="[point]"]');
                if (input) {
                    input.placeholder = `Masukkan Point Peringatan Ke-${idx + 1}`;
                }
            });
        }

        document.querySelector('[data-repeater-create]').addEventListener('click', function() {
            setTimeout(() => {
                updateRepeaterIndexes();
            }, 0);
        });

        updateRepeaterIndexes();
    });
</script>
