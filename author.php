<?php get_header(); ?>

<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>

<div class="content speaker">
	<h2><?php echo $curauth->display_name ?></h2>
	<?php if ($curauth->user_url): ?><div class="meta site"><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></div><?php endif; ?>
	<?php if ($curauth->user_description): ?><div class="bio"><?php echo $curauth->user_description; ?></div><?php endif; ?>
	
	<?php foreach (get_posts(array('post_type' => 'talk', 'orderby' => 'post_date', 'order' => 'ASC', 'post_status' => 'publish')) as $post) : setup_postdata($post); ?>
	<div>
		<h3><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title() ?></a></h3>
		<?php the_post_thumbnail() ?>
		<div class="meta date"><?php the_date ('l j F Y à h:i') ?></div>
		<div class="meta format"><?php the_taxonomies () ?></div>
		<?php the_excerpt() ?>
	</div>
	<?php endforeach; ?>
</div>

<?php get_footer() ?>
