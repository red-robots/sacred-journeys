<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); 

/* Start the Loop */
$wp_query = new WP_Query(array('post_status'=>'private','pagename'=>'homepage'));
if ( have_posts() ) : the_post(); 
	$homeText = get_field('home_text');
	$homeBanner = get_field('home_banner');

endif;

?>



<div id="banner-photo">
	<img src="<?php echo $homeBanner['url']; ?>" alt="<?php echo $homeBanner['alt']; ?>" border="0">
	<div id="banner-wrapper">
		<div class="banner-text"><?php echo $homeText; ?></div>
	</div>
</div>
<!-- / banner photo -->

<div class="wrapper">

	<div id="primary" class="site-content">
		<div id="content" role="main">


<?php
	//echo $postid;
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'event',
		'posts_per_page' => 4,
		'paged' => $paged

	));

	if ($wp_query->have_posts()) : ?>
	<section class="blog">
	<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


		<?php get_template_part('inc/event-post'); ?>

 	<?php endwhile; ?>
 	</section>
 <?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

</div>


<?php get_footer(); ?>