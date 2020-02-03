

<div class='prefootWrap <?php if(get_field('display_mailchimp')) { echo 'mcActive '; } if(get_field('display_action')) { echo 'ctaActive'; } ?>'>

  <?php if(get_field('display_mailchimp')) {?>
    <section class="mailchimp section" id="mailchimpForm">
      <div class="container">
        <div class="columns is-desktop">
            <div class="column mcText">
              <h3>Sign-up to get exclusive offers </h3>
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

                            <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button inverted">
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