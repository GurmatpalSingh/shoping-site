<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package GPS store
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="profile" href="https://gmpg.org/xfn/11" />
		<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
		<meta name="description" content="<?php bloginfo('description'); ?>" />
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="top-bar" class="py-3 text-center bg-color-light">
			<div class="container clearfix">
				<div class="d-md-flex justify-content-md-between align-items-md-center">
					<?php if ( !wp_is_mobile() ) { ?>
					<h4 class="mb-2 mb-md-0 h6 fw-normal">Free Shipping on every order <span
							class="mx-2 text-black-50">·</span> 30 Days Return</h4>
					<?php } ?>

					<h4 class="mb-0 h6 fw-normal">Need Help? Call us at <a class="color" href="tel:+917837485810"><u
								class="fw-medium">+91-7837485810</u></a> or <a class="color"
							href="mailto:gurmatpal.singh@gmail.com"><u class="fw-medium">email</u></a> us.</h4>
				</div>
			</div>
		</div>
		<header id="header">
			<div id="header-wrap">
				<div <?php if ( wp_is_mobile() ) { ?> class="container-fluid" <?php } else{?> class="container"
					<?php } ?>>

					<nav class="navbar navbar-expand-md justify-content-between">
						<div class="left-container d-flex">
							<?php if( has_custom_logo() ): ?>
							<?php the_custom_logo(); ?>
							<?php else: ?>
							<p class="site-title"><?php bloginfo( 'title' ); ?></p>
							<span><?php bloginfo( 'description' ); ?></span>
							<?php endif; ?>
						</div>
						<div class="right-container d-flex">


							<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
								data-bs-target="#gps-custom-menu" aria-controls="gps-custom-menu" aria-expanded="false"
								aria-label="Toggle navigation">
								<i class="fa-solid fa-bars"></i>
							</button>


							<?php
											wp_nav_menu( array(
												'theme_location'    => 'main_menu',
												'depth'             => 3,
												'container'         => 'div',
												'container_class'   => 'collapse navbar-collapse',
												'container_id'      => 'gps-custom-menu',
												'menu_class'        => 'nav navbar-nav',
												'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
												'walker'            => new WP_Bootstrap_Navwalker(),
											) );
											?>


							<div class="gc-nav-left">
								<?php if( class_exists( 'WooCommerce' ) ): ?>
								<div class="gc-user">
									<ul>
										<li><i class="fa-solid fa-user"></i>
											<ul class="dropdown-menu">
												<?php if( is_user_logged_in() ) : ?>
												<li class="nav-item">
													<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>"
														class="dropdown-item">My Account</a>
												</li>
												<li class="nav-item">
													<a href="<?php echo esc_url( wp_logout_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ) ?>"
														class="dropdown-item">Logout</a>
												</li>
												<?php else: ?>
												<li class="nav-item">
													<a href="<?php echo esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) ?>"
														class="dropdown-item">Login / Register</a>
												</li>
												<?php endif; ?>
											</ul>
										</li>
									</ul>


								</div>

								<div class="gc-account">
									<div class="cart">
										<a href="<?php echo wc_get_cart_url(); ?>"><i
												class="fa-solid fa-cart-shopping"></i></a>
										<span class="items"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
									</div>
								</div>
								<?php endif; ?>
								
								<?php get_search_form(); ?>

						
							</div>
							

						</div>
						<!-- <a class="navbar-brand" href="<?//php echo home_url( '/' ) ?>"> -->





					</nav>


				</div>
			</div>
		</header>
