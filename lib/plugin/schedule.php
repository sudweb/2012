<?php
/**
 * Deals with "Schedule" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's widesite, not only for this theme
 */

add_action('init', 'sudweb_register_schedule');
add_action('init', 'sudweb_register_schedule_connections');

if (!is_admin())
{
	add_filter('p2p_connected_args', 'sudweb_schedule_alter_query', 10, 3);
}

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
			'thumbnail',
			'page-attributes',
			'excerpt',
		),
	));
}

function sudweb_register_schedule_connections()
{
	if (!function_exists('p2p_register_connection_type'))
	{
		return false;
	}

	p2p_register_connection_type(array(
		'name' => 'schedule_to_place',
		'from' => 'schedule',
		'to' => 'place',
		'cardinality' => 'many-to-one',
	));
}

/**
 * Automatically sorts talks by schedule if queried through relationships
 * @param $args
 * @param $p2p
 * @param $connected_items
 * @return array
 */
function sudweb_schedule_alter_query($args, $p2p, $connected_items)
{
	if ($p2p->name === 'talk_to_schedule' && $p2p->get_direction() === 'to')
	{
		$args = array_merge($args, array(
			'meta_key' => 'schedule',
			'orderby' => 'meta_value',
			'order' => 'ASC',
			'posts_per_page' => -1
		));
	}

	return $args;
}
