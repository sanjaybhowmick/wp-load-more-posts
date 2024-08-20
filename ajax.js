jQuery(function($) {
    $('#load-more').on('click', function() {
        var button = $(this);
        var page = button.data('page');
        var newPage = page + 1;
        var ajaxurl = button.data('url');

        $.ajax({
            url: ajaxurl,
            type: 'post',
            data: {
                page: newPage,
                action: 'load_more_default'
            },
            beforeSend: function() {
                button.text('Loading...');
            },
            success: function(response) {
                $('#post-container').append(response);
                button.data('page', newPage);
                button.text('Load More');
                
                // Remove button if there are no more posts to load
                if (response === '') {
                    button.remove();
                }
            }
        });
    });
});
