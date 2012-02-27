<?php get_header(); the_post(); ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="span9">
		<article <?php post_class() ?>>
			<header>
				<?php if (has_post_thumbnail()): the_post_thumbnail(); endif ?>
				<h2 class="post-title"><?php the_title() ?></h2>
			</header>

			<?php the_content() ?>
		</article>
	</div>
</div>

<?php get_footer() ?>
