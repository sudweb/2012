	<div class="block social">
		<h2><?php _e('Keep in touch', 'sudweb'); ?></h2>
		<ul>
			<li><a href="#" class="newsletter">Newsletter</a></li>
			<li><a href="https://twitter.com/sudweb" class="twitter">Twitter</a></li>
			<li><a href="https://www.facebook.com/SudWeb" class="facebook">Facebook</a></li>
			<li><a href="http://lanyrd.com/2012/sudweb/" class="lanyrd">Lanyrd</a></li>
			<li><a href="https://plus.google.com/117285954629943503768/posts" class="googleplus">Google+</a></li>
		</ul>
	</div>
	<div class="block sponsors">
		<h2><?php _e('Sponsors', 'sudweb'); ?></h2>
		
		<?php
		$sponsor_types = array('gold', 'silver', 'bronze');
		foreach ($sponsor_types as $type):
			$items = get_posts(array(
				'numberposts' => -1,
				'post_type' => 'sponsor',
				'post_status' => 'publish',
				'sponsor_type' => $type
			));
			if (count ($items) == 0) {
				continue;
			}
			?>
			<ul class="<?php echo $type; ?>">
			<?php foreach ($items as $post): setup_postdata($post); ?>
				<?php if ($type == 'bronze'): ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></li>
				<?php else: ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('thumbnail', array('class' => 'illustration')) ?></a></li>
				<?php endif ?>
			<?php endforeach ?>
			</ul>
		<?php endforeach ?>
		<p class="devenirpartenaire">Vous souhaitez devenir partenaire ? <a href="#">Téléchargez notre dossier de partenariat</a></p>
	</div>
</div>
<div class="footer" role="footer">
	<div class="container">
		<div class="apropos">
			<h2>À propos de l'Association Sud-Web</h2>
			<p>Derrière Sud Web (l’événement), il y a Sud-Web (l’association). Derrière le rêve et les paillettes, il y a les travailleurs de l’ombre, qui s’activent en silence pour donner vie à leur passion....</p>
			<?php dynamic_sidebar('footer') ?>
		</div>
		<?php wp_nav_menu(array(
			'theme_location' => 'footer-column2',
			'menu_class' => 'nav'
		)) ?>
		<?php wp_nav_menu(array(
			'theme_location' => 'footer-column3',
			'container_class' => 'span3 links',
			'menu_class' => 'unstyled'
		)) ?>
		<?php /*
		// TODO: Find a way to merge items from both menu locations into one UL 
		<ul class="nav">
			<li class="espacepresse"><a href="#">Espace Presse</a></li>
			<li class="soutien-officiel"><a href="#">Avec le soutien du W3C</a></li>
			<li><a href="#">Plan du site</a></li>
			<li><a href="#">Crédits</a></li>
			<li><a href="#">Mentions légales</a></li>
			<li class="hebergement"><a href="http://www.alwaysdata.com/">Sympathiquement hébergé par AlwaysData</a></li>
		</ul>
		*/ ?>
	</div>
</div>
<?php wp_footer() ?>
</body>
</html>