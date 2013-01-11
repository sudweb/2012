<?php get_header(); the_post() ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<?php $talks = p2p_type('talk_to_schedule')->get_connected(get_the_id()) ?>
		<?php p2p_list_posts($talks, array(
		'template' => 'single-talk-embed.php'
	)) ?>
	</div>
</div>

<?php get_footer() ?>
