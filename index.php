<?php get_header(); the_post(); ?>

<div class="row">
	<?php $involvement_page = get_page_by_title('Comment venir') ?>
	<?php if ($involvement_page && ($involvement_page->ID === get_the_ID() || in_array($involvement_page->ID, get_ancestors(get_the_ID(), 'page')))): ?>
	<?php get_sidebar('attending') ?>
	<?php else: ?>
	<?php get_sidebar('conferences') ?>
	<?php endif ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>
	</div>
</div>

<?php get_footer() ?>
