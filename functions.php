<?php
define('THEME_VERSION', '2.0.2-dev');
add_theme_support('post-thumbnails');
load_theme_textdomain('sudweb', get_template_directory().'/i18n');
set_post_thumbnail_size(870, 220, true);
add_image_size('tiny-thumbnail', 60, 60, true);
add_image_size('sponsor-logo-or', 150, 150, false);
add_image_size('sponsor-logo-argent', 100, 100, false);

/*
 * Requires bundled WP-LESS for LESS stylesheet parsing features
 */
if (false === class_exists('WPLessPlugin'))
{
	require dirname(__FILE__).'/vendor/wp-less/bootstrap-for-theme.php';
	$WPLessPlugin->dispatch();
}

/*
 * Declaring Sidebars
 */
register_sidebar(array(
	'name' => 'Header',
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
));

register_sidebar(array(
	'name' => 'Footer',
	'before_widget' => '<div class="about">',
	'after_widget' => '</div>',
	'before_title' => '<h2>',
	'after_title' => '</h2>',
));

/*
 * Declaring Menus
 */
register_nav_menu('header', 'Primary Navigation');
register_nav_menu('footer-social', 'Social networks');
register_nav_menu('footer-column2', 'Footer: Column 2');
register_nav_menu('sidebar-conferences', 'Conferences Sidebar');
register_nav_menu('sidebar-attending', 'Attending Sidebar');

/*
 * Register actions
 */
add_action('wp', 'theme_main_action');
add_filter('nav_menu_css_class', 'filter_navmenu_classes', 10, 3);
add_filter('wp_nav_menu_container_allowedtags', 'theme_filter_enable_aside_nav');
add_filter('post_class', 'theme_filter_post_class', 10, 3);
add_filter('post_thumbnail_html', 'theme_filter_talk_thumbnail', 10, 5);
add_filter('excerpt_more', 'theme_excerpt_more');
require dirname(__FILE__).'/lib/plugin/sponsor.php';
require dirname(__FILE__).'/lib/plugin/place.php';
require dirname(__FILE__).'/lib/plugin/schedule.php';
require dirname(__FILE__).'/lib/plugin/speaker.php';
require dirname(__FILE__).'/lib/plugin/talk.php';

function theme_main_action(){
	wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.less', array(), THEME_VERSION, 'media,screen');
}

/**
 * Adds some CSS classes to given menu elements
 *
 * @uses bootsrap responsive
 * @see http://codex.wordpress.org/Function_Reference/wp_nav_menu
 * @param array $classes
 * @param $item
 * @param $args Menu arguments
 * @return array CSS classes
 */
function filter_navmenu_classes(array $classes, $item, $args)
{
	if (strpos($args->theme_location, 'footer') !== false && stripos($item->title, 'press') !== false)
	{
		$classes[] = 'menu-item-press';
	}

	// Add menu-item-{hostname} to items to easily style external links
	preg_match ('"^(?:https?://)?(?:www\.)?([^\.\/]+)"i', $item->url, $matches);
	if (count($matches) > 1){
		$classes[] = 'menu-item-'.$matches[1];
	}
	return $classes;
}

/**
 * Filters empty thumbnails, to always provide some default picture
 * Lolcats could be fun but you know, we are serious.
 *
 * Usage
 * add_filter('post_thumbnail_html', 'theme_filter_empty_thumbnail_html', 10, 5);
 *
 * @param $html
 * @param $post_id
 * @param $post_thumbnail_id
 * @param $size
 * @param $attr
 * @return string HTML code related to the thumbnail
 */
function theme_filter_empty_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr)
{
	global $_wp_additional_image_sizes;

	if ($html || (!isset($_wp_additional_image_sizes[$size]) && !get_option($size.'_size_w')))
	{
		return $html;
	}

	if (isset($_wp_additional_image_sizes[$size]))
	{
		$size_profile = $_wp_additional_image_sizes[$size];
	}
	else
	{
		$size_profile = array('width' => get_option($size.'_size_w'), 'height' => get_option($size.'_size_h'));
	}


	return strtr('<img src="http://placehold.it/%width%x%height%" alt="" class="%class%" width="%width%" height="%height%" />',
		array(
			'%width%' => intval($size_profile['width']),
			'%height%' => intval($size_profile['height']),
			'%class%' => isset($attr['class']) ? $attr['class'] : '',
		)
	);
}

/**
 * Enables the `aside` HTML in `wp_nav_menu`
 * Without that, it restricts to `div` and `nav`
 *
 * @param array $tags Allowed tags
 * @return array Newly allowed tags
 */
function theme_filter_enable_aside_nav(array $tags)
{
	$tags[] = 'aside';

	return $tags;
}

/**
 * Adding various CSS classes to post types
 *
 * @param $classes Array Already generated classes
 * @param $class Initial classes given in `post_class` call
 * @param $post_id Post ID
 * @return array
 */
function theme_filter_post_class(array $classes, $class, $post_id)
{
	if (has_post_thumbnail($post_id) || array_search('type-talk', $classes) !== false)
	{
		$classes[] = 'with-thumbnail';
	}
	else
	{
		$classes[] = 'without-thumbnail';
	}

	return $classes;
}

/**
 * Displays speakers for a given talk, easy way
 *
 * @param $post_id
 * @param array $args
 * @return null
 */
function sudweb_list_speakers($post_id, array $args = array())
{
	if (!function_exists('p2p_list_posts'))
	{
		return null;
	}

	if (array_search('inherit', $args) === false)
	{
		$args = array_merge(array(
			'before_list' => '<span class="post-speaker">',
			'after_list' => '</span>',
			'before_item' => '',
			'after_item' => ' ',
		), $args);
	}

	$speakers = p2p_type('talk_to_speaker')->get_connected($post_id);

	if ($speakers->post_count)
	{
		p2p_list_posts($speakers, $args);
	}
}

/**
 * Retrieves sponsors and group then by type
 *
 * @return array
 */
function sudweb_get_sponsors()
{
	$types = array();
	$sponsors = get_posts(array(
		'numberposts' => -1,
		'post_type' => 'sponsor',
		'post_status' => 'publish',
		'orderby' => 'menu_order',
	));

	foreach ($sponsors as $sponsor)
	{
		$type = get_the_terms($sponsor->ID, 'sponsor_types');

		if (!$type)
		{
			continue;
		}

		if (!isset($types[$type->term_id]))
		{
			$types[$type->term_id] = array(
				'post' => $type,
				'sponsors' => array(),
			);
		}

		$types[$type->term_id]['sponsors'][] = $sponsor;
	}


	return $types;
}

/**
 * Retrieves a timestamp or a formated date based on a talk object
 * @param $post
 * @param null $format Date format, based on the `date_i18n` provided by WordPress
 * @return int|string
 */
function sudweb_get_talk_datetime($post, $format = null)
{
	$schedule = p2p_type('talk_to_schedule')->get_connected($post->ID)->next_post();
	$datetime = get_field('day', $schedule->ID).' '.str_replace('h', ':', get_field('schedule', $post->ID));
	$datetime = strtotime(trim($datetime));

	return $format === null ? $datetime : date_i18n($format, $datetime);
}

/**
 * If a Talk content has not thumbnail, though we use the speaker one
 *
 * @see get_the_post_thumbnail()
 * @param $html
 * @param $post_id
 * @param $post_thumbnail_id
 * @param $size
 * @param $attr
 * @return string Thumbnail HTML
 */
function theme_filter_talk_thumbnail($html, $post_id, $post_thumbnail_id, $size, $attr)
{
	if ($html)
	{
		return $html;
	}

	$post = get_post($post_id);

	if ($post->post_type === 'talk')
	{
		return get_the_post_thumbnail(
			p2p_type('talk_to_speaker')->get_connected($post_id)->next_post()->ID,
			$size,
			$attr
		);
	}

	return $html;
}

/**
 * Replaces default truncation with a link to the post
 * @uses the_post_thumbnail
 * @param $size
 * @param $attr
 * @return null
 */
function theme_excerpt_more($more) {
       global $post;
	return '… <a href="'. get_permalink($post->ID) . '" title="'. get_the_title($post->ID) .'" rel="bookmark">'.__('(more...)').'</a>';
}

/**
 * Echoes the lang attribute, whatever the post type
 * @return null
 */
function sudweb_the_lang_attribute() {
	global $post;
	$func = $post->post_type . '_lang_attribute';
	if (function_exists($func)){
		$func();
	}
	return;
}