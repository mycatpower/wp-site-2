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

(function ($) {
  $(document).ready(function() {

    // fix on scroll side banners
    let $sideBanners = $('.banner--side');
    if ($sideBanners.length) {
      $sideBanners.each(function () {
        const $this = $(this);
        const $section = $('.section-posts');

        let scrollStart = $this.offset().top - 30;
        let scrollEnd = $section.height() + $section.offset().top - $this.height() - 30;

        $(window).on('resize', function () {
          $this.removeClass('banner--fixed');
          $this.removeClass('banner--bottom');
          scrollStart = $this.offset().top - 30;
          scrollEnd = $section.height() + $section.offset().top - $this.height() - 30;
        });

        function sideBanner() {
          let isTop = $(document).scrollTop() >= scrollStart;

          let isBottom = $(document).scrollTop() > scrollEnd;

          if (isTop && !isBottom) {
            $this.addClass('banner--fixed');
            $this.removeClass('banner--bottom');
          } else if (isBottom) {
            $this.removeClass('banner--fixed');
            $this.addClass('banner--bottom');
          } else {
            $this.removeClass('banner--fixed');
            $this.removeClass('banner--bottom');
          }
        }

        sideBanner();

        $(window).scroll(sideBanner);
      });
    }

    // menu toggle
    let $toggleBtn = $('.header__toggle');
    let $toggleMenu = $('.header__collapse');
    let $toggleMenuDesctop = $('.menu-desktop');
    if ($toggleBtn.length && $toggleMenu.length) {
      $toggleBtn.on('click', function () {
        let mobileMenu = window.matchMedia("(max-width: 991px)");

        if (mobileMenu.matches) { // If media query matches
          $toggleMenu.toggleClass('show');
        } else {
          $toggleMenuDesctop.toggleClass('show');
        }
      });

      $('.header__collapse .close-btn').on('click', function () {
        $toggleMenu.removeClass('show')
      });
    }

    let $searchBtn = $('.search-btn');
    let $headerSearch = $('.header__search');
    if ($searchBtn.length && $headerSearch.length) {
      $searchBtn.on('click', function () {
        $headerSearch.toggleClass('show')
      });

      $('.header__search .close-btn').on('click', function () {
        $headerSearch.removeClass('show')
      });
    }

    $('.slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      slidesToScroll: 1,
      nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
      prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
    });
  });
})(jQuery);
