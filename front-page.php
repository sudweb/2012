<?php get_header() ?>

<div class="block actualites">
	<h2><a href="http://sudweb.fr/2012/actualites/"><?php _e('Latest News', 'sudweb') ?></a></h2>

	<?php query_posts('posts_per_page=5&post_type=post&order=DESC'); ?>
	<?php while(have_posts()): the_post() ?>
	<div>
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>
		<?php the_post_thumbnail('thumbnail', array('class' => 'illustration')) ?>
		<div class="meta"><?php echo get_the_date() ?></div>
		<p><?php the_excerpt() ?></p>
	</div>
	<?php endwhile ?>
</div>

<div class="block programme">
	<h2><a href="http://sudweb.fr/2012/programme/"><?php _e('Highlighted Talk', 'sudweb') ?></a></h2>

	<?php $talks = get_posts(array(
		'numberposts' => 1,
		'orderby' => 'rand',
		'post_type' => 'talk',
		'post_status' => 'publish',
	)) ?>
	<?php foreach($talks as $post): setup_postdata($post) ?>
	<article>
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>
		<?php the_post_thumbnail('thumbnail', array('class' => 'illustration')) ?>
		<div class="meta"><?php sudweb_list_speakers(get_the_id()) ?></div>
		<?php the_excerpt() ?>
	</article>
	<?php endforeach ?>
	<?php if (count ($talks) == 0): ?>
	<div>
		<p>Le programme n'est pas encore disponible, suivez-nous pour être informé dès qu'il sera annoncé !</p>
	</div>
	<?php endif ?>
</div>

<?php get_footer() ?>
