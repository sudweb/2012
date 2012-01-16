<!DOCTYPE html>
<html <?php language_attributes() ?>>
<head>
	<?php wp_title('') ?>
	<?php wp_head() ?>
</head>
<body <?php body_class() ?>>

<header>
	<h1><?php bloginfo('title') ?></h1>
	<p>Les 25 et 26 Mai à Toulouse, France</p>
	<h2>Faire savoir et savoir-faire</h2>
	<p>Sud web, c'est avant tout 2 jours d'échanges autour des technologies du web d'aujourd'hui et de demain. Notre ambition est de transmettre au plus grand nombre cette passion qui nous anime pour préserver un web ouvert de qualité.</p>
	<figure>
		<img src="http://farm7.staticflickr.com/6186/6070501765_5cc8d47a84_m.jpg" alt="Pardon me, I'm a newbie !" />
	</figure>
	<p class="btn"><a>Proposez un sujet</a></p>

	<?php //@todo handle this with a wp_menu ?>
	<nav class="unstyled">
		<li><a href="/programme">Programme</a></li>
		<li><a href="/partiper">Participer</a></li>
		<li><a href="/actualites">Actualités</a></li>
		<li><a href="/partenaires">Partenaires</a></li>
	</nav>
</header>

<div role="main">
