<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>


<div class="wrapper" >

	<section id="primary" class="site-content">
		<div id="content" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
            
              

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					

					<div class="entry-content">
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<footer class="entry-footer">
						<?php //acstarter_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				</article><!-- #post-## -->
                
             

				

			<?php endwhile; // end of the loop. ?>
            
         

		</div><!-- #content -->
	</section><!-- #primary -->
 <?php get_sidebar(); ?>
</div>  
    


<?php get_footer(); ?>