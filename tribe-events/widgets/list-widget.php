<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 * @since  2.1
 * @author Modern Tribe Inc.
 *
 */
if ( !defined('ABSPATH') ) { die('-1'); }

$events_label_plural = tribe_get_event_label_plural();
$events_label_plural_lowercase = tribe_get_event_label_plural_lowercase();
$posts = tribe_get_list_widget_events();

//Check if any posts were found
if ( $posts ) : ?>

<ol class="hfeed vcalendar">
<?php
	foreach( $posts as $post ) :
		setup_postdata( $post );
?>
	<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">

		<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
		<!-- Event Title -->
<!-- 		<h4 class="entry-title summary">
			<a href="<?php echo tribe_get_event_link(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h4>
		 -->
		<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
		<!-- Event Time -->

		<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

		<div class="duration">
			<?php echo tribe_get_start_date(null, false, 'd'); ?>
			<em><?php echo tribe_get_start_date(null, false, 'M'); ?></em>
		</div>

		<div class="about">
			<a href="<?php echo tribe_get_event_link(); ?>" rel="bookmark">
				<h4 class="entry-title summary"><?php the_title(); ?></h4>
				<hr>
				<p><?php echo customExcerpt(get_the_excerpt()); ?></p>
			</a>
		</div>

		<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>


	</li>
<?php
	endforeach;
?>
</ol><!-- .hfeed -->

<p class="tribe-events-widget-link">
    <a href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( esc_html__( 'View All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
</p>

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), $events_label_plural_lowercase ); ?></p>
<?php
endif;
