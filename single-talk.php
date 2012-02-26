<?php get_header(); the_post(); ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<?php $speakers = p2p_type('talk_to_speaker')->get_connected(get_the_id()) ?>

	<div class="span9">
		<article <?php post_class() ?>>
			<header>
				<?php the_post_thumbnail() ?>
				<h2 class="conference-title"><?php the_title() ?></h2>
				<?php if (function_exists('p2p_list_posts')): ?>
				<?php p2p_list_posts($speakers, array(
					'before_list' => '<span class="conference-speaker">',
					'after_list' => '</span>',
					'before_item' => '',
					'after_item' => '',
				)) ?>
				<?php endif ?>
			</header>

			<p><span class="conference-datetime"><?php the_field('schedule') ?></span></p>

			<?php the_content() ?>
		</article>
	</div>
</div>

<?php get_footer() ?>
