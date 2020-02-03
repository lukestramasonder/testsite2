
<?php get_header(); ?>

	<main role="main">
	<!-- section -->


	<section id='pageContent' class="section">
				<div class="container content">


			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


						<?php
							the_post_thumbnail( 'full');
						?>
					


						<?php the_content(); ?>


				<div class="postData">
                        

	            <div class="socialIcons">
	            	<p class="tiny">Share this post:</p>

						<?php
				         $svgfacebook = '<svg id="b750bedb-788b-4536-a32a-2389399723a2" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><title>Facebook-Logo</title><path d="M51.7722,29.32H41.4671V22.467c.7535-6.4768,11.4536-5.2477,11.4536-5.2477l.0032-.4423-.0032-.05V6.0864h-.0013V6.0846h-.0076c-.3681-.0872-21.2864-5.0526-25.4413,10.8677a.0171.0171,0,0,1-.0051.013c-.0083.0339-.0179.069-.0268.1036-.653,1.9916-.6089,11.1054-.6,12.2513H17.9068V41.5094h9.485V74.6638H41.2046V41.5094H51.77L52.96,29.32Z" fill="#231f20"/></svg>';
				        $svglinkedin = '<svg id="e81568c1-7cc5-41d2-b6be-07a28fb590b8" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><title>Linkedin</title><path d="M21.0122,74.7067H6.6873V28.4318H21.0122V74.7067ZM13.7806,22.3705h0a8.5389,8.5389,0,1,1,8.47-8.5383,8.5038,8.5038,0,0,1-8.47,8.5383ZM74.69,74.7067H60.4352V50.4147c0-6.6606-2.5313-10.3807-7.8-10.3807-5.7329,0-8.7263,3.8725-8.7263,10.3807v24.292H30.1708V28.4318H43.9094v6.2316a16.1331,16.1331,0,0,1,13.9439-7.6452c9.8109,0,16.8365,5.9937,16.8365,18.3891V74.7067Z" fill="#231f20"></path></svg>';
						$svgtwitter = '<svg id="a6944272-e23d-4ef8-b1ad-88963b715859" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><title>Twitter-Logo</title><path d="M67.5912,25.8492c.9007,20.02-14.0324,42.3448-40.4582,42.3448A40.2678,40.2678,0,0,1,5.3121,61.7947a28.62,28.62,0,0,0,21.0744-5.893,14.2471,14.2471,0,0,1-13.2986-9.8859,14.21,14.21,0,0,0,6.4281-.2438A14.25,14.25,0,0,1,8.0981,31.6359a14.1758,14.1758,0,0,0,6.448,1.78A14.2519,14.2519,0,0,1,10.141,14.4115,40.4127,40.4127,0,0,0,39.48,29.2838,14.2436,14.2436,0,0,1,63.7372,16.3014a28.5688,28.5688,0,0,0,9.04-3.4546,14.2991,14.2991,0,0,1-6.2584,7.8764A28.4232,28.4232,0,0,0,74.6916,18.48a28.82,28.82,0,0,1-7.1,7.3693Z" fill="#231f20"/></svg>';
				        $svgemail = '<svg id="09167774-e467-4b09-b62a-65fcc32ac216" data-name="ae75f121-dd5b-44a2-9d47-e1fd8fc62c6c" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><title>Mail-Logo</title><path d="M68.5322,10.3691H11.875a7.24,7.24,0,0,0-7.231,7.2315v43.99a7.24,7.24,0,0,0,7.231,7.2315H68.5322a7.24,7.24,0,0,0,7.2315-7.2315v-43.99A7.24,7.24,0,0,0,68.5322,10.3691Zm-2.9433,6L40.9434,41.0146a1.0466,1.0466,0,0,1-1.4795,0L14.8184,16.3691Zm2.9433,46.4532H11.875a1.2329,1.2329,0,0,1-1.231-1.2315V20.6792L35.2217,45.2568a7.0527,7.0527,0,0,0,9.9638,0L69.7637,20.6791V61.5908A1.2333,1.2333,0,0,1,68.5322,62.8223Z" fill="#231f20"/></svg>';
				        $svgpinterest = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 80"><title>pinterest</title><path d="M40.4046,7.3149A32.8633,32.8633,0,1,0,73.2679,40.1782,32.8633,32.8633,0,0,0,40.4046,7.3149Zm2.6526,44.0067c-2.4845-.1921-3.5284-1.424-5.4769-2.6068C36.51,54.3334,35.2008,59.7194,31.3244,62.533c-1.198-8.492,1.7563-14.87,3.1283-21.6407-2.3386-3.9367.2812-11.86,5.2138-9.9079,6.0708,2.4006-5.256,14.6378,2.3479,16.1662,7.9385,1.5958,11.1792-13.7743,6.256-18.7737-7.113-7.2179-20.7046-.164-19.0333,10.1686.4072,2.5261,3.0176,3.2929,1.0428,6.7786-4.5524-1.0082-5.91-4.5987-5.7358-9.3855.2818-7.8353,7.04-13.3215,13.8195-14.0807,8.5734-.96,16.62,3.1482,17.731,11.2125C57.3441,42.1724,52.2241,52.0293,43.0572,51.3216Z" fill="#231f20"/></svg>';
							$pageUrl = get_permalink();
							$pageUrl = urlencode($pageUrl);
						?>


						<ul class="share-buttons">

						  <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $pageUrl; ?>&quote=" target="_blank" title="Share on Facebook" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(document.URL) + '&quote=' + encodeURIComponent(document.URL)); return false;"><?php echo $svgfacebook; ?></a></li>

						  <li><a href="https://twitter.com/intent/tweet?source=<?php echo $pageUrl; ?>&text=:%20<?php echo $pageUrl; ?>&via=wolskidesign" target="_blank" title="Tweet" onclick="window.open('https://twitter.com/intent/tweet?text=' + encodeURIComponent(document.title) + ':%20'  + encodeURIComponent(document.URL)); return false;"><?php echo $svgtwitter; ?></a></li>

						  <li><a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $pageUrl; ?>&title=&summary=&source=<?php echo $pageUrl; ?>" target="_blank" title="Share on LinkedIn" onclick="window.open('http://www.linkedin.com/shareArticle?mini=true&url=' + encodeURIComponent(document.URL) + '&title=' +  encodeURIComponent(document.title)); return false;"><?php echo $svglinkedin; ?></a></li>

						  <li><a href="http://pinterest.com/pin/create/button/?url=<?php echo $pageUrl; ?>&media=<?php echo $featureImage; ?>&description=<?php echo get_the_title(); ?>" class="pin-it-button" count-layout="horizontal" target="_blanklank"><?php echo $svgpinterest; ?></a></li>

						  <li><a href="mailto:?subject=&body=:%20<?php echo $pageUrl; ?>" target="_blank" title="Send email" onclick="window.open('mailto:?subject=' + encodeURIComponent(document.title) + '&body=' +  encodeURIComponent(document.URL)); return false;"> <?php echo $svgemail; ?></a></li>
						</ul>

						</div>

					</div>
					
				</article>



			<?php endwhile; ?>
					
			<?php else: ?>
		
				<!-- article -->
				<article>
		
					<h1><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h1>
		
				</article>
				<!-- /article -->
		
			<?php endif; ?>
			
			<div class="prevnext">
				<?php 

				$prev = get_permalink(get_adjacent_post(false,'',false));
				$next = get_permalink(get_adjacent_post(false,'',true));

				$prevTitle = get_the_title(get_adjacent_post(false,'',false));
				$nextTitle = get_the_title(get_adjacent_post(false,'',true));

				$prevshort = substr($prevTitle,0,80);
				$nextshort = substr($nextTitle,0,80);

				if($prev != get_permalink()) { ?>
					<div class='prevlink'>
						<a href='<?php echo $prev; ?>'>
							<svg class="icon leftArrow">
								<use xlink:href="#icon-keyboard_arrow_right" />
							</svg>
							<span><?php echo $prevshort; ?></span>
						</a>
					</div>
				<?php }

				if($next != get_permalink()) { ?>
					<div class='nextlink'>
						<a href='<?php echo $next; ?>'>
							<span><?php echo $nextshort; ?></span>
							<svg class="icon rightArrow">
								<use xlink:href="#icon-keyboard_arrow_right" />
							</svg>
						</a>
					</div>
				<?php } ?>
			</div>

		</div>
		</section>

	</main>


<?php get_footer(); ?>
