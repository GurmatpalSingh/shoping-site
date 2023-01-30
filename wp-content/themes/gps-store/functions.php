<?php
/**
 * Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GPS Store
 */



// Register Custom Navigation Walker
require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';



 // Bootstrap css and js file

function gps_store_script() {
	// Theme stylesheet.
    wp_enqueue_style( 'gps-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css', array(), '5.0.2', 'all' ); 
    wp_enqueue_script( 'gps-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', array( 'jquery' ), '5.0.2', true );
    wp_enqueue_style( 'gps-google-font', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&family=Zilla+Slab:wght@300;400;500;600;700&display=swap', array(), 'all');	
    wp_enqueue_script( 'gps-functions', get_template_directory_uri().'/js/functions.js', array( 'jquery' ));	
    wp_enqueue_script( 'gps-font-awesome', 'https://kit.fontawesome.com/ecf3eec106.js', array(), 'all');	
    wp_enqueue_style( 'gps-style', get_stylesheet_uri(), array(), 1.0, 'all' );
}
add_action( 'wp_enqueue_scripts', 'gps_store_script' );
// Disbale Gutenberg
add_filter( 'use_block_editor_for_post', '__return_false' );

/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which
* runs before the init hook. The init hook is too late for some features, such
* as indicating support for post thumbnails.
*/
// Navigation
function gps_store_config(){
	register_nav_menus(
		array(
			'main_menu' 	=> 'Main Menu'
		)
	);
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 255,
        'single_image_width'	=> 255,
        'product_grid' 			=> array(
            'default_rows'    => 10,
            'min_rows'        => 5,
            'max_rows'        => 10,
            'default_columns' => 1,
            'min_columns'     => 1,
            'max_columns'     => 1,				
        )
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    add_theme_support( 'custom-logo', array(
        'height' 		=> 85,
        'width'			=> 160,
        'flex_height'	=> true,
        'flex_width'	=> true,
    ) );
    if ( ! isset( $content_width ) ) {
        $content_width = 600;
    }	
   
        

}

add_action( 'after_setup_theme', 'gps_store_config', 0 );
if( class_exists( 'WooCommerce' )){
	require get_template_directory() . '/inc/wc-modifications.php';
}

/**
 * Disable the emoji's
 */
function disable_emojis() {
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
    add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
    add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
    * Filter funct  
    * 
    * @param array $plugins 
    * @return array Difference betwen the two arrays
    */
   function disable_emojis_tinymce( $plugins ) {
    if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
    } else {
    return array();
    }
   }
   
   /**
    * Remove emoji CDN hostname from DNS prefetching hints.
    *
    * @param array $urls URLs to print for resource hints.
    * @param string $relation_type The relation type the URLs are printed for.
    * @return array Difference betwen the two arrays.
    */
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
    if ( 'dns-prefetch' == $relation_type ) {
    /** This filter is documented in wp-includes/formatting.php */
    $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
    }
   
   return $urls;
   }
   
   // diable rest api
   
   add_filter( 'rest_authentication_errors', function( $result ) {
       if ( ! empty( $result ) ) {
           return $result;
       }
       if ( ! is_user_logged_in() ) {
           return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
       }
       return $result;
   });
   
/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'gps_store_woocommerce_header_add_to_cart_fragment' );

function gps_store_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
	<?php
	$fragments['span.items'] = ob_get_clean();
	return $fragments;
}

 ?>