<?php


/*
 * Requires bundled WP-LESS for LESS stylesheet parsing features
 */
if (false === class_exists('WPLessPlugin'))
{
	require __DIR__.'/vendor/wp-less/bootstrap-for-theme.php';
	$WPLessPlugin->dispatch();
}
