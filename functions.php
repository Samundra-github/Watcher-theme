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
        'footerMenu'   => __('Secondary Menu', 'thriveldn'),
    ));
}
add_action('after_setup_theme', 'watcherldn_theme_setup');

function watcherldn_theme_scripts()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('main-css', get_template_directory_uri() . '/assets/sass/main.css');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js');
    wp_register_script('loadmore_script', get_stylesheet_directory_uri() . '/assets/js/ajax.js', array('jquery'));
    wp_localize_script( 'loadmore_script', 'loadmore_params', array(
		'ajaxurl' => admin_url('admin-ajax.php'),
	) );
    wp_enqueue_script('loadmore_script');
}
add_action('wp_enqueue_scripts', 'watcherldn_theme_scripts');


get_template_part('/inc/functions/custom_post_type');


// Register Option page 
if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}

get_template_part('/inc/functions/load-movies');
get_template_part('/inc/functions/load-music');



// Redirecting to custom Login Page

function redirect_to_login_page()
{
    wp_redirect(site_url() . "/login");
    exit();
}
add_action("wp_logout", "redirect_to_login_page");


// add_action('admin_init', 'redirect_dashboard');  
// function redirect_dashboard() {  
// if (!current_user_can('administrator') && is_admin() && !wp_doing_ajax()) {  
//     wp_redirect(site_url(). "/wp-admin/index.php");  
//     exit;  
//     }
// }

// function redirect_wp_admin()
// {
//     global $pagenow;
//     if ($pagenow == 'wp-login.php' && $_GET['action'] != "logout") {
//         wp_redirect(home_url() . "/login");
//         exit();
//     }
// }
// add_action("init", "redirect_wp_admin");
