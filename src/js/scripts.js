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
            
            $('.globPopup').on('click', function (e) {
                e.preventDefault(); // Prevent the default action (e.g., following a link)
                // Open the Magnific Popup with your custom options

                $this = $(this).find('.HeroesMoreInfo');

                $.magnificPopup.open({
                    items: {
                        src: $this // Use the ID of the content you want to display in the popup
                    },
                    type: 'inline',
                    preloader: false,
                    focus: '#username',
                    modal: true
                });
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