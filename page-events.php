<?php
/**
 * Template Name: Events
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>  

<div id="banner-photo-sub">
<?php if(has_post_thumbnail()) {
		the_post_thumbnail();
	} else{ ?>
		<img src="<?php bloginfo('template_url'); ?>/images/bg-sub-photo.jpg" alt="" border="0">
	<?php } ?>
</div>


<div class="wrapper">

	<div id="primary" class="site-content">
		<div id="content" role="main">
        	<div class="entry-content">
                <h1><?php the_title(); ?></h1>
                
                	 <?php the_content(); ?>
			</div><!-- entry content -->
			<?php endwhile; // end of the loop. ?>

			<?php $wp_query = new WP_Query();
					$wp_query->query(array(
					'post_type'=>'event',
					'posts_per_page' => 10,
					'paged' => $paged,
				));
					if ($wp_query->have_posts()) : ?>
						<section class="blog">
							<?php while ($wp_query->have_posts()) : $wp_query->the_post();

							get_template_part('inc/event-post');
							?>

							<?php endwhile; 

							pagi_posts_nav();

							?>
						</section>
					<?php endif; ?>
                
                
			

		</div><!-- #content -->
	</div><!-- #primary -->

</div>
<?php get_footer(); ?>