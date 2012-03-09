<?php foreach (sudweb_get_sponsors() as $type): ?>
<div class="<?php echo $type['post']->slug; ?>">
	<h3><span><?php echo $type['post']->name; ?></span></h3>
	<ul class="<?php echo $type['post']->slug; ?>">
		<?php foreach ($type['sponsors'] as $post): setup_postdata($post); ?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark">
			<?php (has_post_thumbnail() && $type['post']->slug != 'bronze') ? the_post_thumbnail('sponsor-logo', array('class' => 'illustration')) : the_title(); ?>
		</a></li>
		<?php endforeach ?>
	</ul>
</div>
<?php endforeach ?>
