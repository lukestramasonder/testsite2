<?php get_header(); ?>

	<main role="main">
		<!-- section -->
		<section class="container pageNotFound">

			<!-- article -->
			<article id="post-404" class="center-align">
				<?php 

				$image = get_field('default_404_graphic', 'option');
				$size = 'full'; // (thumbnail, medium, large, full or custom size)

				if( $image ) {

					echo wp_get_attachment_image( $image, $size );

				}


				?>
				<h1 class="h5"><?php _e( 'Uh oh! 404 - Page not found.', 'html5blank' ); ?></h1>
				<h2 class="h3">The page you are looking for does not exist or may have been moved.</h2><br><br>
				<p>If you are having trouble finding what you need <a href="<?php echo get_permalink(16); ?>">contact us!</a></p>
				<p class="lead">
					<a href="<?php echo home_url(); ?>"><?php _e( 'Get back to familiar territory - Visit the homepage.', 'html5blank' ); ?></a>
				</p>
				<hr>
				<h3>Or, try searching for something.</h3>
				<!-- search -->
				<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
					<input class="search-input" type="search" name="s" placeholder="<?php _e( 'To search, type and hit enter.', 'html5blank' ); ?>">
					<button class="search-submit btn" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
				</form>
				<!-- /search -->

			</article>
			<!-- /article -->

		</section>
		<!-- /section -->
	</main>



<?php get_footer(); ?>
