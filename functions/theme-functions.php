<?php
// This theme uses wp_nav_menu() in one location.

register_nav_menu( 'primary', __( 'Primary Menu', 'twentytwelve' ) );
register_nav_menu( 'sitemap', __( 'Sitemap Menu', 'twentytwelve' ) );
	
// This theme uses a custom image size for featured images, displayed on "standard" posts.
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
add_image_size( 'event_image', 400, 300, true );

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 327px 102px;
  	width: 327px;
  	height: 102px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');

/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.png" >'; 
} 
add_action('wp_head', 'mytheme_favicon');


/*
Plugin Name: Page Excerpt

Description: Adds support for page excerpts - uses WordPress code

*/
add_action( 'edit_page_form', 'pe_add_box');
add_action('init', 'pe_init');
function pe_init() {
	if(function_exists("add_post_type_support")) //support 3.1 and greater
	{add_post_type_support( 'page', 'excerpt' );}
}
function pe_page_excerpt_meta_box($post) {
?>
<label class="hidden" for="excerpt"><?php _e('Excerpt hey') ?></label><textarea rows="1" cols="40" name="excerpt" tabindex="6" id="excerpt"><?php echo $post->post_excerpt ?></textarea>
<p><?php _e('Excerpt go here..........'); ?></p>
<?php
}
function pe_add_box()
{
	if(!function_exists("add_post_type_support")) //legacy
	{		add_meta_box('postexcerpt', __('Page Excerpt'), 'pe_page_excerpt_meta_box', 'page', 'advanced', 'core');}
}

  // Limit the excerpt without truncating the last word.
// use like this > echo get_excerpt(100);
function get_excerpt($count){
  $permalink = get_permalink($post->ID);
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'... <div class="more-link"><a href="'.$permalink.'">MORE ></a></div>';
  return $excerpt;
}

/*
*
*		WooCommerce
*
*/
/**
 * Add the field to the checkout
 */
add_action( 'woocommerce_after_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {

	// Student Name
    echo '<div id="my_custom_checkout_field"><h2>' . __('Student Name / Student Teacher') . '</h2>';

    woocommerce_form_field( 'student_name', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Student Name'),
        'placeholder'   => __('Student Name'),
        ), $checkout->get_value( 'student_name' ));

    //echo '</div>';
	
	// Teacher Name
	//echo '<div id="my_custom_checkout_field"><h2>' . __('Student Teacher') . '</h2>';

    woocommerce_form_field( 'student_teacher', array(
        'type'          => 'text',
        'class'         => array('my-field-class form-row-wide'),
        'label'         => __('Student Teacher'),
        'placeholder'   => __('Student Teacher'),
        ), $checkout->get_value( 'student_teacher' ));

    echo '</div>';
	
	
		// If in Birthday Book Category...	
		//Check if Book in Cart (UPDATE WITH YOUR PRODUCT ID)
		$book_in_cart = wordimpress_is_conditional_product_in_cart( 3702 );
		
		if ( $book_in_cart === true ) {
		  
		  	woocommerce_form_field( 'child_birthday', array(
				'type'          => 'text',
				'class'         => array('my-field-class form-row-wide'),
				'label'         => __('Child\'s Birthday'),
				'placeholder'   => __('mm/dd/yyyy'),
				), $checkout->get_value( 'child_birthday' ));
		  
		  
		} 

}
/**
 * Check if Conditional Product is In cart
 *
 * @param $product_id
 *
 * @return bool
 */
function wordimpress_is_conditional_product_in_cart( $product_id ) {
	//Check to see if user has product in cart
	global $woocommerce;
 
	//flag no book in cart
	$book_in_cart = false;
 
	foreach ( $woocommerce->cart->get_cart() as $cart_item_key => $values ) {
		$_product = $values['data'];
 
		if ( $_product->id === $product_id ) {
			//book is in cart!
			$book_in_cart = true;
 
		}
	}
 
	return $book_in_cart;
 
}