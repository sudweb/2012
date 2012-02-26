<?php
/**
 * Deals with "Talk" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's widesite, not only for this theme
 */

add_action('init', 'sudweb_register_talk');
add_action('init', 'sudweb_register_talk_connections');

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
			'add_new' => __('Add New', 'talk'),
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
			'post_tag'
		),
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt',
		),
	));

	/**
	 * Filtering output
	 */
	add_filter('get_the_terms', 'talk_filter_types', 10, 3);
}

/**
 * For Talk Types, we only return the first item
 * This is because we can (now) only have one type per talk
 * Theming is made easier as we don't rely on an array of one element but directly onto the object
 *
 * @param $terms array
 * @param $id integer
 * @param $taxonomy string
 * @return array|strObject
 */
function talk_filter_types($terms, $id, $taxonomy)
{
	return $taxonomy !== 'talk_types' ? $terms : array_pop($terms);
}

function sudweb_register_talk_connections()
{
	if (!function_exists('p2p_register_connection_type'))
	{
		return false;
	}

	p2p_register_connection_type(array(
		'name' => 'talk_to_speaker',
		'from' => 'talk',
		'to' => 'speaker',
		'cardinality' => 'one-to-many',
	));

	p2p_register_connection_type(array(
		'name' => 'talk_to_schedule',
		'from' => 'talk',
		'to' => 'schedule',
		'cardinality' => 'one-to-one',
	));
}
