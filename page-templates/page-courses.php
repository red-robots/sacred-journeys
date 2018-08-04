<?php
/**
 * Template Name: Courses
 *
 *
 */

get_header(); ?>


        
        
			<div id="primary" class="site-content">
		<div id="content" role="main">
        
    
        

		
        
        <div class="events-entry-content">
<div id="row1-header" style="padding-top: 35px!important;"><h1><?php the_title(); ?></h1></div>
               
<div id="row1-feed">               
  	
<?php
	//echo $postid;
	$wp_query = new WP_Query();
	$wp_query->query(array(
		'post_type'=>'post',
		'posts_per_page' => 4,
		'paged' => $paged

	));

	if ($wp_query->have_posts()) : while ($wp_query->have_posts()) :  $wp_query->the_post(); ?>

	<div class="home-blogentry">
    
<!-- image -->

<?php
$image = get_field('featured_image');
  $image = get_field('featured_image');
  $url = $image['url'];
  $title = $image['title'];
  $alt = $image['alt'];
  $caption = $image['caption'];
 
  // thumbnail or custom size that will go
  // into the "thumb" variable.
  $size = 'event_image';
  $thumb = $image['sizes'][ $size ];
  $width = $image['sizes'][ $size . '-width' ];
  $height = $image['sizes'][ $size . '-height' ];
if( !empty($image) ): ?>
	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
<?php endif; ?>    
    
<!-- / image -->    
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

<p><?php the_field("short_description"); ?></p>     

<div class="event-info">

<div class="event-row"><?php the_field("event_days"); ?></div>
<div class="event-row"><?php 
	if(get_field('start_date'))
		{
			$date = DateTime::createFromFormat('Ymd', get_field('start_date'));
			echo $date->format('F j, Y');
			echo '';
		}	 	 			 	 
?>
<?php 
	if(get_field('end_date'))
		{
			$date = DateTime::createFromFormat('Ymd', get_field('end_date'));
			echo ' - ';
			echo $date->format('F j, Y');
		}	 	 			 	 
?></div>
<div class="event-row"><?php the_field("time"); ?>    </div>                
</div>

 <div class="learn-more-button"><a href="<?php the_permalink(); ?>">Learn More</a></div>
 
 	       
	</div><!-- blogentry -->

	<?php endwhile; ?>
	<?php pagi_posts_nav(); ?>
	<?php endif; ?>

</div>
                	                            
      </div><!-- entry content -->
   </div><!-- #content -->
</div><!-- #primary -->



<?php get_footer(); ?>