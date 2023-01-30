<?php
/**
 * This is the template that displays Search Form section
 *
 * @package GPS store
 */
?>
<div class="gc-search">
<span class="gc-srch-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
<form role="search" method="get" class="search-form d-none" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="text" class="search-field" placeholder="<?php echo esc_attr_x( 'Type & Hit Enter..', 'placeholder', 'twentysixteen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		
		<span class="search-submit"><i class="fa-solid fa-xmark"></i></span>

	<?php if( class_exists( 'WooCommerce' )): ?>
		<input type="hidden" value="product" name="post_type" id="post_type">
	<?php endif; ?>
</form>
	</div>