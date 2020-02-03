


      <footer class="footer <?php if(get_field('display_mailchimp')) { echo 'mcActive '; } if(get_field('display_action')) { echo 'ctaActive'; } ?>">

        <div class="container">

          <div class="columns is-mobile">

            <div class="column is-full-touch">

              <div class="logo">
                  <?php if( get_field('footer_logo','option') ): ?>
                      <img src="<?php the_field('footer_logo','option'); ?>" />
                  <?php endif; ?>
              </div>

              <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-area-1')) ?>

            </div>


            <div class="column is-full-touch">
              <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-area-2')) ?>
            </div>


            <div class="column is-half-touch is-full-mobile is-one-fifth-desktop">
              <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-area-3')) ?>
            </div>


            <div class="column is-half-touch is-full-mobile is-one-fifth-desktop">
              <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-area-4')) ?>
            </div>


          </div>



        </div>
        <div class="secondary">
          <div class="container">
            <div class="columns">
              <div class="column">
                <p>
                  <span>Copyright © <?php echo date('Y'); ?> <?php echo get_bloginfo( 'name' ); ?></span>
                </p>
              </div>
              <div class="column">
                <?php echo do_shortcode('[social]'); ?>
              </div>
            </div>
          </div>
        </div>
      </footer>

    </div>
    <!-- /wrapper -->

    <?php wp_footer(); ?>

    <script>

    if(!Modernizr.svg) {
        $('img[src*="svg"]').attr('src', function() {
            return $(this).attr('src').replace('.svg', '.png');
        });
    }
    </script>


    <script>
        jQuery.each(window.deferAfterjQueryLoaded, function(index, fn) {
            fn();
        });
    </script>
    




  </body>
</html>
