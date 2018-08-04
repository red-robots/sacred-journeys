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