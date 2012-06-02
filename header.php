<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<title><?php wp_title() ?></title>
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head() ?>
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/ie.css" />
	<![endif]-->
</head>
<body <?php body_class() ?>>
	<div class="wrapper">
		<div class="header vevent" role="header" id="header">
			<div class="container">
				<h1 class="logo"><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('title') ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('title') ?>" /></a></h1>

				<div class="baseline"><strong><time class="dtstart" datetime="2012-05-25">25</time> et <time class="dtstart" datetime="2012-05-26">26 mai 2012</time></strong> à <span class="location">Toulouse, France</span></div>

				<a href="http://www.flickr.com/groups/sudweb2012/pool/with/7309145648/lightbox/" class="cta beforepitch">Voir les photos</a>

				<div class="pitch summary">
					<?php dynamic_sidebar('header') ?>
				</div>
			</div>
			<?php wp_nav_menu(array(
				'menu' => 'Navigation principale',
				'theme_location' => 'header',
				'menu_class' => 'container',
				'container_class' => 'nav',
				'container' => 'div'
			)) ?>
		</div>
	</div>
</div>

<div class="container" role="main" id="content">
	<a href="//sudweb.fr/2012/inscription/" class="cta afterpitch">Inscrivez-vous !</a>
