</div>
<footer>
	<div class="container">
		<div class="row">
			<?php dynamic_sidebar('footer') ?>

			<?php wp_nav_menu(array(
				'theme_location' => 'footer-column2',
				'container_class' => 'span2 offset1 links',
				'menu_class' => 'unstyled',
			)) ?>

			<?php wp_nav_menu(array(
				'theme_location' => 'footer-column3',
				'container_class' => 'span3 links',
				'menu_class' => 'unstyled',
			)) ?>
		</div>
	</div>
</footer>
<?php wp_footer() ?></body></html>
