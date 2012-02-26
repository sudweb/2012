<?php
/**
 * Deals with "Place" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's widesite, not only for this theme
 */

add_action('init', 'sudweb_register_place');

/**
 * Registers the "Place" Custom Post Type
 */
function sudweb_register_place()
{
	/**
	 * Registering "Place"
	 */
	register_post_type('place', array(
		'labels' => array(
			'name' => _x('Places', 'post type general name', 'sudweb'),
			'singular_name' => _x('Place', 'post type singular name', 'sudweb'),
			'add_new' => __('Add New', 'place'),
			'add_new_item' => __('Add New Place', 'sudweb'),
			'edit_item' => __('Edit Place', 'sudweb'),
			'new_item' => __('New Place', 'sudweb'),
			'all_items' => __('All Places', 'sudweb'),
			'view_item' => __('View Place', 'sudweb'),
			'search_items' => __('Search Places', 'sudweb'),
			'not_found' =>  __('No places found', 'sudweb'),
			'not_found_in_trash' => __('No places found in Trash', 'sudweb'),
			'parent_item_colon' => '',
			'menu_name' => __('Place', 'sudweb'),
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'page',
		'has_archive' => false,
		'hierarchical' => false,
		'menu_position' => 5, //Below posts
		'supports' => array(
			'title',
			'editor',
		),
	));
}
