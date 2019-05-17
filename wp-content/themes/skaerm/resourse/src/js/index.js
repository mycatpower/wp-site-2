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
