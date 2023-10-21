<?php 
/* 
 * Template Name: Left Sidebar 
 */
get_header(); ?>
<div id="content-full">
	
    <?php get_sidebar(); ?>	

	<article id="content" class="hfeed">
			
		<?php get_template_part("templates/partials/content","page") ?>
				
    </article><!-- end #content -->

</div><!-- end #content-sidebar -->

<?php get_footer(); ?>
