<?php get_header(); ?>
<div id="content-full">
	<section id="content" class="hfeed">
        <?php 
            echo '<h1 class="archive-title">';
            ?>
                <?php /* If this is a category archive */ if (is_category()) { ?>
                <?php single_cat_title(); ?>
                <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
                    Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;
                <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
                    Archive for <?php the_time( get_option( 'date_format' ) ); ?>
                <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
                    Archive for <?php the_time( get_option( 'date_format' ) ); ?>
                <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
                    Archive for <?php the_time( get_option( 'date_format' ) ); ?>
                <?php /* If this is an author archive */ } elseif (is_author()) { ?>
                    Author Archive
                <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                    Blog Archives
                <?php }
            echo '</h1>';
        ?>
	
		<?php get_template_part('templates/partials/loop','archive') ?>
		
    </section><!-- end #content -->

<?php get_sidebar(); ?>	
</div><!-- end #content-sidebar -->

<?php get_footer(); ?>