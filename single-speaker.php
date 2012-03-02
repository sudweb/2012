<?php get_header(); the_post() ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<?php sudweb_list_speakers(get_the_id(), array(
			'template' => 'single-talk-embed.php',
			'before_list' => '', 'after_list' => '',
			'before_item' => '', 'after_item' => '',
		)) ?>
	</div>
</div>

<?php get_footer() ?>
