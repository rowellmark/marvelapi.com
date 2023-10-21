<?php if(have_posts()) : ?>

	<?php while(have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<h1 class="entry-title"><?php echo get_the_title() ?></h1>

			<div class="entry entry-content">
				<?php the_content(); ?>
			</div>


		</div>

	<?php endwhile; ?>

	<div class="navigation">
		<?php wp_link_pages(); ?>
	</div>

<?php endif; ?>
