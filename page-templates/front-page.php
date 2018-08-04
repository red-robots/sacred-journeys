<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<div id="banner-photo">



<?php if(is_home()) { ?>


<?php $recent = new WP_Query("page_id=3576"); while($recent->have_posts()) : $recent->the_post();?>

<?php 
$image = get_field('banner_image');
if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> 
<?php endif; ?>


<?php endwhile; wp_reset_postdata(); // end of the loop. ?>



<?php } else { ?>

<?php 
$image = get_field('banner_image');
if( !empty($image) ): ?>
    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> 
<?php endif; ?>

<?php } ?>



</div><!-- / banner photo -->
	
<div id="row1">

<div id="row1-box1">
<div id="row1-box1-fb-feed">
<h2>FACEBOOK</h2>
<div id="row1-box1-fb-feed-content">
<?php echo do_shortcode('[custom-facebook-feed]'); ?></div>
</div>


<div id="mini-news-signup"></div>

</div>

<div id="row1-box2">
<h2>UPCOMING EVENTS</h2>
<?php echo do_shortcode('[google-calendar-events id="3504" type="list"]'); ?>
</div>

<div id="row1-box3">

<h2>Quick Links</h2>


<?php 
				  		// Run the Quicklinks Repeater Field
						if(get_field('quick_links', 'option')) :  ?>
                      
						  <?php while(has_sub_field('quick_links', 'option')) :  ?>
                          	<div class="quick-link">
                                <a target="_blank" href="<?php 
										if(get_sub_field('link', 'option')!="") {
											the_sub_field('link', 'option');
										} elseif(get_sub_field('file', 'option')!="") {
											the_sub_field('file', 'option');
										} else { echo "#"; } ?>">
                                        <?php the_sub_field('link_title', 'option'); ?></a>
                            </div>
                          <?php endwhile; ?>
                     
                  <?php endif; ?>



</div><!-- / row1 box3 --> 

</div> <!-- / row1 -->   

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>