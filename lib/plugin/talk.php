<?php
/**
 * Deals with "Talk" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's widesite, not only for this theme
 */

add_action('init', 'sudweb_register_talk');

/**
 * Registers the "Talk" Custom Post Type
 * Registers the "Talk Types" Custom Taxonomy
 */
function sudweb_register_talk()
{
	/**
	 * Registering "Talk Types"
	 */
	register_taxonomy('talk_types', array('talk'), array(
		'hierarchical' => true,   //despite it's hierarchical, we expect a flat structure
		'show_ui' => true,
		'query_var' => true,
		'labels' => array(
			'name' => _x('Talk Types', 'taxonomy general name', 'sudweb'),
			'singular_name' => _x('Talk Type', 'taxonomy singular name', 'sudweb'),
			'search_items' =>  __('Search Talk Types', 'sudweb'),
			'all_items' => __('All Talk Types', 'sudweb'),
			'edit_item' => __('Edit Talk Type', 'sudweb'),
			'update_item' => __('Update Talk Type', 'sudweb'),
			'add_new_item' => __('Add New Talk Type', 'sudweb'),
			'new_item_name' => __('New Talk Type Name', 'sudweb'),
			'menu_name' => __('Talk Type', 'sudweb'),
		),
	));

	/**
	 * Registering "Talk"
	 */
	register_post_type('talk', array(
		'labels' => array(
			'name' => _x('Talks', 'post type general name', 'sudweb'),
			'singular_name' => _x('Talk', 'post type singular name', 'sudweb'),
			'add_new' => _x('Add New', 'talk'),
			'add_new_item' => __('Add New Talk', 'sudweb'),
			'edit_item' => __('Edit Talk', 'sudweb'),
			'new_item' => __('New Talk', 'sudweb'),
			'all_items' => __('All Talks', 'sudweb'),
			'view_item' => __('View Talk', 'sudweb'),
			'search_items' => __('Search Talks', 'sudweb'),
			'not_found' =>  __('No talks found', 'sudweb'),
			'not_found_in_trash' => __('No talks found in Trash', 'sudweb'),
			'parent_item_colon' => '',
			'menu_name' => __('Talk', 'sudweb'),
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => false,
		'hierarchical' => true,
		'menu_position' => 5, //Below posts
		'taxonomies' => array(
			'talk_types',
		),
		'supports' => array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			//'comments',
		),
	));
}
