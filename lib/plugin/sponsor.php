<?php
/**
 * Deals with "Sponsor" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's widesite, not only for this theme
 */

add_action('init', 'sudweb_register_sponsor');

/**
 * Registers the "Sponsor" Custom Post Type
 * Registers the "Sponsor Types" Custom Taxonomy
 */
function sudweb_register_sponsor()
{
	/**
	 * Registering "Sponsor Types"
	 */
	register_taxonomy('sponsor_types', array('sponsor'), array(
		'hierarchical' => true,   //despite it's hierarchical, we expect a flat structure
		'show_ui' => true,
		'query_var' => true,
		'labels' => array(
			'name' => _x('Sponsor Types', 'taxonomy general name', 'sudweb'),
			'singular_name' => _x('Sponsor Type', 'taxonomy singular name', 'sudweb'),
			'search_items' =>  __('Search Sponsor Types', 'sudweb'),
			'all_items' => __('All Sponsor Types', 'sudweb'),
			'edit_item' => __('Edit Sponsor Type', 'sudweb'),
			'update_item' => __('Update Sponsor Type', 'sudweb'),
			'add_new_item' => __('Add New Sponsor Type', 'sudweb'),
			'new_item_name' => __('New Sponsor Type Name', 'sudweb'),
			'menu_name' => __('Sponsor Type', 'sudweb'),
		),
	));

	/**
	 * Registering "Sponsor"
	 */
	register_post_type('sponsor', array(
		'labels' => array(
			'name' => _x('Sponsors', 'post type general name', 'sudweb'),
			'singular_name' => _x('Sponsor', 'post type singular name', 'sudweb'),
			'add_new' => _x('Add New', 'sponsor'),
			'add_new_item' => __('Add New Sponsor', 'sudweb'),
			'edit_item' => __('Edit Sponsor', 'sudweb'),
			'new_item' => __('New Sponsor', 'sudweb'),
			'all_items' => __('All Sponsors', 'sudweb'),
			'view_item' => __('View Sponsor', 'sudweb'),
			'search_items' => __('Search Sponsors', 'sudweb'),
			'not_found' =>  __('No sponsors found', 'sudweb'),
			'not_found_in_trash' => __('No sponsors found in Trash', 'sudweb'),
			'parent_item_colon' => '',
			'menu_name' => __('Sponsor', 'sudweb'),
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
			'sponsor_types',
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
