<?php get_header() ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php while(have_posts()): the_post() ?>
			<?php get_template_part('page', 'article') ?>
		<?php endwhile ?>
	</div>
</div>

<?php get_footer() ?>
