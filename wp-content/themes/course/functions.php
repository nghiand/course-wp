<?php

if (!isset($content_width)){
	$content_width = 660;
}

if (!function_exists('course_setup')){
    function course_setup(){
        // menu
        register_nav_menus(array(
            'primary-menu' => __('Primary Menu', 'course'),    
        ));

        add_theme_support('post-thumbnails');

        register_sidebar(array(
            'name' => __('Widget Area', 'course'),
            'id' => 'main-sidebar',
            'description' => __('Add widgets here to appear in your sidebar', 'course'),
        ));
    }
}
add_action('init', 'course_setup');

function course_javascript_detection(){
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action('wp_head', 'course_javascript_detection', 0);

if (!function_exists('course_scripts')){
    function course_scripts(){
        wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
        wp_enqueue_style('font-awesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
        wp_enqueue_style('course-style-css', get_stylesheet_uri());
        wp_enqueue_script('jquery-js', get_template_directory_uri() . '/js/jquery.min.js', array(), '3.1.1', true);
        wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true);
    }
}
add_action('wp_enqueue_scripts', 'course_scripts');

if (!function_exists('course_menu')){
    function course_menu($slug) {
        $menu = array(
            'theme_location' => $slug,
            'container' => '',
            'menu_class' => 'nav navbar-nav navbar-right main-nav',
            'menu_id' => 'top-menu',
            'container_class' => $slug,
        );
        wp_nav_menu($menu);
    }
}

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length($length){
    return 20;
}
add_filter('excerpt_length', 'wpdocs_custom_excerpt_length', 999);


function remove_width_attribute($html) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
add_filter('post_thumbnail_html', 'remove_width_attribute', 10);

p2p_register_connection_type(array(
    'name' => 'member',
    'from' => 'course',
    'to' => 'user'
));

p2p_register_connection_type(array(
    'name' => 'next',
    'from' => 'lesson',
    'to' => 'lesson',
    'cardinality' => 'one-to-one',
    'title' => 'Next'
));

p2p_register_connection_type(array(
    'name' => 'previous',
    'from' => 'lesson',
    'to' => 'lesson',
    'cardinality' => 'one-to-one',
    'title' => 'Previous'
));