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
		 	<?php the_content(); ?>
		 	<div class="readmore">
		 		<a href="<?php the_permalink(); ?>">Read More</a>
		 	</div>
		 </div>
</div>