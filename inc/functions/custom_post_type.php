<?php

// Register Custom Post Type Movie
function create_movie_cpt() {

	$labels = array(
		'name' => _x( 'Movies', 'Post Type General Name', 'watcherldn' ),
		'singular_name' => _x( 'Movie', 'Post Type Singular Name', 'watcherldn' ),
		'menu_name' => _x( 'Movies', 'Admin Menu text', 'watcherldn' ),
		'name_admin_bar' => _x( 'Movie', 'Add New on Toolbar', 'watcherldn' ),
		'archives' => __( 'Movie Archives', 'watcherldn' ),
		'attributes' => __( 'Movie Attributes', 'watcherldn' ),
		'parent_item_colon' => __( 'Parent Movie:', 'watcherldn' ),
		'all_items' => __( 'All Movies', 'watcherldn' ),
		'add_new_item' => __( 'Add New Movie', 'watcherldn' ),
		'add_new' => __( 'Add New', 'watcherldn' ),
		'new_item' => __( 'New Movie', 'watcherldn' ),
		'edit_item' => __( 'Edit Movie', 'watcherldn' ),
		'update_item' => __( 'Update Movie', 'watcherldn' ),
		'view_item' => __( 'View Movie', 'watcherldn' ),
		'view_items' => __( 'View Movies', 'watcherldn' ),
		'search_items' => __( 'Search Movie', 'watcherldn' ),
		'not_found' => __( 'Not found', 'watcherldn' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'watcherldn' ),
		'featured_image' => __( 'Featured Image', 'watcherldn' ),
		'set_featured_image' => __( 'Set featured image', 'watcherldn' ),
		'remove_featured_image' => __( 'Remove featured image', 'watcherldn' ),
		'use_featured_image' => __( 'Use as featured image', 'watcherldn' ),
		'insert_into_item' => __( 'Insert into Movie', 'watcherldn' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Movie', 'watcherldn' ),
		'items_list' => __( 'Movies list', 'watcherldn' ),
		'items_list_navigation' => __( 'Movies list navigation', 'watcherldn' ),
		'filter_items_list' => __( 'Filter Movies list', 'watcherldn' ),
	);
	$args = array(
		'label' => __( 'movie', 'watcherldn' ),
		'description' => __( 'All Movies', 'watcherldn' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-admin-collapse',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'author', 'comments', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'Movie', $args );

}
add_action( 'init', 'create_movie_cpt', 0 );

// register_taxonomy("categories", array("work"), array("hierarchical" => true, "label" => "Categories", "singular_label" => "Category", "rewrite" => array( 'slug' => 'work', 'with_front'=> false )));

add_action('init', 'register_tax_category');

function register_tax_category() {
  register_taxonomy('category', array('post', 'movie', 'music'), array(
    'labels' => array(
      'name' => _x('Categories', 'Taxonomy General Name', 'category'),
      'singular_name' => _x('Category', 'Taxonomy Singular Name', 'category'),
      'menu_name' => __('Categories', 'category'),
      'all_items' => __('All Categories', 'category'),
      'parent_item' => __('Parent Category', 'category'),
      'parent_item_colon' => __('Parent Category:', 'category'),
      'new_item_name' => __('New Category', 'category'),
      'add_new_item' => __('Add New Category', 'category'),
      'edit_item' => __('Edit Category', 'category'),
      'update_item' => __('Update Category', 'category'),
      'view_item' => __('View Category', 'category'),
      'separate_items_with_commas' => __('Separate Categories with Commas', 'category'),
      'add_or_remove_items' => __('Add or Remove Categories', 'category'),
      'choose_from_most_used' => __('Choose from the Most Used Categories', 'category'),
      'popular_items' => __('Popular Categories', 'category'),
      'search_items' => __('Search Categories', 'category'),
      'not_found' => __('Not Found', 'category'),
      'no_terms' => __('No Categories', 'category'),
      'items_list' => __('Categories List', 'category'),
      'items_list_navigation' => __('Categories List Navigation', 'category')
    ),
    'hierarchical' => true,
    'public' => true,
    'show_ui' => true,
    'show_admin_column' => true,
    'show_in_nav_menus' => true,
    'show_tagcloud' => true
  ));
}


// Register Custom Post Type Music
function create_music_cpt() {

	$labels = array(
		'name' => _x( 'Music', 'Post Type General Name', 'watcherldn' ),
		'singular_name' => _x( 'Music', 'Post Type Singular Name', 'watcherldn' ),
		'menu_name' => _x( 'Music', 'Admin Menu text', 'watcherldn' ),
		'name_admin_bar' => _x( 'Music', 'Add New on Toolbar', 'watcherldn' ),
		'archives' => __( 'Music Archives', 'watcherldn' ),
		'attributes' => __( 'Music Attributes', 'watcherldn' ),
		'parent_item_colon' => __( 'Parent Music:', 'watcherldn' ),
		'all_items' => __( 'All Music', 'watcherldn' ),
		'add_new_item' => __( 'Add New Music', 'watcherldn' ),
		'add_new' => __( 'Add New', 'watcherldn' ),
		'new_item' => __( 'New Music', 'watcherldn' ),
		'edit_item' => __( 'Edit Music', 'watcherldn' ),
		'update_item' => __( 'Update Music', 'watcherldn' ),
		'view_item' => __( 'View Music', 'watcherldn' ),
		'view_items' => __( 'View Music', 'watcherldn' ),
		'search_items' => __( 'Search Music', 'watcherldn' ),
		'not_found' => __( 'Not found', 'watcherldn' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'watcherldn' ),
		'featured_image' => __( 'Featured Image', 'watcherldn' ),
		'set_featured_image' => __( 'Set featured image', 'watcherldn' ),
		'remove_featured_image' => __( 'Remove featured image', 'watcherldn' ),
		'use_featured_image' => __( 'Use as featured image', 'watcherldn' ),
		'insert_into_item' => __( 'Insert into Music', 'watcherldn' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Music', 'watcherldn' ),
		'items_list' => __( 'Music list', 'watcherldn' ),
		'items_list_navigation' => __( 'Music list navigation', 'watcherldn' ),
		'filter_items_list' => __( 'Filter Music list', 'watcherldn' ),
	);
	$args = array(
		'label' => __( 'Music', 'watcherldn' ),
		'description' => __( '', 'watcherldn' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-format-audio',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author', 'comments', 'trackbacks', 'page-attributes', 'post-formats', 'custom-fields'),
		'taxonomies' => array('genre'),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => true,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'music', $args );

}
add_action( 'init', 'create_music_cpt', 0 );


?>