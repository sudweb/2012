	<div class="block social">
		<h2><?php _e('Keep in touch', 'sudweb'); ?></h2>
		<?php wp_nav_menu(array(
			'theme_location' => 'footer-social',
			'container' => false
		)) ?>
	</div>
	<div class="block sponsors">
		<h2><?php _e('Sponsors', 'sudweb'); ?></h2>

		<?php get_template_part('sponsors', 'loop') ?>
		<p class="devenirpartenaire">Vous souhaitez devenir partenaire ? <a href="http://sudweb.fr/2012/wp-content/uploads/2012/03/dossier-partenariat-2012.pdf">Téléchargez notre dossier de partenariat</a></p>
	</div>
</div>
<div class="footer" role="footer">
	<div class="container">
		<?php dynamic_sidebar('footer') ?>
		<?php wp_nav_menu(array(
			'theme_location' => 'footer-column2',
			'menu_class' => 'nav'
		)) ?>
	</div>
</div>
<?php wp_footer() ?>
</body>
</html>
