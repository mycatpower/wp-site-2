(function ($) {
    $(document).ready(function () {

        $('.load_more_founds').click(function(e) {
            e.preventDefault();

            var button = $(this),
                postsContainer = $('.section-posts__container'),
                offset = postsContainer.find('.preview').length,
                searchParam = window.location.search.substr(1);

            data = {
                'action': 'loadmorefounds',
                'offset': offset,
                'search_param' : searchParam
            };

            $.ajax({ // you can also use $.post here
                url : params.ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                beforeSend : function (xhr) {
                    button.find('span').text('Loading...');
                },
                success : function (data){
                    if (data) {
                        button.find('span').text('Load More Results');
                        postsContainer.append(data);

                        var length = $('.section-posts__container').find('.preview').length;

                        if ((button.data('found') / length) <= 1) {
                            button.remove();
                        }

                        // you can also fire the "post-load" event here if you use a plugin that requires it
                        // $( document.body ).trigger( 'post-load' );
                    }
                }
            });
        });

        $('.load-more-articles').click(function(e) {
            e.preventDefault();

            var button = $(this),
                postsContainer = $('.section-posts__container'),
                offset = postsContainer.find('.preview').length,
                locationURI = location.pathname.substr(1);
                data = {
                    'action': 'loadmore',
                    'offset': offset,
                    'uri' : locationURI
                };

            $.ajax({ // you can also use $.post here
                url : params.ajaxurl, // AJAX handler
                data : data,
                type : 'POST',
                beforeSend : function (xhr) {
                    button.find('span').text('Loading...');
                },
                success : function (data){
                    if (data) {
                        button.find('span').text('Load More Results');
                        postsContainer.append(data);

                        var length = $('.section-posts__container').find('.preview').length;

                        if ((button.data('found') / length) <= 1) {
                            button.remove();
                        }

                        // you can also fire the "post-load" event here if you use a plugin that requires it
                        // $( document.body ).trigger( 'post-load' );
                    }
                }
            });
        });

    });
})(jQuery);
