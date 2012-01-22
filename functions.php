<?php
define('THEME_VERSION', '2.0.0-dev');

/*
 * Requires bundled WP-LESS for LESS stylesheet parsing features
 */
if (false === class_exists('WPLessPlugin'))
{
	require __DIR__.'/vendor/wp-less/bootstrap-for-theme.php';
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

/*
 * Declaring Menus
 */
register_nav_menu('header', 'Primary Navigation');

/*
 * Register actions
 */
add_action('wp', 'theme_main_action');

function theme_main_action(){
    wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.less', array(), 'THEME_VERSION', 'media,screen');
}
