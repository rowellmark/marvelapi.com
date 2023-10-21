<?php get_header(); ?>
<div id="content-full>">
	<section id="content" class="hfeed">
		
	<h1 class="archive-title">Search Results for &#8216;<?php printf( get_search_query() ); ?>&#8217;</h1>
    
    <?php get_search_form(); ?>
	
	<?php get_template_part('templates/partials/loop','archive') ?>
		
    </section><!-- end #content -->

<?php get_sidebar(); ?>	
</div><!-- end #content-sidebar -->

<?php get_footer(); ?>