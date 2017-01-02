<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */

if (!defined('ABSPATH')) {
    die('-1');
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single">

	<p class="tribe-events-back">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>"> <?php printf( '&laquo; ' . esc_html_x( 'All %s', '%s Events plural label', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<div id="description" class='onglet onglet-event on'>

	<?php while (have_posts()) :  the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('vevent'); ?>>

			<!-- Event content -->
			<?php do_action('tribe_events_single_event_before_the_content') ?>
			<div class="tribe-events-single-event-description tribe-events-content entry-content description">
				<?php the_content(); ?>
			</div><!-- .tribe-events-single-event-description -->
			<?php do_action('tribe_events_single_event_after_the_content') ?>


			</div><!-- .hentry .vevent -->
			<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>
	<?php endwhile; ?>


	</div>


	<!-- Les onglets -->

	<?php

    if (have_rows('informations')):

        while (have_rows('informations')) : the_row();

            if (get_row_layout() == 'info'):

    ?>

		<div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class='onglet onglet-event'>
			<h2><?php the_sub_field('titre'); ?></h2>
			<?php the_sub_field('contenu'); ?>
		</div>


	<?php

            endif;

        endwhile;

    else :

        // no layouts found

    endif;

    ?>


</div><!-- #tribe-events-content -->

<aside id="sidebar-event">

	<?php get_sidebar('event'); ?>

</aside>

<div class="clear"></div>
