<script>
    $('.btn-detail-journal').click(function() {
        let author = $(this).data('author');
        let date = $(this).data('date');
        let classroom = $(this).data('classroom');
        let description = $(this).data('description');

        $('#detail-journal-author').text(author);
        $('#detail-journal-date').text(date);
        $('#detail-journal-class').text(classroom);

        if (description == 'kosong...') {
            $('#detail-journal-description').html(`
                <div class="text-center">
                    <img src="{{ asset('admin_assets/dist/images/empty/emprty-journal.png') }}" alt="" width="200px" class="d-block mx-auto mb-2">
                    <span class="d-block">Kosong..</span>
                </div>`);
        } else {
            $('#detail-journal-description').html('<h6 style="font-size: 14px">' + description + '</h6>');
        }
        $('#modal-detail-journal').modal('show');
    });
</script>

