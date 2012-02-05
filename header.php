<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<title><?php wp_title('') ?></title>
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>

<header id="header">
	<div class="container">

	<h1><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('title') ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('title') ?>" /></a></h1>

		<div class="baseline"><strong><time class="dtstart" datetime="2012-05-25">25</time> et <time class="dtstart" datetime="2012-05-25">26 mai 2012</time></strong> à <span class="location">Toulouse, France</span></div>

		<?php dynamic_sidebar('header') ?>

		<p class="aligncenter"><a class="cta top-right" href="#">Proposer un sujet !</a></p>

		<?php wp_nav_menu(array(
			'theme_location' => 'header',
			'container' => 'nav',
			'menu_class' => 'row',
		)) ?>
	</div>
</header>

<div class="container" role="main" id="content">
