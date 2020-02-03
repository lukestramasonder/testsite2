<?php /* Template Name: News */ get_header(); ?>



	<main role="main">


    <section id='pageContent' class="container">				
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</section>


		<section class="section">
				<div class="container">
					<?php get_template_part( 'loop-news' );?>
				</div>
		</section>
			
	</main>		


<?php get_template_part( 'prefoot' );?>	

<?php get_footer(); ?>



