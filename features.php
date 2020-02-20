
<?php if(get_field ('feature_one')){ ?>

  <section class="section featureOne">
    <div class="container">
      <div class="columns">
        <div class="column is-6-tablet">
          <div class="featureContent">
            <?php the_field('feature_one_content', 'option'); ?>
          </div>  
        </div>
        <div class="column is-6-tablet">
          <div class="featureImages">
          
            <?php 


            $featOneImage = get_field('feature_one_image', 'option');
            if( $featOneImage ) {
                echo wp_get_attachment_image( $featOneImage, 'xlarge' );
            }

            $featOneGallery = get_field('feature_one_additional_images', 'option');

            if( $featOneGallery ): ?>
                <div class="columns is-mobile">
                    <?php foreach( $featOneGallery as $image_id ): ?>
                        <div class="column is-6">
                            <?php echo wp_get_attachment_image( $image_id, 'square' ); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

          </div> 
        </div>
      </div>
    </div>  
  </section>

<?php } ?>





<?php if(get_field('feature_two')){ ?>

  <section class="section featureTwo">
    <div class="container">
      <?php the_field('feature_two_content', 'option'); ?>
    </div>  
  </section>

<?php } ?>




<?php if(get_field ('feature_three')){ ?>

  <section class="section featureThree">
    <div class="container">
      <div class="columns">
        <div class="column is-6-tablet">
          <div class="featureImage">
              <?php the_field('feature_three_background_image', 'option'); ?>
          </div>  
          <div class="featureImageCont">
            <?php if(get_field ('feature_three_intro_title', 'option')){ ?>
              <h2><?php the_field('feature_three_intro_title', 'option'); ?></h2>
            <?php } ?>
            <?php if(get_field ('feature_three_title', 'option')){ ?>
              <h3><?php the_field('feature_three_title', 'option'); ?></h3>
            <?php } ?>

          </div>
        </div>
        <div class="column is-6-tablet">
          <div class="featureContent">
            <?php the_field('feature_three_content', 'option'); ?>
          </div> 
        </div>
      </div>
    </div>  
  </section>

<?php } ?>
