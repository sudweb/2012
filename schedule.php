<?php
/*
Template Name: Programme
*/ get_header(); the_post() ?>
<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<div class="schedule-list">
		<?php foreach (get_posts('post_type=schedule&orderby=menu_order&order=ASC') as $post): setup_postdata($post); ?>
			<div class="schedule-item schedule-day">
				<?php the_post_thumbnail('thumbnail') ?>
				<h3 class="schedule-item-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>

				<div class="schedule-item-timeframe">
					<?php echo date_i18n('j F', strtotime(get_field('day'))) ?>
				</div>

				<div class="schedule-item-content"><?php the_excerpt() ?></div>
			</div>
		<?php endforeach ?>
		</div>
	</div>
</div>
<?php get_footer() ?>
