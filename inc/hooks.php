<?php 
    class Hooks
    {

        /**
         * Config Constructor
         */
        public function __construct()
        {

            /*
            * Add custom data attributes to menu items
            * @since 1.0.0
            */
            add_filter('nav_menu_link_attributes', [$this, 'ai_starter_theme_add_menu_link_attributes'], 10, 3);

            /*
            * Register menus
            * @action
            */
            add_action( 'init',  [$this, 'ai_starter_theme_register_menus'] );


            /*
            * Enable post thumbnails
            * @since 1.0.0
            */
            add_theme_support('post-thumbnails');
            set_post_thumbnail_size(150, 150);
            

            /*
            * Add custom classes to HP and IP
            * @fitler
            */
            add_filter('body_class', [$this, 'ai_starter_theme_extra_classes'] );


            /*
            * Hide admin bar on mobile devices
            */
            if ( $this->ai_starter_theme_is_mobile() ) {
                show_admin_bar( false );
            }

            /*
            * Allow shortodes on text widgets
            * @since 1.0.0
            */
            add_filter('widget_text', 'do_shortcode');

            /*
            * Format wp_title
            * @since 1.0.0
            */
            add_filter( 'wp_title', [$this, 'ai_starter_theme_title_filter'], 10, 2 );

            /*
            * Get content area class. Automatically uses 'content-full' if sidebar is empty.
            * @since 1.0.0
            */
            add_option( "ai_starter_theme_force_sidebar_visibility", false );

            /*
            * Remove Really Simple Discovery link
            * @since 1.0.0
            */

            remove_action( 'wp_head', 'rsd_link' );


            add_action( 'customTheme_before_inner_page_content', [$this, 'customTheme_before_inner_page_content_action'], 11 );
			add_filter( 'customTheme_before_inner_page_content_filter', [$this, 'customTheme_add_breadcrumbs'], 10 );

			add_action( 'customTheme_before_entry', [$this, 'customTheme_before_entry_action'], 11 );
			add_filter( 'customTheme_before_entry_filter', [$this, 'ai_starter_theme_add_post_meta'], 10 );

			add_action( 'customTheme_after_entry_content', [$this, 'customTheme_after_entry_content_action'], 11 );
			add_filter( 'customTheme_after_entry_content_filter', [$this, 'ai_starter_theme_add_comments_section'], 10 );


        }

        /*
        * Add custom data attributes to menu items
        * @since 1.0.0
        */
        public function ai_starter_theme_add_menu_link_attributes($atts, $item, $args)
        {
            $atts['data-title'] = $item->title;
            return $atts;
        }

        /*
        * Register menus
        * @since 1.0.0
        *
        * @access public
        * @return array
        */
        public function ai_starter_theme_register_menus() {
            register_nav_menu( 'primary-menu', 'Primary Menu' );
            register_nav_menu( 'secondary-menu', 'Secondary Menu (optional)' );
            register_nav_menu( 'footer-menu', 'Footer Menu (optional)' );
        }
                
        /*
        * Add custom classes to HP and IP
        * @since 1.0.0
        *
        * @access public
        * @return array
        */
        public function ai_starter_theme_extra_classes($c) {
            if ( is_home() ) {
                $c[] = "home-container";
            }
            else {
                $c[] = "ip-container";
            }
            return $c;
        }


        /*
        * Detect Mobile
        * @since 1.0.0
        *
        * @return bool
        */
        public function ai_starter_theme_is_mobile() {
            if(preg_match('/(alcatel|amoi|android|avantgo|blackberry|benq|cell|cricket|docomo|elaine|htc|iemobile|iphone|ipad|ipaq|ipod|j2me|java|midp|mini|mmp|mobi|motorola|nec-|nokia|palm|panasonic|philips|phone|playbook|sagem|sharp|sie-|silk|smartphone|sony|symbian|t-mobile|telus|up\.browser|up\.link|vodafone|wap|webos|wireless|xda|xoom|zte)/i', $_SERVER['HTTP_USER_AGENT'])){
                return true;
            }
            else {
                return false;
            }
        }

        /*
        * Format wp_title
        * @since 1.0.0
        */
        public function ai_starter_theme_title_filter( $title, $sep ) {
            global $paged, $page;

            if ( is_feed() )
                return $title;

            // Add the site name.
            $title .= get_bloginfo( 'name' );

            // Add the site description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                $title = "$title $sep $site_description";

            // Add a page number if necessary.
            if ( $paged >= 2 || $page >= 2 )
                $title = "$title $sep " . sprintf( __( 'Page %s', 'agentimage-theme' ), max( $paged, $page ) );

            return $title;
        }
        
        /**
		 * Display before content on innner page.
		 *
		 * @since 1.0.0
		 */
		function customTheme_before_inner_page_content_action( $content ) {

			echo apply_filters( 'customTheme_before_inner_page_content_filter', $content );

		}
		
		/**
		 * Add Yoast breadcrumbs on customTheme_before_inner_page_content_action
		 */
		function customTheme_add_breadcrumbs() {

		    // if both yoast and rank match is activagted
		    if ( is_plugin_active( 'wordpress-seo/wp-seo.php' )  && is_plugin_active( 'seo-by-rank-math/rank-math.php' )) {
               echo rank_math_the_breadcrumbs();
            }else{
                /// check if rank math is activated
                if (function_exists('rank_math_the_breadcrumbs')) {
                    echo rank_math_the_breadcrumbs();
                }
                // check if yoast fucntion is activated
                if ( function_exists('yoast_breadcrumb') ) {
                    echo yoast_breadcrumb( '<p id="breadcrumbs">','</p>', false );
                }

            }
		}

		/**
		 * Display post meta.
		 *
		 * @since 1.0.0
		 */
		function customTheme_before_entry_action( $content ) {

			echo apply_filters( 'customTheme_before_entry_filter', $content );

		}


		/*
		 * Add post meta
		 */

		function ai_starter_theme_add_post_meta() {
			
			$output = '<p class="aios-starter-theme-entry-meta">';
				$output .= '<span class="updated">Updated on ' . date('Y-m-d') . '</span>';
				$output .= '<span class="entry-meta-separator"> | </span>';
				$output .= 'Written by <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>';
			$output .= '</p>';

			return $output;
			
		}

		/**
		 * Display comment section on innner page.
		 *
		 * @since 1.0.0
		 */
		function customTheme_after_entry_content_action( $content ) {

			echo apply_filters( 'customTheme_after_entry_content_filter', $content );

		}

		/**
		 * Add comments section
		 */
		function ai_starter_theme_add_comments_section( $content ) {
			
			return '<div class="comments-template">' . comments_template() . '</div>';
			
		}
    }

    new Hooks();