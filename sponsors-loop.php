<?php
/* Kludge to know if the code will be displayed in the footer */
$is_within_footer = strpos(json_encode(debug_backtrace()), 'footer.php');
?>
<?php foreach (sudweb_get_sponsors() as $type): ?>
<?php if (!$is_within_footer): ?>
<div class="<?php echo $type['post']->slug; ?>">
	<h2><span><?php echo $type['post']->name; ?></span></h2>
<?php endif; ?>
	<ul class="<?php echo $type['post']->slug; ?>">
		<?php foreach ($type['sponsors'] as $post): setup_postdata($post); ?>
		<li><a href="<?php the_permalink() ?>" rel="bookmark">
			<?php (has_post_thumbnail() && $type['post']->slug != 'bronze') ? the_post_thumbnail('sponsor-logo', array('class' => 'illustration')) : the_title(); ?>
		</a></li>
		<?php endforeach ?>
	</ul>
<?php if (!$is_within_footer): ?>
</div>
<?php endif; ?>
<?php endforeach ?>
