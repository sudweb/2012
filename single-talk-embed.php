<div class="schedule-item schedule-talk">
	<?php the_post_thumbnail('tiny-thumbnail') ?>
	<h3 class="schedule-item-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>

	<?php if (get_field('schedule')): ?>
	<div class="schedule-item-timeframe">
		<?php the_field('schedule') ?>
	</div>
	<?php endif ?>

	<div class="schedule-item-subtitle">
		Animé par <?php sudweb_list_speakers(get_the_id()) ?>
	</div>
</div>
