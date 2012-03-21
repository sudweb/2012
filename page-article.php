<article <?php post_class() ?>>
	<header>
		<?php if (has_post_thumbnail()): the_post_thumbnail(); endif ?>
		<h1 class="post-title">
			<?php if (is_singular()): ?>
				<?php the_title() ?>
			<?php else: ?>
				<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a>
			<?php endif; ?>
		</h1>
	</header>

	<?php the_content() ?>
</article>
