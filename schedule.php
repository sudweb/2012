<?php
/*
Template Name: Programme
*/ get_header(); the_post() ?>
<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<div class="schedule-list">
		<?php foreach (get_posts('post_type=schedule') as $post): setup_postdata($post); ?>
			<div class="schedule-item schedule-day">
				<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>

				<?php the_excerpt() ?>
			</div>
		<?php endforeach ?>
		</div>
	</div>
</div>
<?php get_footer() ?>
