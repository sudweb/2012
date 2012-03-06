<?php
/*
Template Name: Programme
*/ get_header(); the_post() ?>
<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<ol class="schedule-list">
		<?php foreach (get_posts('post_type=schedule&orderby=menu_order&order=ASC') as $post): setup_postdata($post); ?>
			<li class="schedule-item schedule-day vevent">
				<h3 class="schedule-item-title">
					<a href="<?php the_permalink() ?>" rel="bookmark">
						<?php the_post_thumbnail('thumbnail', array('alt' => '')) ?>
						<?php the_title() ?>
					</a>
				</h3>
				<div class="schedule-item-content"><?php the_excerpt() ?></div>
			</li>
		<?php endforeach ?>
		</ol>
	</div>
</div>
<?php get_footer() ?>
