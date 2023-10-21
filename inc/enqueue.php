<?php 
    class ENQUEUE
    {

        /**
         * Admin constructor.
         */
        public function __construct()
        {
            add_action( 'wp_enqueue_scripts', [$this, 'customTheme_enqueue'] );
        }

        /*
        * Enqueue theme styles and scripts
        */
        function customTheme_enqueue() {
            /* Fonts */
            wp_enqueue_style( 'default-font', 'https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Rozha+One&display=swap');

            /* Styles */
            wp_enqueue_style( 'magnificStyle', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css' );

            wp_enqueue_style( 'customTheme-defaults', get_template_directory_uri().'/assets/css/defaults.min.css' );
            wp_enqueue_style( 'customTheme-style', get_template_directory_uri().'/assets/css/global.min.css' );


            wp_enqueue_script( 'jquery' );
            wp_enqueue_script('magnificScript', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js');
            wp_enqueue_script('customTheme-script', get_template_directory_uri() . '/assets/js/scripts.min.js');
            /* Scripts */

            /* Homepage Specific Enqueue */
            if( is_home() ) {
                wp_enqueue_style( 'customTheme-home', get_template_directory_uri().'/assets/css/homepage.min.css' );
            }
        }
    }

    new ENQUEUE();