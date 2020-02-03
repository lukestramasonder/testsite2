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




<?php get_template_part( 'prefoot' );?>

</main>

<?php get_footer(); ?>


