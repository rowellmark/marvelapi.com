<?php
/*
 * Template Name: Full Width
 */
get_header(); ?>
<div id="<?php echo ai_starter_theme_get_content_id('content-full') ?>">
	<article id="content" class="hfeed">
				
		<?php get_template_part("templates/partials/content","page") ?>
				
    </article><!-- end #content -->
    
</div><!-- end #content-full -->

<?php get_footer(); ?>
