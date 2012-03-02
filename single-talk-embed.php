<div class="schedule-item schedule-talk">
	<?php the_post_thumbnail('tiny-thumbnail') ?>
	<h3 class="schedule-item-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>

	<div class="schedule-item-timeframe">
		<?php the_field('schedule') ?>
	</div>

	<div class="schedule-item-subtitle">
		Animé par <a href="#">John Doe</a>
	</div>
</div>
