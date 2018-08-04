
<?php 

$short_description = get_field('short_description');
$event_days = get_field('event_days');
$start_date = get_field('start_date', false, false);
if( $start_date != '' ) {
	$start_date = new DateTime($start_date);
}
$end_date = get_field('end_date', false, false);
if( $end_date != '' ) {
	$end_date = new DateTime($end_date);
}
$time = get_field('time');
// echo '<pre>';
// print_r($end_date);
// echo '</pre>';
 ?>
<div class="blog-post">
	<?php if( has_post_thumbnail() ) { 
		$postClass = 'has-image'; ?>
		<div class="image <?php echo $postClass; ?>">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php } else { 
			$postClass = 'no-image';
		 } ?>
		 <div class="content <?php echo $postClass; ?>">
		 	<h2><?php the_title(); ?></h2>
		 	<?php if( is_single() ) { the_content(); } ?>

		 	<?php if( !is_single() && $short_description != '' ) { ?>
		 		<div class="desc"><?php echo $short_description; ?></div>
		 	<?php } elseif( !is_single() ) { ?>
		 		<div class="desc"><?php the_excerpt(); ?></div>
			 <?php } else {} ?>
			 <div class="details">
				 <?php if( $start_date != '' ) { ?>
				 	<div class="date item">
				 		<?php if( $end_date != '' ) { ?>
				 			Date: <?php echo $start_date->format('M j').' - '.$end_date->format('j, Y'); ?>
				 		<?php } else { ?>
				 			Date: <?php echo $start_date->format('M j, Y'); ?>
				 		<?php } ?>
				 	</div>
				 <?php } ?>
				 <?php if( $time != '' ) { ?>
				 	<div class="date item">
				 	Time: <?php echo $time; ?>
				 	</div>
				 <?php } ?>
			 </div>

		 	<div class="readmore">
		 		<a href="<?php the_permalink(); ?>">Read More</a>
		 	</div>
		 </div>
</div>