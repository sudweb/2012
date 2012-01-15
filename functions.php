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
 * Register actions
 */
add_action('wp', 'theme_main_action');

function theme_main_action(){
    wp_enqueue_style('main', get_stylesheet_directory_uri().'/style.less', array(), 'THEME_VERSION', 'media,screen');
}
