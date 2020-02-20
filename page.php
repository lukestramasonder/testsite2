<?php get_header(); ?>

	<main role="main">
			


    <section id='pageContent' class="section">				
    		<div class="container content">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content(); ?>
					<?php endwhile; ?>
    		</div>
		</section>


		<?php get_template_part( 'features' );?>	
		<?php get_template_part( 'prefoot' );?>


	</main>


<?php get_footer(); ?>


