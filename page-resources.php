<?php
/**
 * Template Name: Resources
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
                
                	 <?php if(is_page('sitemap')) {
								the_content(); 
								wp_nav_menu( array( 'theme_location' => 'sitemap' ) );
							} else {
                    		 	the_content();
							} ?>
			</div><!-- entry content -->

			<section class="resources">
				<?php if(have_rows('resources')) : ?>
				<?php while(have_rows('resources')) : the_row(); 

				$image = get_sub_field('image');
				?>
					<div class="resource">
						<div class="rcontent">
							<?php the_sub_field('resource'); ?>
						</div>
						
					
						<div class="image">
							<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>">
						</div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
			</section>
                
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

</div>
<?php get_footer(); ?>