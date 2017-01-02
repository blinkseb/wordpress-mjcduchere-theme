<?php 
/**
 * List View Single Event
 * This file contains one event in the list view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/single-event.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); } ?>

<?php 

// Setup an array of venue details for use later in the template
$venue_details = array();

if ($venue_name = tribe_get_meta( 'tribe_event_venue_name' ) ) {
	$venue_details[] = $venue_name;	
}

if ($venue_address = tribe_get_meta( 'tribe_event_venue_address' ) ) {
	$venue_details[] = $venue_address;	
}
// Venue microformats
$has_venue = ( $venue_details ) ? ' vcard': '';
$has_venue_address = ( $venue_address ) ? ' location': '';
?>

<div class="tribe-events-metas">

<!-- Event Meta -->
<?php do_action( 'tribe_events_before_the_meta' ) ?>

	<!-- Schedule & Recurrence Details -->
	<div class="updated published time-details">
		<em><?php echo tribe_get_start_date(null, false, 'd') ?></em>
		<?php echo tribe_get_start_date(null, false, 'M') ?>
		<?php echo tribe_events_event_recurring_info_tooltip() ?>
	</div>


</div><!-- .tribe-events-event-meta -->
<?php do_action( 'tribe_events_after_the_meta' ) ?>

<div class="tribe-list-content">

<!-- Event Title -->
<?php do_action( 'tribe_events_before_the_event_title' ) ?>
<h2 class="tribe-events-list-event-title summary">
	<a class="url" href="<?php echo tribe_get_event_link() ?>" title="<?php the_title() ?>" rel="bookmark">
		<?php the_title() ?>
	</a>


</h2>

<?php do_action( 'tribe_events_after_the_event_title' ) ?>

<hr>


<!-- Event Content -->
<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
	<p class="metas"><?php echo 'De '.tribe_get_start_date(null, false, 'h').'h à '.tribe_get_end_date(null, false, 'h').'h'; ?><?php echo get_field('recurrence') ? ' <em>Evénement récurrent</em>' : NULL; ?></p>
	<?php the_excerpt(); ?>
	<a href="<?php echo tribe_get_event_link() ?>" class="tribe-events-read-more" rel="bookmark"><?php _e( 'En savoir plus', 'tribe-events-calendar' ) ?> &raquo;</a>
</div><!-- .tribe-events-list-event-description -->
<?php do_action( 'tribe_events_after_the_content' ) ?>

</div>
