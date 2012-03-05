<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<title><?php wp_title() ?></title>
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

				<div class="baseline"><strong><time class="dtstart" datetime="2012-05-25">25</time> et <time class="dtstart" datetime="2012-05-26">26 mai 2012</time></strong> à <span class="location">Toulouse, France</span></div>

				<a href="//sudweb.fr/2012/inscription/" class="cta beforepitch">Inscrivez-vous !</a>

				<div class="pitch summary">
					<?php dynamic_sidebar('header') ?>
				</div>
				<div class="illustration" id="flickr" data-key="b3acf3ad86fbd88dc1def300e94f9448" data-photoset="72157627495399296"></div>
			</div>
			<?php wp_nav_menu(array(
				'menu' => 'Navigation principale',
				'theme_location' => 'header',
				'menu_class' => 'container',
				'container_class' => 'nav',
				'container' => 'div'
			)) ?>
		</div>
	</header>
</div>

<div class="container" role="main" id="content">
	<a href="//sudweb.fr/2012/inscription/" class="cta afterpitch">Inscrivez-vous !</a>
