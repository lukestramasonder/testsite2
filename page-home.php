<?php
/**
 * Template Name: Home Page
 */

get_header();

?>


<?php if( have_rows('home_slider') ):
  $count = count(get_field('home_slider'));

  if($count > 1) {
    $slider = 'sliderOn';
  } else {
    $slider = '';
  }
?>




  <?php if (get_field('slider_opacity') != ''){ ?>
    <style type="text/css">
      #homeSlider li .slideImage {
        opacity: <?php the_field('slider_opacity'); ?>;
      }
    </style>
  <?php } ?>


    <section id="homeSlider">

        <ul class="slider <?php echo $slider; ?>">

        <?php

          while ( have_rows('home_slider') ) : the_row();

          
          $content = get_sub_field('slide_content');
          $align = get_sub_field('alignment');

        ?>

              <li style="background-color:<?php the_field('background_color'); ?>;">
                <div class="slideImage">
                  <?php
                    $slideimage = get_sub_field('background');
                    if( $slideimage ) {
                        echo wp_get_attachment_image( $slideimage, 'full' );
                    }
                  ?>
                </div>


                  <div class="content <?php echo $align; ?>">
                    <div class="contentSlide">
                      <div class="container">
                        <div class="contentWrap">
                          <?php echo $content; ?>
                        </div>
                      </div>
                    </div>
                  </div>

              </li>
              <?php
            endwhile;
        ?>

        </ul>

  </section>

<?php endif; ?>

<main role="main">

  <section id='pageContent' class="section">        
      <div class="container content">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>
      </div>
  </section>




<?php get_template_part( 'features' );?>  





  <section class="section ">
    <div class="container">
      <div class="columns is-multiline newsFeed">
        <?php

        $args = array(
          'posts_per_page' => 3,
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
            $thumb = get_the_post_thumbnail($post_id,'postcard');
            $thumb = apply_filters( 'bj_lazy_load_html', $thumb );
          } else {
            $thumb = "";
          } 


          ?>




          <article class="column is-half-tablet is-one-third-desktop">

            <div class="postWrap">
              <?php 
                if($thumb != '') {
                  echo "<a href='".get_the_permalink()."'>$thumb</a>";
                }
              ?>

              <div class='newsDesc'>
                <h3><a href='<?php echo get_the_permalink(); ?>'><?php echo get_the_title(); ?></a></h3>
                <p class='postedIn'>Posted: <?php echo get_the_time('M j, Y'); ?> in <?php echo $termList; ?></p>
                <p><?php echo $copy ?>... </p>
                <div class="readMore">
                  <a href='<?php echo get_the_permalink(); ?>' class="readLink">Read More »</a>
                </div>
              </div>
            </div>

          </article>  

        <?php endwhile; wp_reset_query();?> 

      </div>
    </div>
  </section>






<?php get_template_part( 'prefoot' );?>

</main>

<?php get_footer(); ?>


