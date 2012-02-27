<?php get_header(); the_post() ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="span9">
		<article <?php post_class() ?>>
			<header>
				<h2 class="post-title"><?php the_title() ?></h2>
			</header>

			<?php the_content() ?>

			<?php $talks = p2p_type('talk_to_speaker')->get_connected(get_the_id()) ?>
			<?php p2p_list_posts($talks, array(
				'template' => 'single-talk-embed.php',
				'before_list' => '', 'after_list' => '',
				'before_item' => '', 'after_item' => '',
			)) ?>
		</article>
	</div>
</div>

<?php get_footer() ?>
