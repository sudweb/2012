<article <?php post_class() ?>>
	<header>
		<?php if (has_post_thumbnail()): the_post_thumbnail(); endif ?>
		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h2>
	</header>

	<?php the_content() ?>
</article>
