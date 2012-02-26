<?php
/**
 * Deals with "Schedule" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's widesite, not only for this theme
 */

add_action('init', 'sudweb_register_schedule');

/**
 * Registers the "Schedule" Custom Post Type
 */
function sudweb_register_schedule()
{
	/**
	 * Registering "Schedule"
	 */
	register_post_type('schedule', array(
		'labels' => array(
			'name' => _x('Days', 'post type general name', 'sudweb'),
			'singular_name' => _x('Day', 'post type singular name', 'sudweb'),
			'add_new' => __('Add New', 'schedule'),
			'add_new_item' => __('Add New Day', 'sudweb'),
			'edit_item' => __('Edit Day', 'sudweb'),
			'new_item' => __('New Day', 'sudweb'),
			'all_items' => __('All Days', 'sudweb'),
			'view_item' => __('View Day', 'sudweb'),
			'search_items' => __('Search Days', 'sudweb'),
			'not_found' =>  __('No days found', 'sudweb'),
			'not_found_in_trash' => __('No days found in Trash', 'sudweb'),
			'parent_item_colon' => '',
			'menu_name' => __('Day', 'sudweb'),
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
