<?php get_header(); the_post(); ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<article <?php post_class() ?>>
			<header>
				<?php the_post_thumbnail() ?>
				<h2 class="post-title"><?php the_title() ?></h2>
				<?php if (function_exists('p2p_list_posts')): ?>
				<?php $speakers = p2p_type('talk_to_speaker')->get_connected(get_the_id()) ?>
				<?php p2p_list_posts($speakers, array(
					'before_list' => '<span class="post-speaker">',
					'after_list' => '</span>',
					'before_item' => '',
					'after_item' => '',
				)) ?>
				<?php endif ?>
			</header>

			<?php if (function_exists('p2p_list_posts')): ?>
			<?php $schedule = p2p_type('talk_to_schedule')->get_connected(get_the_id())->next_post() ?>
			<p>
				<span class="post-datetime">
					<a href="<?php echo get_post_permalink($schedule->ID) ?>"><?php echo $schedule->post_title ?></a>
					<?php if (get_field('schedule')): ?>à <?php the_field('schedule') ?><?php endif ?>
				</span>

				<?php if (function_exists('get_the_terms')): ?>
				(<?php echo get_the_terms(get_the_id(), 'talk_types')->name ?>)
				<?php endif ?>

				<?php if (get_field('language')): ?>
				– <span class="language"><?php the_field('language') ?></span>
				<?php endif ?>
			</p>
			<?php endif ?>

			<?php the_content() ?>
		</article>
	</div>
</div>

<?php get_footer() ?>
