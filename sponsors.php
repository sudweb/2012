<?php
/*
Template Name: Sponsors
*/?>

<?php  get_header(); the_post() ?>
<div class="row">
	<?php get_sidebar('conferences') ?>

	<div class="content">
		<?php get_template_part('page', 'article') ?>

		<?php get_template_part('sponsors', 'loop') ?>
	</div>
</div>
<?php get_footer() ?>

