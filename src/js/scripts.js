(function ($, w, d, h, b) {
    $(document).ready(function () {
        /**
         * Construct.
         */
        __construct = () => {

            onScrollFixed();
            heroesPopup();
        }
      
        onScrollFixed = () => {

            const header = document.querySelector('.header');

            const isDesktopMediaQuery = window.matchMedia('(min-width: 992px)');

            const handleScroll = () => {
                const currentScroll = window.pageYOffset || document.documentElement.scrollTop;
                const isDesktop = isDesktopMediaQuery.matches;

                if (currentScroll > 0) {
                    header.classList.add('header--float');
                } else {
                    header.classList.remove('header--float');
                }

            };

            window.addEventListener('load', handleScroll);
            window.addEventListener('scroll', handleScroll);
        }

        
        heroesPopup = () => {
            
            $('.modad').magnificPopup({
                type: 'inline',
                preloader: false,
                focus: '#username',
                modal: true
            });
            $(document).on('click', '.popup-modal-dismiss', function (e) {
                e.preventDefault();
                $.magnificPopup.close();
            });

        }


        /**
         * Instant Initiate
         */
        __construct();

    });

    window.addEventListener('load', function () {
        document.body.classList.add('siteLoaded');
    });

})(jQuery, window, document, 'html', 'body');