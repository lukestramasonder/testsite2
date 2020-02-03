<?php
/**
 * Template Name: Testing
 */

get_header(); ?>



	<main role="main">


    	<section id='pageContent' class="container">				
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</section>


		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
			<h1>h1 Heading 1</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<h2>h2 Heading 2</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<h3>h3 Heading 3</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<h4>h4 Heading 4</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<h5>h5 Heading 5</h5>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<h6>h6 Heading 6</h6>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>

			<hr>

			<ul>
			    <li>Item 1</li>
			    <li>Item 2
			        <ul>
			            <li>Item 1</li>
			            <li>Item 2
			                <ul>
			                    <li>Item 1</li>
			                    <li>Item 2</li>
			                </ul>
			            </li>
			        </ul>
			    </li>
			    <li>Item 3</li>
			    <li>Item 4</li>
			</ul>

			<hr>

			<blockquote cite="#">
			    <p class="uk-margin-small-bottom">The blockquote element represents content that is quoted from another source, optionally with a citation which must be within a footer or cite element.</p>
			    <footer>Someone famous in <cite><a href="#">Source Title</a></cite></footer>
			</blockquote>

		</div>

		<hr>

		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">

				<h2>Accordian</h2>

                    <ul uk-accordion="multiple: true">
                        <li>

                            <a class="uk-accordion-title" href="#">Item 1</a>
                            <div class="uk-accordion-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>

                        </li>
                        <li>

                            <a class="uk-accordion-title" href="#">Item 2</a>
                            <div class="uk-accordion-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>

                        </li>
                        <li>

                            <a class="uk-accordion-title" href="#">Item 3</a>
                            <div class="uk-accordion-content">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>

                        </li>
                    </ul>
		</div>


		<hr>

		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
			<article class="uk-article">

			    <h1 class="uk-article-title"><a class="uk-link-reset" href="">Heading</a></h1>

			    <p class="uk-article-meta">Written by <a href="#">Super User</a> on 12 April 2012. Posted in <a href="#">Blog</a></p>

			    <p class="uk-text-lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>

			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			    <div class="uk-grid-small uk-child-width-auto" uk-grid>
			        <div>
			            <a class="uk-button uk-button-text" href="#">Read more</a>
			        </div>
			        <div>
			            <a class="uk-button uk-button-text" href="#">5 Comments</a>
			        </div>
			    </div>

			</article>
		</div>


		<hr>

		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
			<h2>Buttons</h2>

			<p uk-margin>
			    <button class="uk-button uk-button-default uk-button-small">Small button</button>
			    <button class="uk-button uk-button-primary uk-button-small">Small button</button>
			    <button class="uk-button uk-button-secondary uk-button-small">Small button</button>
			</p>

			<p uk-margin>
			    <button class="uk-button uk-button-default uk-button-large">Large button</button>
			    <button class="uk-button uk-button-primary uk-button-large">Large button</button>
			    <button class="uk-button uk-button-secondary uk-button-large">Large button</button>
			</p>
		</div>


		<hr>

		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
			<div class="uk-child-width-1-2@s uk-grid-match" uk-grid>
			    <div>
			        <div class="uk-card uk-card-hover uk-card-body">
			            <h3 class="uk-card-title">Hover</h3>
			            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			        </div>
			    </div>
			    <div>
			        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
			            <h3 class="uk-card-title">Default</h3>
			            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			        </div>
			    </div>
			    <div>
			        <div class="uk-card uk-card-primary uk-card-hover uk-card-body uk-light">
			            <h3 class="uk-card-title">Primary</h3>
			            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			        </div>
			    </div>
			    <div>
			        <div class="uk-card uk-card-secondary uk-card-hover uk-card-body uk-light">
			            <h3 class="uk-card-title">Secondary</h3>
			            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
			        </div>
			    </div>
			</div>
		</div>


		<hr>

		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
			<h2>Columned Text</h2>
			<div class="uk-column-1-2 uk-column-divider">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>

			    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
			</div>
			<hr>
			<div class="uk-column-1-2@s uk-column-1-3@m uk-column-1-4@l">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>

			    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

			    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.</p>
			</div>
		</div>



		<div class="uk-container uk-container-xsmall">
			<hr>
			<h2>Extra Small Container</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus efficitur malesuada. Praesent non sapien pellentesque, lobortis augue ac, gravida justo. Aliquam malesuada vestibulum odio ultrices finibus. Etiam dolor felis, lobortis quis diam sit amet, commodo laoreet leo. Quisque nec risus varius, finibus urna in, laoreet felis. Etiam venenatis nunc risus, nec aliquet risus vulputate sit amet. Donec rhoncus nisl et nibh congue, in ullamcorper arcu venenatis. Sed pretium laoreet scelerisque. Maecenas fringilla ullamcorper ullamcorper.</p>
			
		</div>

		<div class="uk-container uk-container-small">
			<hr>
			<h2>Small Container</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus efficitur malesuada. Praesent non sapien pellentesque, lobortis augue ac, gravida justo. Aliquam malesuada vestibulum odio ultrices finibus. Etiam dolor felis, lobortis quis diam sit amet, commodo laoreet leo. Quisque nec risus varius, finibus urna in, laoreet felis. Etiam venenatis nunc risus, nec aliquet risus vulputate sit amet. Donec rhoncus nisl et nibh congue, in ullamcorper arcu venenatis. Sed pretium laoreet scelerisque. Maecenas fringilla ullamcorper ullamcorper.</p>
			
		</div>

		<div class="uk-container uk-container-large">
			<hr>
			<h2>Large Container</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus efficitur malesuada. Praesent non sapien pellentesque, lobortis augue ac, gravida justo. Aliquam malesuada vestibulum odio ultrices finibus. Etiam dolor felis, lobortis quis diam sit amet, commodo laoreet leo. Quisque nec risus varius, finibus urna in, laoreet felis. Etiam venenatis nunc risus, nec aliquet risus vulputate sit amet. Donec rhoncus nisl et nibh congue, in ullamcorper arcu venenatis. Sed pretium laoreet scelerisque. Maecenas fringilla ullamcorper ullamcorper.</p>
			
		</div>

		<div class="uk-container uk-container-expand">
			<hr>
			<h2>Expanded Container</h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus efficitur malesuada. Praesent non sapien pellentesque, lobortis augue ac, gravida justo. Aliquam malesuada vestibulum odio ultrices finibus. Etiam dolor felis, lobortis quis diam sit amet, commodo laoreet leo. Quisque nec risus varius, finibus urna in, laoreet felis. Etiam venenatis nunc risus, nec aliquet risus vulputate sit amet. Donec rhoncus nisl et nibh congue, in ullamcorper arcu venenatis. Sed pretium laoreet scelerisque. Maecenas fringilla ullamcorper ullamcorper.</p>
			
		</div>


		<hr>

		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">

		</div>


		<div class="container uk-margin-xlarge-top">
			<h2>video background</h2>
		</div>

		<div class="uk-cover-container" uk-height-viewport="min-height: 300">
		    <video src="https://yootheme.com/site/images/media/yootheme-pro.mp4" autoplay loop muted playsinline uk-cover></video>
		</div>


		<hr>


		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
			<div uk-filter="target: .js-filter">

			    <ul class="uk-subnav uk-subnav-pill">
			        <li class="uk-active" uk-filter-control><a href="#">All</a></li>
			        <li uk-filter-control="[data-color='white']"><a href="#">White</a></li>
			        <li uk-filter-control="[data-color='blue']"><a href="#">Blue</a></li>
			        <li uk-filter-control="[data-color='black']"><a href="#">Black</a></li>
			    </ul>

			    <ul class="js-filter uk-child-width-1-2 uk-child-width-1-3@m uk-text-center" uk-grid>
			        <li data-color="white">
			            <div class="uk-card uk-card-default uk-card-body">Item</div>
			        </li>
			        <li data-color="blue">
			            <div class="uk-card uk-card-primary uk-card-body">Item</div>
			        </li>
			        <li data-color="white">
			            <div class="uk-card uk-card-default uk-card-body">Item</div>
			        </li>
			        <li data-color="white">
			            <div class="uk-card uk-card-default uk-card-body">Item</div>
			        </li>
			        <li data-color="black">
			            <div class="uk-card uk-card-secondary uk-card-body">Item</div>
			        </li>
			        <li data-color="black">
			            <div class="uk-card uk-card-secondary uk-card-body">Item</div>
			        </li>
			        <li data-color="blue">
			            <div class="uk-card uk-card-primary uk-card-body">Item</div>
			        </li>
			        <li data-color="black">
			            <div class="uk-card uk-card-secondary uk-card-body">Item</div>
			        </li>
			        <li data-color="blue">
			            <div class="uk-card uk-card-primary uk-card-body">Item</div>
			        </li>
			        <li data-color="white">
			            <div class="uk-card uk-card-default uk-card-body">Item</div>
			        </li>
			        <li data-color="blue">
			            <div class="uk-card uk-card-primary uk-card-body">Item</div>
			        </li>
			        <li data-color="black">
			            <div class="uk-card uk-card-secondary uk-card-body">Item</div>
			        </li>
			    </ul>

			</div>
		</div>



		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">


			<form>

				<div class="uk-grid-small" uk-grid>
				    <div class="uk-width-1-1">
				        <input class="uk-input" type="text" placeholder="100">
				    </div>
				    <div class="uk-width-1-2@s">
				        <input class="uk-input" type="text" placeholder="50">
				    </div>
				    <div class="uk-width-1-4@s">
				        <input class="uk-input" type="text" placeholder="25">
				    </div>
				    <div class="uk-width-1-4@s">
				        <input class="uk-input" type="text" placeholder="25">
				    </div>
				    <div class="uk-width-1-2@s">
				        <input class="uk-input" type="text" placeholder="50">
				    </div>
				    <div class="uk-width-1-2@s">
				        <input class="uk-input" type="text" placeholder="50">
				    </div>

				</div>

			        <div class="uk-margin">
			            <input class="uk-input" type="text" placeholder="Input">
			        </div>

			        <div class="uk-margin">
			            <select class="uk-select">
			                <option>Option 01</option>
			                <option>Option 02</option>
			            </select>
			        </div>

			        <div class="uk-margin">
			            <textarea class="uk-textarea" rows="5" placeholder="Textarea"></textarea>
			        </div>

			        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
			            <label><input class="uk-radio" type="radio" name="radio2" checked> A</label>
			            <label><input class="uk-radio" type="radio" name="radio2"> B</label>
			        </div>

			        <div class="uk-margin uk-grid-small uk-child-width-auto uk-grid">
			            <label><input class="uk-checkbox" type="checkbox" checked> A</label>
			            <label><input class="uk-checkbox" type="checkbox"> B</label>
			        </div>

			        <div class="uk-margin">
			            <input class="uk-range" type="range" value="2" min="0" max="10" step="0.1">
			        </div>

				    <div class="uk-margin">
				        <div uk-form-custom>
				            <input type="file">
				            <button class="uk-button uk-button-default" type="button" tabindex="-1">Select</button>
				        </div>
				    </div>

				    <div class="uk-margin">
				        <span class="uk-text-middle">Here is a text</span>
				        <div uk-form-custom>
				            <input type="file">
				            <span class="uk-link">upload</span>
				        </div>
				    </div>

				    <div class="uk-margin" uk-margin>
				        <div uk-form-custom="target: true">
				            <input type="file">
				            <input class="uk-input uk-form-width-medium" type="text" placeholder="Select file" disabled>
				        </div>
				        <button class="uk-button uk-button-default">Submit</button>
				    </div>


			</form>
		</div>

		<hr>


		<div class="container uk-margin-xlarge-top uk-margin-xlarge-bottom">
		<div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
		    <div>
		        <a class="uk-inline" href="images/photo.jpg" data-caption="Caption 1">
		            <img src="images/photo.jpg" alt="">
		        </a>
		    </div>
		    <div>
		        <a class="uk-inline" href="images/dark.jpg" data-caption="Caption 2">
		            <img src="images/dark.jpg" alt="">
		        </a>
		    </div>
		    <div>
		        <a class="uk-inline" href="images/light.jpg" data-caption="Caption 3">
		            <img src="images/light.jpg" alt="">
		        </a>
		    </div>
		</div>
		</div>



	</main>
<?php get_footer(); ?>


