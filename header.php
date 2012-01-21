<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<?php wp_title('') ?>
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>

<header>
	<div class="container">

	<h1><a href="<?php bloginfo('url') ?>" title="<?php bloginfo('title') ?>" rel="home"><img src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/logo.png" alt="<?php bloginfo('title') ?>" /></a></h1>

		<div class="baseline"><strong><time class="dtstart" datetime="2012-05-25">25</time> et <time class="dtstart" datetime="2012-05-25">26 mai 2012</time></strong> à <span class="location">Toulouse, France</span></div>

		<?php dynamic_sidebar('header') ?>

		<p class="btn"><a>Proposez un sujet</a></p>

		<?php //@todo handle this with a wp_menu ?>
		<nav class="unstyled">
			<li><a href="/programme">Programme</a></li>
			<li><a href="/partiper">Participer</a></li>
			<li><a href="/actualites">Actualités</a></li>
			<li><a href="/partenaires">Partenaires</a></li>
		</nav>
	</div>
</header>

<div role="main">
