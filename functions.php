
<?php


function watcherldn_theme_setup()
{

    // Adding theme support

    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');
    add_post_type_support('page', 'excerpt');
    add_post_type_support('post', 'excerpt');



    // Register menus
    register_nav_menus(array(
        'headerMenu'   => __('Primary Menu', 'thriveldn'),
    ));
}
add_action('after_setup_theme', 'watcherldn_theme_setup');

function watcherldn_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('all-css', get_template_directory_uri() . '/assets/css/all.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js');
    wp_enqueue_script('jquery');
    wp_register_script('loadmore_script', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array('jquery'));
    wp_localize_script('loadmore_script', 'loadmore_params', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
    ));
    wp_enqueue_script('loadmore_script');
}
add_action('wp_enqueue_scripts', 'watcherldn_theme_scripts');


get_template_part('/inc/functions/custom_post_type');


?>