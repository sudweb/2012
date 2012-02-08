<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<title><?php wp_title() ?></title>
	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/style.css" />
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>
	<div class="wrapper">
		<header class="header vevent" role="header" id="header">
			<div class="container">
				<h1 class="logo"><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('title') ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('title') ?>" /></a></h1>
	
				<div class="baseline"><strong><time class="dtstart" datetime="2012-05-25">25</time> et <time class="dtstart" datetime="2012-05-25">26 mai 2012</time></strong> à <span class="location">Toulouse, France</span></div>
		
				<a href="#" class="cta beforepitch">Proposez un sujet !</a>

				<div class="pitch">
					<h2>Faire-savoir et savoir-faire</h2>
					<p>Sud web, c'est avant tout 2 jours d'échanges autour des technologies du web d'aujourd'hui et de demain. Notre ambition est de transmettre au plus grand nombre cette passion qui nous anime pour préserver un web ouvert de qualité.</p>
				</div>
				<div class="illustration">
					<img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/placeholder.png" alt="" />
					<?php dynamic_sidebar('header') ?>
				</div>
			</div>
			<div class="nav">
			<?php wp_nav_menu(array(
				'theme_location' => 'header',
				'menu_class' => 'container',
			)) ?>
			</div>
		</div>
	</header>
</div>

<div class="container" role="main" id="content">
	<a href="#" class="cta afterpitch">Proposez un sujet !</a>