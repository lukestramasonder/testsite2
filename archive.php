<?php get_header(); ?>
	<div class="mainHead">
	    <div id="pageHead">  
	    <div class="headerBg"></div>
	        <div class="container">
	        	<div class="intro-wrap row">
	          		<div class="col s12 m12 l12">

	          			<h1>Archives</h1>

	          		</div>
	          	</div>
	        </div>
	    </div>
	</div>
	<main role="main">
		<div class="container">

			<div class='row'>
				<div class='col s12 m12 l9'>
					<!-- section -->
					<section>

					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>

					</section>
					<!-- /section -->
				</div>
				<div class='col s12 m12 l3'>
					<?php get_sidebar(); ?>
				</div>
			</div>

		</div>
	</main>



<?php get_footer(); ?>
