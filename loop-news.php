

		<div class="dropdown is-hoverable">
		  <div class="dropdown-trigger">
		    <button class="button" aria-haspopup="true" aria-controls="dropdown-menu4">
		      <span>Filter Posts</span>
		      <span class="icon is-small">
		        	<svg class="icon downArrow">
						<use xlink:href="#icon-keyboard_arrow_down" />
					</svg>
		      </span>
		    </button>
		  </div>
		  <div class="dropdown-menu" id="dropdown-menu4" role="menu">
		    <div class="dropdown-content">
		      <a href="<?php echo get_site_url(); ?>/news" class="dropdown-item <?php if(is_page(3769)){ echo 'is-active'; }  ?>">
		        Show All
		      </a>

					<?php  

							$cat_id = get_queried_object_id();
							$cat_name = get_cat_name($cat_id);
							$newsTypes = get_terms('category');

			        foreach($newsTypes as $type){
			          $name = $type->name;
			          $slug = $type->slug;
			          $term_link = get_term_link( $type );
			          if(is_page(3769)){
			          	echo "<a href='".$term_link."' class='dropdown-item'>".$name."</a> ";
			          } elseif ($name == $cat_name) {
			          	echo "<a href='".$term_link."' class='dropdown-item is-active'>".$name."</a> ";
			          } else {
			          	echo "<a href='".$term_link."' class='dropdown-item'>".$name."</a> ";
			          }
			        }
					?>


		    </div>
		  </div>
		</div>
		<hr>
		<div class="columns is-multiline">
			<?php
			$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

			$args = array(
				'posts_per_page' => 12,
				'post_type' => 'post',
				'paged' => $paged
			);

			$custom_query = new WP_Query( $args );

			while($custom_query->have_posts()) : 
				$custom_query->the_post();	

				$categories = get_the_category();
				$separator = ', ';
				$output = '';
				$slugs = '';

				if ( ! empty( $categories ) ) {
					foreach( $categories as $category ) {
						$output .= '<a href="'.get_site_url().'/'.get_option( 'category_base' ).'/'.esc_html( $category->slug ).'">'.esc_html( $category->name ) . '</a>' . $separator;
						$slugs .= $category->slug." ";
					}
					$termList =  trim( $output, $separator );
				}

				if ( ! has_excerpt() ) {
				    $copy = get_the_content();
				} else { 
				    $copy = get_the_excerpt();
				}
				$copy = strip_tags($copy);
				$copy = preg_replace('/\[.*?\]|/', '', $copy);
				$copy = wp_trim_words( $copy, 25, '...' );


				if ( has_post_thumbnail() ) {
					$thumb_id = get_post_thumbnail_id();
					$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'postcard', true);
					$thumb_url = $thumb_url_array[0];
					$thumb = "<a href='".get_the_permalink()."'><img src='".$thumb_url."' class='newsImage'></a>";
				} else {
					$thumb = "";
				}	

				?>




				<article class="column is-half-tablet is-one-third-desktop">

					<?php echo $thumb; ?>

					<div class='newsDesc'>
						<p class='postedIn'>Posted: <?php echo get_the_time('M j, Y'); ?> in <?php echo $termList; ?></p>
						<h3><a href='<?php echo get_the_permalink(); ?>'><?php echo get_the_title(); ?></a></h3>
						<p><?php echo $copy ?>... </p>
						<div class="readMore">
							<a href='<?php echo get_the_permalink(); ?>' class="readLink">Read More »</a>
						</div>
					</div>

				</article>  

			<?php endwhile; ?>	

		</div>


<?php if (function_exists("pagination")) {
	pagination($custom_query->max_num_pages);
} ?>
