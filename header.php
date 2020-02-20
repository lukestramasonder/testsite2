<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<?php echo get_field('google_analytics_code', 'option'); ?>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' : '.get_bloginfo('name'); } else { echo get_bloginfo('name').' - '.get_bloginfo( 'description' ); } ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php get_site_icon_url() ?>" rel="shortcut icon">
        
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<?php
			$metaKey = "";
			$metaDesc = "";

			global $post;

			if ( !isset( $post ) ) {

			} else {
				$metaCopy = $post->post_content;
				$metaCopy = strip_tags($metaCopy);
				$metaCopy = preg_replace('/\[.*?\]|/', '', $metaCopy);
				$metaCopy = substr($metaCopy,0,155);

		  		if(get_field('page_keywords') != "") {
		  		    $metaKey = get_field('page_keywords');
		  		} else {
		  		    $metaKey = get_the_title();
		  		}
		  		if(get_field('page_description') != "") {
		  		    $metaDesc = get_field('page_description');
		  		} else {
		  		    $metaDesc = $metaCopy;
		  		}
		  	}
	  		echo "
			<meta name='keywords' content='$metaKey'>
			<meta name='description' content='$metaDesc'>
	        ";

	        if(get_field('page_json') != "") {
		  		    echo get_field('page_json');
		  	}

		?>


		<?php wp_head(); ?>
		

	</head>
	<body <?php body_class('preload'); ?>>
		

		<?php get_template_part( "img/sprite/sprite.svg" );?>

		<?php
		   $logo = get_theme_mod( 'themeslug_logo' );
		   $svglogo = get_theme_mod( 'themeslug_logo2' );

	        if($logo != "" && $svglogo != ""){
				$link = get_bloginfo('url');
				$homeLink = "<a id='logo-container' href='$link' class='logoLink'><span class='logoWrap'><img src='$svglogo' onerror='this.src=\"$logo\"'></span></a>";
	        } elseif($logo != "" && $svglogo == ""){
				$link = get_bloginfo('url');
				$homeLink ="<a id='logo-container' href='$link' class='logoLink'><span class='logoWrap'><img src='$logo'></span></a>";
	        } else {
				$link = get_bloginfo('url');
				$siteName = get_bloginfo('name');
	           $homeLink ="<a id='logo-container' href='$link' class='homeLink'>$siteName</a>";
	        }

		?>


		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">


					<div class="navWrap ">
				    <nav class="headerNav">
								<div class="container">

									<div class="logo">
											<?php echo $homeLink; ?>
									</div>


							
					                <div class="mobileWrap">

										<?php
											$navDev = array(
												'theme_location' => 'header-menu',
												'fallback_cb' => 'wp_page_menu',
												'items_wrap' => '<ul class="mainNav" id="%1$s" class="%2$s">%3$s</ul>',
												'walker' => new WPSE_78121_Sublevel_Walker); 	
												wp_nav_menu($navDev);
										?>


										<div class="searchWrap">
											<form role="search" action="<?php echo $link; ?>" method="get" id="searchform">
												<input type="text" class="form-control searchInput" name="s" placeholder="Search"/>
												<input type="hidden" name="site_section" value="site-search" />
												<button type="submit" class="form-control searchSubmit" alt="Search">

													<svg class="icon">
													  <use xlink:href="#icon-search" />
													</svg>

												</button>
											</form>
										</div>

				                	</div>

	 									<?php if ( has_nav_menu( 'secondary' ) ) { ?>

										<?php
											$navTwo = array(
												'theme_location' => 'secondary',
												'fallback_cb' => 'wp_page_menu',
												'items_wrap' => '<ul class="mainNav secondary" id="%1$s" class="%2$s">%3$s</ul>',
												'walker' => new WPSE_78121_Sublevel_Walker); 	
												wp_nav_menu($navTwo);
										?>


										<?php } ?> 

									<div class="searchIcon">
										<a href="#" class="search-act">
												<svg class="icon searchIcon">
												  <use xlink:href="#icon-search" />
												</svg>
												<svg class="icon closeIcon">
												  <use xlink:href="#icon-close" />
												</svg>
										</a>
									</div>


									<div class="nav-activator">
										<button class="hamburger hamburger--spin" type="button">
										  <span class="hamburger-box">
											<span class="hamburger-inner"></span>
										  </span>
										</button>
									</div>

										
								</div>
				      </nav>

				    </div>

				<?php
				if(!is_front_page() && !get_field('header_visibility')){ 

					$defaultImg = get_field('header_image', 'option');
					$opacity = "opacity:".get_field('header_opacity', 'option');

					if (get_field('header_image') != ""){
						$headImg = "style='background-image: url(".get_field('header_image')."); ".$opacity.";'";
					} elseif (is_category() && get_field('header_image', 3769)) {
						$headImg = "style='background-image: url(".get_field('header_image', 3769)."); ".$opacity.";'";
					} else {
						$headImg = "style='background-image: url(".$defaultImg."); ".$opacity.";'";
					}

				?>



					<section class="pageHead section <?php if (get_field('header_image') != ''){ echo 'hasBg'; } ?> ">
						<div class="headerBg" <?php echo $headImg; ?>></div>
							<div class="container">

							<?php

							if(is_category()){
									$cat_id = get_queried_object_id();
									$cat_name = get_cat_name($cat_id);
									the_breadcrumb();
									echo "<h1>".$cat_name."</h1>";
									?>
									<p>
										<a href="<?php echo get_the_permalink(67); ?>">
								        	<svg class="icon leftArrow">
												<use xlink:href="#icon-keyboard_arrow_left" />
											</svg>
											View all Posts
										</a>
									</p>
							
							<?php
							} elseif(is_search()){

							?>

								<h1>We found <?php echo sprintf( __( '%s Results for ', 'html5blank' ), $wp_query->found_posts ); ?></h1>
								<h2><em><?php echo get_search_query(); ?></em></h2>

								<div class="container condensed">
									<p>Try your search again or <a href="<?php echo get_bloginfo('url'); ?>">return home »</a></p>
									<?php get_template_part('searchform'); ?>
								</div>
								
								
							<?php
							} elseif(is_single()){ ?>

									<p class="backLink">
										<a href="<?php echo get_the_permalink( get_option( 'page_for_posts' ) ); ?>">
								        	<svg class="icon leftArrow">
												<use xlink:href="#icon-keyboard_arrow_right" />
											</svg>
											View all Posts
										</a>
									</p>

							<?php
								$headTitle = get_the_title();
								echo "<h1>".$headTitle."</h1>";

			
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


							?>

									<p class='postedIn'>Posted: <?php echo get_the_time('M j, Y'); ?> in <?php echo $termList; ?></p>	
							<?php
							} else {

									if(get_field('header_intro') != ""){
										$headIntro = "<p class='headIntro'>".get_field('header_intro')."</p>";
									} else {
										$headIntro = "";
									}

									if(get_field('header_title_replace') != ""){
										$headTitle = get_field('header_title_replace');
									} else {
										$headTitle = get_the_title();
									}

									the_breadcrumb();
									echo "<h1>".$headTitle."</h1>".$headIntro; ?>

							<?php } ?>


						</div>
					</section>

				<?php }?>


			</header>
			<!-- /header -->
