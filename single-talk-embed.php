<div class="schedule-item schedule-talk">
	<?php the_post_thumbnail('tiny-thumbnail') ?>
	<h3 class="schedule-item-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title() ?></a></h3>

	<!-- Timeframe Content -->
	<?php if (get_post_type(get_queried_object()) === 'speaker'): ?>
	<div class="schedule-item-timeframe">

	</div>
	<?php elseif (get_field('schedule')): ?>
	<div class="schedule-item-timeframe">
		<?php the_field('schedule') ?>
	</div>
	<?php endif ?>

	<!-- Subtitle -->
	<div class="schedule-item-subtitle">
		<?php if (get_post_type(get_queried_object()) !== 'speaker'): ?>
		Animé par <?php sudweb_list_speakers(get_the_id()) ?>
		<?php else: ?>
		<?php echo get_the_terms(get_the_id(), 'talk_types')->name ?>
		<?php endif ?>
	</div>
</div>
