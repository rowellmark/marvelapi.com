<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php
                $aios_metaboxes_banner_title_layout = get_option( 'aios-metaboxes-banner-title-layout', '' );
                if ( ! is_custom_field_banner( get_queried_object() ) || $aios_metaboxes_banner_title_layout[1] != 1 ) {
                    $aioscm_used_custom_title   = get_post_meta( get_the_ID(), 'aioscm_used_custom_title', true );
                    $aioscm_main_title          = get_post_meta( get_the_ID(), 'aioscm_main_title', true );
                    $aioscm_sub_title           = get_post_meta( get_the_ID(), 'aioscm_sub_title', true );
                    $aioscm_title               = $aioscm_used_custom_title == 1 ? $aioscm_main_title . '<span>' . $aioscm_sub_title . '</span>' : get_the_title();
                  echo '<h1 class="entry-title ' . ($aioscm_used_custom_title == 1 ? 'entry-custom-title' : '') . '">' . $aioscm_title . '</h1>';
                }
            ?>

			<?php do_action('aios_starter_theme_before_entry_content') ?>

			<div class="entry entry-content">

				<?php the_content(); ?>

			</div>

			<?php do_action('aios_starter_theme_after_entry_content') ?>

		</div>

	<?php endwhile; ?>

<?php endif; ?>
