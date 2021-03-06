<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

$image = get_field('footer_image', 'option');
?>







</div>

	<footer id="colophon" role="contentinfo">
		<div class="site-info" style="background-image: url(<?php echo $image['url']; ?>);">
		
			<div class="site-info-content">

				<div id="footer-text">
					<?php the_field('footer_text', 'option'); ?>
						<div class="subscribe">
							<a href="http://eepurl.com/hbf-J1" target="_blank" rel="noopener">Subscribe</a>
						</div>
					</div>

				<div id="footer-text2">
				<a href="<?php bloginfo('url'); ?>/sitemap">Sitemap</a> | Site by <a href="http://www.bellaworksweb.com" target="_blank">Bellaworks</a>
				</div>

			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>
</body>
</html>