<?php get_header(); ?>
<div id="content-full">
	<div id="content" class="hfeed">
		<?php if ( !is_front_page() ) : ?>
			<?php get_template_part('templates/partials/loop','archive') ?>
		<?php else : ?>
		<?php endif ?>
	</div><!-- end #content -->

	<?php get_sidebar(); ?>	
</div><!-- end #content-sidebar -->

<?php get_footer(); ?>
