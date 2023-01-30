<?php
/*
Template Name: Home Page
*/

get_header(); ?>
<section class="content-area">
					<div class="container">
						
							<?php 
								// If there are any posts
								if( have_posts() ):

									// Load posts loop
									while( have_posts() ): the_post();
										?>
											<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
												<h2><?php the_title(); ?></h2>
												<div><?php the_content(); ?></div>
											</article>
										<?php
									endwhile;
								else:
							?>
								<p>Nothing to display.</p>
							<?php endif; ?>
						</div>
				
				</section>
	
<?php get_footer(); ?>
