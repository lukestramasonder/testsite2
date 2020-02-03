<?php 

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

if (have_posts()): while (have_posts()) : the_post(); 

$copy = get_the_content();
$copy = strip_tags($copy);
$copy = preg_replace('/\[.*?\]|/', '', $copy);
$copy = wp_trim_words( $copy, 25, '...' );

?>

	<!-- article -->


	<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>


		<!-- post thumbnail -->
		<?php if ( has_post_thumbnail()) {?>
			<div class="col s12 m12 l3">
				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="featureImg mainloop">
				<?php the_post_thumbnail('square'); // Declare pixel size you need inside the array ?>
				</a>
			</div>
			<div class="col s12 m12 l9">
		<?php } else { ?>
			<div class="col s12">
		<?php } ?>
		<h4>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h4>
		<!-- /post title -->

		<!-- post details -->
		<span class="date">Posted on: <?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
		<!-- /post details -->

		<p><?php echo $copy ?>... </p>
		<a href="<?php echo get_permalink( $post->ID ); ?>">Read more</a> <?php edit_post_link(); ?>


	</article>
	<hr>
	<!-- /article -->

<?php endwhile; ?>

<?php else: ?>

	<!-- article -->
	<article>
		<h2><?php _e( "Oh no! We couldn't find any posts...", 'html5blank' ); ?></h2>
	</article>
	<!-- /article -->

<?php endif; ?>
