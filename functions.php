<?php
/*
 *  Author: Todd Motto | @toddmotto
 *  URL: html5blank.com | @html5blank
 *  Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('xlarge', 1500, '', true); 
    add_image_size('large', 1024, '', true); 
    add_image_size('medium', 768, '', true); 
    add_image_size('small', 576, '', true); 
    add_image_size('tiny', 100, '', true); 
    add_image_size('postcard', 768, 420, true); 
    add_image_size('square', 768, 768, true); 
    add_image_size('squarelg', 1100, 1100, true); 
    add_image_size('slider', 1700, 980, true); 


    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

        wp_scripts()->add_data( 'jquery', 'group', 1 );
        wp_scripts()->add_data( 'jquery-core', 'group', 1 );
        wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts-min.js', array('jquery'), '1.0.0', true); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{


    if ( is_page_template('page-news.php') || is_category() ) {
        wp_register_script('newsScripts', get_template_directory_uri() . '/js/news-min.js', array('jquery'), '1.0.0', true); // Conditional script(s)
        wp_enqueue_script('newsScripts');
    }

    if (is_page('contact')) {

    }


}


// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Noto+Serif:700|Poppins:400,700&display=swap', array(), '1.0', 'all');
    wp_enqueue_style('googleFonts'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'secondary' => __('Secondary', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Sidebar', 'html5blank'),
        'description' => __('Search & Archive Sidebar.', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Footer 1', 'html5blank'),
        'description' => __('Footer 1', 'html5blank'),
        'id' => 'footer-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Footer 2', 'html5blank'),
        'description' => __('Footer 2', 'html5blank'),
        'id' => 'footer-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer 3', 'html5blank'),
        'description' => __('Footer 3', 'html5blank'),
        'id' => 'footer-area-3',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    register_sidebar(array(
        'name' => __('Footer 4', 'html5blank'),
        'description' => __('Footer 4', 'html5blank'),
        'id' => 'footer-area-4',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));


}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
// function remove_admin_bar()
// {
//     return false;
// }

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
//add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
// add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

add_shortcode('latestnews', 'latestnews'); // Place [tweet] in Pages, Posts now.


// Shortcode Demo with Nested Capability
function latestnews($atts, $content = null) {
    ob_start();
    get_template_part( 'latestnews' );
    return ob_get_clean();
}


add_shortcode('gallery', 'gallery'); // Place [tweet] in Pages, Posts now.


// Shortcode Demo with Nested Capability
function gallery($atts, $content = null) {
    ob_start();
    get_template_part( 'gallery' );
    return ob_get_clean();
}



/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
// function create_post_type_html5()
// {
//     register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
//     register_taxonomy_for_object_type('post_tag', 'html5-blank');
//     register_post_type('html5-blank', // Register Custom Post Type
//         array(
//         'labels' => array(
//             'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
//             'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
//             'add_new' => __('Add New', 'html5blank'),
//             'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
//             'edit' => __('Edit', 'html5blank'),
//             'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
//             'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
//             'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
//             'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
//             'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
//             'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
//         ),
//         'public' => true,
//         'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
//         'has_archive' => true,
//         'supports' => array(
//             'title',
//             'editor',
//             'excerpt',
//             'thumbnail'
//         ), // Go to Dashboard Custom HTML5 Blank post for supports
//         'can_export' => true, // Allows export in Tools > Export
//         'taxonomies' => array(
//             'post_tag',
//             'category'
//         ) // Add Category and Post Tags support
//     ));
// }

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}







/*------------------------------------*\
    Tiny MCE Adjustments
\*------------------------------------*/

function my_mce_before_init_insert_formats( $init_array ) {  
   // Define the style_formats array
$style_formats = array(  
       // Each array child is a format with it's own settings
       array(  
           'title' => 'Button',  
           'selector' => 'a',
           'classes' => 'button',
       ),
       array(  
           'title' => 'Color 1 Button',  
           'selector' => 'a.button',
           'classes' => 'is-primary',
       ),
       array(  
           'title' => 'Color 2 Button',  
           'selector' => 'a.button',
           'classes' => 'is-secondary',
       ),
       array(  
           'title' => 'Invert Button',  
           'selector' => 'a.button',
           'classes' => 'inverted',
       ),
       array(  
           'title' => 'Fullwidth Button',  
           'selector' => 'a.button',
           'classes' => 'button fullwidth',
       ),
       array(  
           'title' => 'Arrow Link',  
           'selector' => 'a',
           'classes' => 'arw',
       ),
       array(  
           'title' => 'Download',  
           'selector' => 'a',
           'classes' => 'download',
       ),
       array(  
           'title' => 'Lead Text',  
           'selector' => 'p',
           'classes' => 'lead',
       )
       
   );  
   // Insert the array, JSON ENCODED, into 'style_formats'
   $init_array['style_formats'] = json_encode( $style_formats );  
   
   return $init_array;  

}
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


function my_mce_buttons_2( $buttons ) {
   array_unshift( $buttons, 'styleselect' );
   return $buttons;
}
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );




/*------------------------------------*\
    Walker_Nav_Menu
\*------------------------------------*/


class WPSE_78121_Sublevel_Walker extends Walker_Nav_Menu
{
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<div class='sub-toggle'><svg version='1.1' xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'><path d='M7.406 8.578l4.594 4.594 4.594-4.594 1.406 1.406-6 6-6-6z'></path></svg></div><div class='sub-menu-wrap'><ul class='sub-menu'>\n";
    }
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul></div>\n";
    }
    function start_el(&$output, $item, $depth=0, $args=array(), $id = 0) {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;
        $output .= "<li class='" .  implode(" ", $item->classes) . "'>";
        
      //Add SPAN if no Permalink
      if( $permalink && $permalink != '#' ) {
        $output .= '<a href="' . $permalink . '">';
      } else {
        $output .= '<span>';
      }
    



      $output .= $title;

    if(in_array('menu-item-has-children', $item->classes)){
        $output .= '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path d="M7.406 8.578l4.594 4.594 4.594-4.594 1.406 1.406-6 6-6-6z"></path></svg>';
    }

      if( $description != '' && $depth == 0 ) {
        $output .= '<small class="description">' . $description . '</small>';
      }
      if( $permalink && $permalink != '#' ) {
        $output .= '</a>';
      } else {
        $output .= '</span>';
      }

    }
    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        $output .= "\n";
    }

}




/*------------------------------------*\
    Customizer
\*------------------------------------*/


class MyTheme_Customize {
   /**
    * This hooks into 'customize_register' (available as of WP 3.4) and allows
    * you to add new sections and controls to the Theme Customize screen.
    * 
    * Note: To enable instant preview, we have to actually write a bit of custom
    * javascript. See live_preview() for more.
    *  
    * @see add_action('customize_register',$func)
    * @param \WP_Customize_Manager $wp_customize
    * @link http://ottopress.com/2012/how-to-leverage-the-theme-customizer-in-your-own-themes/
    * @since MyTheme 1.0
    */

   public static function register ( $wp_customize ) {
    
    $theme_name = get_current_theme();
        
    //1. Define a new section (if desired) to the Theme Customizer
    $wp_customize->add_section( 'themeslug_logo_section' , array(
            'title'       => __( 'Logo', $theme_name ),
            'priority'    => 30,
            'description' => 'Upload a logo to replace the default site name and description in the header',
    ) );


    //2. Register new settings to the WP database...     
    $wp_customize->add_setting( 'themeslug_logo' );
    $wp_customize->add_setting( 'themeslug_logo2' );



            

     //3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
            'label'    => __( 'PNG Logo', $theme_name ),
            'section'  => 'themeslug_logo_section',
            'settings' => 'themeslug_logo',
        ) ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo2', array(
            'label'    => __( 'SVG Logo', $theme_name ),
            'section'  => 'themeslug_logo_section',
            'settings' => 'themeslug_logo2',
        ) ) );
    

     
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

   }
    
}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'MyTheme_Customize' , 'register' ) );

/*------------------------------------*\
    Security
\*------------------------------------*/

function remove_wp_version() {
     return '';
}
add_filter('the_generator', 'remove_wp_version');

define('DISALLOW_FILE_EDIT', true);

function failed_login() {
     return 'The login information you have entered is incorrect.';
}
add_filter('login_errors', 'failed_login');
function css_to_var($modArr){
        global $mod;
        foreach($modArr as $mods){
            $modCol = get_theme_mod($mods);
            $mod[] = $modCol;
        }
        //$mod = get_theme_mod($mod_name);
        //echo 'the_mod'.$mod;
        return $mod;    
}




/*------------------------------------*\
    ALLOW SVG UPLOAD
\*------------------------------------*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');




/*------------------------------------*\
    Login Screen
\*------------------------------------*/

add_action("login_head", "my_login_head");
function my_login_head() {
    if(get_theme_mod('themeslug_logo')!=''){
    $logo = get_theme_mod('themeslug_logo');
    echo "
    <style>
    body.login #login h1 a {
        background: url('$logo') no-repeat scroll center top transparent;
        height: 90px;
        width:100%;
        background-size:contain;
    }
    
    </style>
    ";
    }
}

function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );


function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/styles/style-login.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/styles/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );



/*------------------------------------*\
    Facebook OpenGraph Tags
\*------------------------------------*/

function fb_opengraph() {
    global $post;

    if ( isset( $post ) ) {
        
        if(get_field('share_image') != "") {
            $img_src = get_field('share_image');
        } else if(has_post_thumbnail($post->ID)) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id( $post->ID ), 'medium');
            $img_src = $img_src[0]; 
        } else if(get_field('default_social_share_image', 'option') != "") {
            $img_src = get_field('default_social_share_image', 'option');    
        } else {
            $img_src = "";
        }

        if($excerpt = $post->post_excerpt) {
            $excerpt = strip_tags($post->post_excerpt);
            $excerpt = str_replace("", "'", $excerpt);
        } else {
            $excerpt = get_bloginfo('description');
        }


        if(get_field('twitter_handle', 'option') != ''){ ?>

        <meta name="twitter:card" content="<?php echo $excerpt; ?>" />
        <meta name="twitter:creator" content="@<?php echo get_field('twitter_handle', 'option'); ?>" />
        <meta content='<?php echo $img_src; ?>' name='twitter:image:src'/>

        <?php }    

    ?>

    <meta property="og:title" content="<?php echo the_title(); ?>"/>
    <meta property="og:description" content="<?php echo $excerpt; ?>"/>
    <meta property="og:type" content="article"/>
    <meta property="og:url" content="<?php echo the_permalink(); ?>"/>
    <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>"/>
    <meta property="og:image" content="<?php echo $img_src; ?>"/>

 
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);


/*------------------------------------*\
    BREADCRUMBs
\*------------------------------------*/

 function the_breadcrumb() {
    global $post;
    echo '<nav class="breadcrumb is-small" aria-label="breadcrumbs"><ul>';
    echo '<li><a href="'.get_site_url().'">Home</a></li>';
    if (!is_home()) {

        if (is_category() || is_single()) {

            echo '<li><a href="'.get_the_permalink(3769).'" title="'.get_the_title(3769).'">'.get_the_title(3769).'</a></li>';

            
            if (is_single()) {
                echo '<li>';
                the_category(' </li><li> ');
                echo '</li>';
            }


        } elseif (is_page()) {
            $title = get_the_title($post->ID);
            if($post->post_parent){
                $anc = get_post_ancestors( $post->ID );
                
                foreach ( array_reverse($anc) as $ancestor ) {
                    $output = '<li><a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a></li>';
                    echo $output;

                }

            } else {

            }

            if(get_field('header_intro', $post->ID) != ""){
                echo ' <li class="is-active"><a href="#" aria-current="page">'.$title.'</a></li>';
            }
        }
    }
    echo '</ul></nav>';
}



/*------------------------------------*\
    SOCIAL SETTINGS
\*------------------------------------*/

function social_func( $atts ) {

$socialGroup = get_field('social_links', 'option');    
if( $socialGroup ):

        $facebook_url = $socialGroup['facebook'];
        $twitter_url = $socialGroup['twitter'];
        $linkedin_url = $socialGroup['linkedin'];
        $pinterest_url = $socialGroup['pinterest'];
        $instagram_url = $socialGroup['instagram'];
        $youtube_url = $socialGroup['youtube'];
        $google_url = $socialGroup['google'];
        $email_url = $socialGroup['email'];

endif;



        $facebookLink = "";
        $twitterLink = "";
        $linkedinLink = "";
        $intagramLink = "";
        $youtubeLink = "";
        $googleLink = "";
        $emailLink = "";

        $svgfacebook = "<svg class='icon closeIcon'><use xlink:href='#icon-facebook' /></svg>";
        $svglinkedin = "<svg class='icon closeIcon'><use xlink:href='#icon-linkedin2' /></svg>";
        $svgtwitter = "<svg class='icon closeIcon'><use xlink:href='#icon-twitter' /></svg>";
        $svginstagram = "<svg class='icon closeIcon'><use xlink:href='#icon-instagram' /></svg>";
        $svgyoutube = "<svg class='icon closeIcon'><use xlink:href='#icon-youtube' /></svg>";
        $svggoogle = "<svg class='icon closeIcon'><use xlink:href='#icon-google' /></svg>";
        $svgpinterest = "<svg class='icon closeIcon'><use xlink:href='#icon-pinterest2' /></svg>";
        $svgemail = "<svg class='icon closeIcon'><use xlink:href='#icon-envelope-o' /></svg>";


        if($facebook_url != ''){ $facebookLink = "<a href='$facebook_url'>".$svgfacebook."</a> ";}
        if($twitter_url != ''){ $twitterLink = "<a href='$twitter_url'>".$svgtwitter."</a> ";}
        if($pinterest_url != ''){ $pinterestLink = "<a href='$pinterest_url'>".$svgpinterest."</a> ";}
        if($linkedin_url != ''){ $linkedinLink = "<a href='$linkedin_url'>".$svglinkedin."</a> ";}
        if($instagram_url != ''){ $intagramLink = "<a href='$instagram_url'>".$svginstagram."</a> ";}
        if($youtube_url != ''){ $youtubeLink = "<a href='$youtube_url'>".$svgyoutube."</a> ";}
        if($google_url != ''){  $googleLink = "<a href='$google_url'>".$svggoogle."</a>";}
        if($email_url != ''){  $emailLink = "<a href='mailto:$email_url'>".$svgemail."</a>";}

        return "<div class='socialIcons'>$intagramLink $facebookLink $twitterLink $pinterestLink $linkedinLink $youtubeLink $googleLink $emailLink</div>";
    
}

add_shortcode( 'social', 'social_func' );




function phone_number_format($number) {
  // Allow only Digits, remove all other characters.
  $number = preg_replace("/[^\d]/","",$number);
 
  // get number length.
  $length = strlen($number);
 
 // if number = 10
 if($length == 10) {
  $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
 }
  
  return $number;
 
}



/*------------------------------------*\
    Page Exerpts
\*------------------------------------*/
add_post_type_support( 'page', 'excerpt' );


/*------------------------------------*\
    Fancy Numbered Pagination
\*------------------------------------*/

function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span class='pageGuide'>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'><span class='ion-ios-arrow-left'></span></a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'><span class='ion-ios-arrow-left'></span><span class='ion-ios-arrow-left'></span></a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\"><span class='ion-ios-arrow-right'></span></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'><span class='ion-ios-arrow-right'></span><span class='ion-ios-arrow-right'></span></a>";
         echo "</div>\n";
     }

}

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyCCKNCA2-iTjjTirczn7YekOfbNolIUWBY');
}
add_action('acf/init', 'my_acf_init');



add_action( 'wp_enqueue_scripts', 'google_map_script' ); // Firing the JS and API

function google_map_script() {
    wp_enqueue_script( 'google-map', get_stylesheet_directory_uri() . '/js/locations-min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'google-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCCKNCA2-iTjjTirczn7YekOfbNolIUWBY', null, null, true); // Add in your key
}




add_shortcode( 'locations', 'locations' ); // Create shortcode [themeprefix_multiple_marker]
// Output all dealers via a custom loop of the Dealer CPT and show the title and address field in the marker and link that to the Dealer CPT
function locations() {
        ob_start();

            ?>
                <script>
                    var mapStyleGlobal = <?php echo get_field('map_style_code', 'option'); ?>;
                    var markerImgGlobal = "<?php echo get_field('map_style_pin', 'option'); ?>";
                </script>
            <?php

                $args = array(
                    'post_type'      => 'locations',
                    'posts_per_page' => -1,
                );

                $the_query = new WP_Query($args);

                echo "<div class='map-container'><div class='wrap'><div class='acf-map'>";

                while ( $the_query->have_posts() ) : $the_query->the_post();

                $location = get_field('location');
                $title = get_the_title(); // Get the title

                if( !empty($location) ) {
                ?>
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" style="opacity: 0; height: 0px;">
                                <h4><?php the_title(); ?></h4>
                                <p class="address"><?php echo $location['address']; ?></p>
                                <div class="theContent">
                                    <?php echo get_the_content(); ?>
                                </div>
                                <p class="directionLink"><a class="directions" href="https://www.google.com/maps?saddr=My+Location&daddr=<?php echo $location['lat'] . ',' . $location['lng']; ?>" target="_blank"><?php _e('Get Directions','roots'); ?></a></p>
                    </div>
            <?php
                }
                endwhile;
                echo '</div></div></div>';
                wp_reset_postdata();
  return ob_get_clean();
}



/*------------------------------------*\
    Remove Emoji
\*------------------------------------*/
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');




/*------------------------------------*\
    Editor Stylesheets
\*------------------------------------*/

add_editor_style( 'styles/editor.css' );




/*------------------------------------*\
    ACF OPTIONS PAGE
\*------------------------------------*/

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page();
    
}



?>
