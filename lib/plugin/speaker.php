<?php
/**
 * Deals with "Speaker" Custom Post Type
 *
 * @see   http://codex.wordpress.org/Function_Reference/register_post_type
 * @todo  Move that in a separate plugin because it's sitewide, not only for this theme
 */

add_action('init', 'sudweb_register_speaker');

/**
 * Registers the "Speaker" Custom Post Type
 * Registers the "Speaker Types" Custom Taxonomy
 */
function sudweb_register_speaker()
{
	/**
	 * Registering "Speaker"
	 */
	register_post_type('speaker', array(
		'labels' => array(
			'name' => _x('Speakers', 'post type general name', 'sudweb'),
			'singular_name' => _x('Speaker', 'post type singular name', 'sudweb'),
			'add_new' => __('Add New', 'speaker'),
			'add_new_item' => __('Add New Speaker', 'sudweb'),
			'edit_item' => __('Edit Speaker', 'sudweb'),
			'new_item' => __('New Speaker', 'sudweb'),
			'all_items' => __('All Speakers', 'sudweb'),
			'view_item' => __('View Speaker', 'sudweb'),
			'search_items' => __('Search Speakers', 'sudweb'),
			'not_found' =>  __('No speakers found', 'sudweb'),
			'not_found_in_trash' => __('No speakers found in Trash', 'sudweb'),
			'parent_item_colon' => '',
			'menu_name' => __('Speaker', 'sudweb'),
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'menu_position' => 5, //Below posts
		'supports' => array(
			'title',
			'editor',
			'thumbnail',
			'excerpt'
		)
	));
}

/**
 * Displays the lang attribute for a given speaker
 *
 * @param null $speaker_id
 * @return null
 */
function speaker_lang_attribute($speaker_id = null)
{
	echo str_replace(
		array('Français', 'Anglais', 'English'),
		array('fr', 'en', 'en'),
		trim(get_field('language', $speaker_id === null ? get_the_ID() : $speaker_id))
	);
}
