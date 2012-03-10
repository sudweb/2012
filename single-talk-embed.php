<div class="schedule-item schedule-talk">
	<h2 class="schedule-item-title">
		<a href="<?php the_permalink() ?>" rel="bookmark" lang="<?php talk_lang_attribute() ?>">
			<?php the_title() ?>
		</a>
	</h2>
	<!-- Timeframe Content -->
	<?php if (get_post_type(get_queried_object()) === 'speaker'): ?>
	<div class="schedule-item-timeframe">
		<?php echo sudweb_get_talk_datetime($post, 'j F') ?>
	</div>
	<?php elseif (get_field('schedule')): ?>
	<div class="schedule-item-timeframe">
		<?php the_field('schedule') ?>
	</div>
	<?php endif ?>
	<?php has_post_thumbnail() ? the_post_thumbnail('tiny-thumbnail', array('class' => 'illustration', 'alt' => '')) : sudweb_the_connected_speaker_thumbnail('tiny-thumbnail', array('class' => 'illustration', 'alt' => '')); ?>
	<!-- Subtitle -->
	<div class="schedule-item-subtitle">
		<?php echo get_the_terms(get_the_id(), 'talk_types')->name ?>
		<?php if (get_post_type(get_queried_object()) !== 'speaker'): ?>
		– Animé par <?php sudweb_list_speakers(get_the_id()) ?>
		<?php endif ?>
	</div>
</div>
