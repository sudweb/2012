<?php get_header() ?>

<div class="row">
	<div class="rich-list-container span6" id="news">
		<h2><?php _e('Latest News', 'sudweb') ?></h2>

		<?php while(have_posts()): the_post() ?>
		<div class="rich-list-item">
			<?php the_post_thumbnail('thumbnail', array('class' => 'illustration alignright')) ?>
			<h3><a href="<?php the_permalink() ?> rel="bookmark"><?php the_title() ?></a></h3>
			<div class="meta"><?php echo get_the_date() ?></div>
			<p><?php the_excerpt() ?></p>
		</div>
		<?php endwhile ?>
	</div>

	<div class="rich-list-container span6" id="talk">
		<h2><?php _e('Highlighted Talk', 'sudweb') ?></h2>

		<?php $talks = get_posts(array(
			'numberposts' => 1,
			'orderby' => 'rand',
			'post_type' => 'talk',
			'post_status' => 'publish',
		)) ?>
		<?php foreach($talks as $post): setup_postdata($post) ?>
		<div class="rich-list-item">
			<?php the_post_thumbnail('thumbnail', array('class' => 'illustration alignright')) ?>
			<h3><a href="<?php the_permalink() ?> rel="bookmark"><?php the_title() ?></a></h3>
			<div class="meta"><?php _e('By', 'sudweb') ?>&nbsp;<?php the_author_posts_link() ?></div>
			<p><?php the_excerpt() ?></p>
		</div>
		<?php endforeach ?>
	</div>
</div>
<?php get_footer() ?>
