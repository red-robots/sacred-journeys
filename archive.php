<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Twenty Twelve already
 * has tag.php for Tag archives, category.php for Category archives, and
 * author.php for Author archives.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>
<div id="banner-photo">        
        <?php $recent = new WP_Query("page_id=3576"); while($recent->have_posts()) : $recent->the_post();?>

<?php 
$image = get_field('banner_image');
if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> 
<?php endif; ?>


<?php endwhile; wp_reset_postdata(); // end of the loop. ?>
</div>
	<section id="primary" class="site-content">
		<div id="content" role="main">

        <div class="entry-content">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php
					if ( is_day() ) :
						printf( __( 'Daily Archives: %s', 'twentytwelve' ), '<span>' . get_the_date() . '</span>' );
					elseif ( is_month() ) :
						printf( __( 'Monthly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentytwelve' ) ) . '</span>' );
					elseif ( is_year() ) :
						printf( __( 'Yearly Archives: %s', 'twentytwelve' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentytwelve' ) ) . '</span>' );
					else :
						_e( 'Archives', 'twentytwelve' );
					endif;
				?></h1>
			</header><!-- .archive-header -->



			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/* Include the post format-specific template for the content. If you want to
				 * this in a child theme then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
			?>
  
<div class="blogentry">          
<h2><?php the_title();?></h2>         
            
 <?php the_excerpt();?>   
 
  <a href="<?php the_permalink() ?>">read more >></a>       
</div>             
<?php endwhile; ?>            
           
   <?php pagi_posts_nav(); ?>   

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->


<div id="row1-box3" class="quick-links-page">
	<h2>Most Recent Posts</h2>
<?php 
	$the_query = new WP_Query( 'showposts=5' ); 
	if( $the_query->have_posts() ) :
	while( $the_query->have_posts() ) : $the_query->the_post(); ?>

	<div class="quick-link">
        <a href="<?php the_permalink() ?>">
        	<?php the_title(); ?>
        </a>
    </div><!-- quicklink -->

 <?php endwhile; endif; wp_reset_postdata(); ?>

    <div class="archives">
    	<h2>Archives</h2>
        <ul>
        	<?php wp_get_archives('type=yearly'); ?>
        </ul>
    </div><!-- archives-->
    
    <!-- --> 
    <div id="news-search">
 <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input name="s" type="text" id="s" placeholder="search the site" value="<?php echo wp_specialchars($s, 1); ?>" size="18" />
<input type="submit" id="searchsubmit" value="GO" class="btn" />
</div>
</form>
</div>
  <!-- -->
    
</div><!--quick-links-page -->
</div>
</div>



<?php get_footer(); ?>