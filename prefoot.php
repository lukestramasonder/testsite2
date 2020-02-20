
<?php

if(get_field('feature_other_pages')) {
  $count = count(get_field('feature_other_pages'));
} else {
  $count = 0;
  $colSizes = "is-12";
}
  switch ($count) {
    case 1:
        $colSizes = "is-12";
        break;
    case 2:
        $colSizes = "is-6";
        break;
    case 3:
        $colSizes = "is-4";
        break;
    case 4:
        $colSizes = "is-3-desktop is-6-tablet";
        break;
  }

  if( have_rows('feature_other_pages') ): ?>

          
  <section class="featuredPages section">
    <div class="container">
      <div class="columns">  

            <?php while ( have_rows('feature_other_pages') ) : the_row(); ?>

              <div class="column <?php echo $colSizes; ?>">
              <div class="featurePageWrap">
                <?php

                    $post_object = get_sub_field('page');
                    $subImage = get_sub_field('optional_image');

                    if ( has_post_thumbnail($post_object) && $subImage == '' ) {
                      $thumb = get_the_post_thumbnail($post_object,'postcard');
                      $thumb = apply_filters( 'bj_lazy_load_html', $thumb );
                    } elseif ($subImage) {
                      $thumb = wp_get_attachment_image( $subImage, 'postcard'); 
                      $thumb = apply_filters( 'bj_lazy_load_html', $thumb );
                    } else {
                      $thumb = "";
                    }

                    if($thumb != '') {
                      echo "<a href='".get_the_permalink()."'>$thumb</a>";
                    }
    
                  
                ?>
                <div class="featurePageCont">
                    <?php
                      if(get_field('header_title_replace',$post_object)){
                        echo "<h4><a href='".get_the_permalink($post_object)."'>".get_field('header_title_replace',$post_object)."</a></h4>";
                      } else {
                        echo "<h4><a href='".get_the_permalink($post_object)."'>".get_the_title($post_object)."</a></h4>";
                      }
                    ?>

                    <?php

                      if ( ! has_excerpt($post_object) ) {
                          $featCopy = get_post($post_object, ARRAY_A);
                          $featCopy = $featCopy['post_content'];

                      } else { 
                          $featCopy = get_the_excerpt($post_object);
                      }

                      $featCopy = strip_tags($featCopy);
                      $featCopy = preg_replace('/\[.*?\]|/', '', $featCopy);
                      $featCopy = wp_trim_words( $featCopy, 25, '...' );


                      echo "<p>".$featCopy."</p>";

                      echo "<p><a href='".get_the_permalink($post_object)."'>Read More</a></p>";
                    ?>
                </div>
              </div>

              </div>
            <?php endwhile; ?>

        </div>
      </div>
    </section>

<?php endif; ?>






<div class='prefootWrap <?php if(get_field('display_mailchimp')) { echo 'mcActive '; } if(get_field('display_action')) { echo 'ctaActive'; } ?>'>

  <?php if(get_field('display_mailchimp')) {?>
    <section class="mailchimp section" id="mailchimpForm">
      <div class="container">
        <div class="columns is-desktop">
            <div class="column mcText">
              <h3>Sign-up to get exclusive offers</h3>
              <p>Find out about new products and save big with first access to sales and offers and so much more. </p>
            </div>
            <div class="column mcForm">

                <form action="" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>

                      <div class="mc-field-group">

                          <div class="field">
                            <input type="text" value="" name="FNAME" class="required name input" id="mce-FNAME" placeholder="Name">
                          </div>

                          <div class="field">
                            <input type="email" value="" name="EMAIL" class="required email input" id="mce-EMAIL" placeholder="Email">
                          </div>

                            <div id="mce-responses">
                              <div class="response" id="mce-error-response" style="display:none"></div>
                              <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>

                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button is-secondary">
                      </div>
                      <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                      <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_25ce255c98bb03bce701e9f21_f2c2a91b40" tabindex="-1" value=""></div>
                    
                </form>
            </div>
        </div>
      </div>
    </section>
  <?php } ?>

  <?php if(get_field('display_action')) {?>
    <section class="ctaContact section <?php if(get_field('cta_content_override')) { echo 'customized'; }?>" id="cta">
      <div class="ctaImage objectFit">
        <?php 
          $ctaimage = get_field('cta_image','option');
          $ctaimageCust = get_field('cta_bg_image');
          if( $ctaimageCust ) {
              echo wp_get_attachment_image( $ctaimageCust, 'slider' );
          } else {
            if ( $ctaimage ) {
              echo wp_get_attachment_image( $ctaimage, 'slider' );
            }
          }
        ?>    
      </div>
      <div class="container">
        <div class="columns is-desktop">

                <?php if(get_field('cta_content') != ""){ ?>
                  <div class="column ctaText">
                    <?php the_field('cta_content'); ?>
                  </div>
                <?php } else { 
                  if(get_field('content_area', 'option') != ""){ ?>
                  <div class="column ctaText">
                    <?php the_field('content_area', 'option'); ?>
                  </div>
                  <?php }
                } ?>



                <?php if(get_field('cta_action') != ""){ ?>
                  <div class="column ctaAction">
                    <?php the_field('cta_action'); ?>
                  </div>
                <?php } else {
                  if(get_field('action_item', 'option') != ""){  ?>
                  <div class="column ctaAction">
                    <?php the_field('action_item', 'option'); ?>
                  </div>
                  <?php }
                } ?>

        </div>
      </div>
    </section>

  <?php } ?>
</div>