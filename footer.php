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
		// TODO restrict to sponsors valid for this edition
		$sponsor_types = get_terms('sponsor_types', array('orderby' => 'id'));
		foreach ($sponsor_types as $type):
			$items = get_posts(array(
				'numberposts' => -1,
				'post_type' => 'sponsor',
				'post_status' => 'publish',
				'tax_query' => array(
					array(
						'taxonomy' => 'sponsor_types',
						'field' => 'slug',
						'terms' => $type->slug
					)
				)
			));
			if (count ($items) == 0) {
				continue;
			}
			?>
			<ul class="<?php echo $type->slug; ?>">
			<?php foreach ($items as $post): setup_postdata($post); ?>
				<li><a href="<?php the_permalink() ?>" rel="bookmark">
					<?php (has_post_thumbnail()) ? the_post_thumbnail('thumbnail', array('class' => 'illustration')) : the_title(); ?>
				</a></li>
			<?php endforeach ?>
			</ul>
		<?php endforeach ?>
		<p class="devenirpartenaire">Vous souhaitez devenir partenaire ? <a href="#">Téléchargez notre dossier de partenariat</a></p>
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