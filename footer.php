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
?>







</div>

	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<div class="site-info-content">

				<div id="footer-text"><?php the_field('footer_text', 'option'); ?></div>

				<div id="footer-text2">
				<a href="<?php bloginfo('url'); ?>/sitemap">Sitemap</a> | Site by <a href="http://www.bellaworksweb.com" target="_blank">Bellaworks</a>
				</div>

			</div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>
</body>
</html>