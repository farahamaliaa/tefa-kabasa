<script>
    $('.btn-detail-journal').click(function() {
        let author = $(this).data('author');
        let date = $(this).data('date');
        let description = $(this).data('description');
        let title = $(this).data('title');


        $('#detail-journal-author').text(author);
        $('#detail-journal-date').text(date);
        $('#detail-journal-title').text(title);


        if (description == 'kosong...') {
            $('#detail-journal-description').html(`
                <div class="text-center">
                    <img src="{{ asset('admin_assets/dist/images/empty/empty-journal.png') }}" alt="" width="200px">
                    <span>Kosong..</span>
                </div>
            `);
        } else {
            $('#detail-journal-description').html('<h6 style="font-size: 14px">'+description+'</h6>');
        }

        $('#modal-detail-journal').modal('show');
    });
</script>
