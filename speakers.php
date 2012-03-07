<?php
/*
Template Name: Orateurs
*/?>
<?php  get_header(); the_post() ?>
<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<ul class="schedule-list">
		<?php foreach (get_posts('post_type=speaker&orderby=title&order=ASC&numberposts=-1') as $post): setup_postdata($post); ?>
			<li class="schedule-item schedule-speaker">
				<?php the_post_thumbnail('tiny-thumbnail') ?>
				<h2 class="schedule-item-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h2>

				<div class="schedule-item-content">
					<?php the_excerpt() ?>
					<?php sudweb_list_speakers(get_the_id(), array('template' => 'single-talk-inline.php', 'inherit')) ?>
				</div>
			</li>
		<?php endforeach ?>
		</ul>
	</div>
</div>
<?php get_footer() ?>
