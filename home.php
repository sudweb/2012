<?php get_header() ?>

<div class="row">
<div class="rich-list-container span6" id="news">
	<h2><?php _e('Latest News', 'sudweb') ?></h2>

	<?php while(have_posts()): the_post() ?>
	<div class="rich-list-item">
		<h3><a href="<?php the_permalink() ?> rel="bookmark"><?php the_title() ?></a></h3>
		<?php the_post_thumbnail('post-thumbnail', array('class' => 'llustration alignright')) ?>
		<div class="meta"><?php echo get_the_date() ?></div>
		<p><?php the_excerpt() ?></p>
	</div>
	<?php endwhile ?>
</div>

</div>
<?php get_footer() ?>
