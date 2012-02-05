<?php get_header() ?>

<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="span9">
		<article <?php post_class() ?>>
			<header>
				<?php the_post_thumbnail() ?>
				<h2 class="conference-title"><?php the_title() ?></h2>
				<span class="conference-author"><?php the_author_posts_link() ?></span>
			</header>

			<p><span class="conference-datetime">@todo with custom field</span></p>

			<?php the_content() ?>
		</article>
	</div>
</div>

<?php get_footer() ?>
