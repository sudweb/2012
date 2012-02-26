<?php
define('THEME_VERSION', '2.0.2-dev');
add_theme_support('post-thumbnails');
load_theme_textdomain('sudweb', get_template_directory().'/i18n');
set_post_thumbnail_size(870, 220, true);

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

/*
 * Register actions
 */
add_action('wp', 'theme_main_action');
add_filter('nav_menu_css_class', 'filter_navmenu_classes', 10, 3);
add_filter('post_thumbnail_html', 'theme_filter_empty_thumbnail_html', 10, 5);
add_filter('wp_nav_menu_container_allowedtags', 'theme_filter_enable_aside_nav');
require dirname(__FILE__).'/lib/plugin/speaker.php';
require dirname(__FILE__).'/lib/plugin/talk.php';
require dirname(__FILE__).'/lib/plugin/sponsor.php';

function theme_main_action(){
    wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.css', array(), 'THEME_VERSION', 'media,screen');
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

	if ($html || !isset($_wp_additional_image_sizes[$size]))
	{
		return $html;
	}

	$size_profile = $_wp_additional_image_sizes[$size];

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
