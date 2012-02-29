<?php get_header() ?>

<div class="block actualites">
	<h2><?php _e('Latest News', 'sudweb') ?></h2>

	<?php while(have_posts()): the_post() ?>
	<div>
		<?php the_post_thumbnail('thumbnail', array('class' => 'illustration')) ?>
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>
		<div class="meta"><?php echo get_the_date() ?></div>
		<p><?php the_excerpt() ?></p>
	</div>
	<?php endwhile ?>
</div>

<div class="block programme">
	<h2><?php _e('Highlighted Talk', 'sudweb') ?></h2>

	<?php $talks = get_posts(array(
		'numberposts' => 1,
		'orderby' => 'rand',
		'post_type' => 'talk',
		'post_status' => 'publish',
	)) ?>
	<?php foreach($talks as $post): setup_postdata($post) ?>
	<article>
		<?php the_post_thumbnail('thumbnail', array('class' => 'illustration')) ?>
		<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>
		<div class="meta">
			<?php if (function_exists('p2p_list_posts')): ?>
			<?php $speakers = p2p_type('talk_to_speaker')->get_connected(get_the_id()) ?>
			<?php p2p_list_posts($speakers, array(
				'before_list' => '<span class="post-speaker">',
				'after_list' => '</span>',
				'before_item' => '',
				'after_item' => '',
			)) ?>
			<?php endif ?>
		</div>
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
