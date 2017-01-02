<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template' 
 * is selected in Events -> Settings -> Template -> Events Template.
 * 
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/default-template.php
 *
 * @package TribeEventsCalendar
 * @since  3.0
 * @author Modern Tribe Inc.
 *
 */

if ( !defined('ABSPATH') ) { die('-1'); }

get_header(); ?>

<?php if(is_single()) : ?>

	<div class="titre-evenement">
		<h1><?php the_title(); ?></h1>
		<?php if(tribe_get_start_date(null, false, 'd M') !== tribe_get_end_date(null, false, 'd M')) : ?>
		<date><?php echo tribe_get_start_date(null, false, 'd').' au '.tribe_get_end_date(null, false, 'd M')?></date>
		<?php else : ?>
		<date><?php echo tribe_get_start_date(null, false, 'd M')?></date>
		<?php endif; ?>
	</div>

	<nav class="sous-nav sous-nav-event">
		<ul>
			<li><a class="tab on" data-typ="description" href="">Description</a></li>
			<?php if( have_rows('informations') ): while ( have_rows('informations') ) : the_row();
		   		if( get_row_layout() == 'info' ): ?>
				<li ><a class="tab" data-typ="<?php echo sanitize_title(get_sub_field('titre')); ?>" href=""><?php the_sub_field('titre'); ?></a></li>
				<?php endif;
			endwhile; endif; ?>
		</ul>
		<div class="clear"></div>
	</nav>


<?php 

if(get_field('filtre_photo') == 'Par défaut'){
	$filtre = "#66A29C";
}else if(get_field('filtre_photo') == 'Bleu'){
	$filtre = '#1AADDB';
}else if(get_field('filtre_photo') == 'Violet'){
	$filtre = '#8E52A1';
}else if(get_field('filtre_photo') == 'Personnalisé'){
	$filtre = get_field('couleur_personnalisee');
}

?>
<div class="filtre-couleur" style="background: <?php echo $filtre; ?>"></div>


<?php else : ?>


<h1><?php echo get_field('titre_evenements', 'option');  ?></h1>

<p class="chapo"><?php echo get_field('chapo_evenements', 'option'); ?></p>

<?php if (get_field('filtre_evenements', 'option')) : ?><div class="filtre-couleur <?php echo get_field('opacite_evenement', 'option') ? get_field('opacite_evenement', 'option') : NULL; ?>" style="background: <?php echo get_field('couleur_evenements', 'option'); ?> "></div><?php endif; ?>

<?php endif; ?>

</header>

<div id="tribe-events-pg-template">
	<?php tribe_events_before_html(); ?>
	<?php tribe_get_view(); ?>
	<?php tribe_events_after_html(); ?>
</div> <!-- #tribe-events-pg-template -->


<?php get_footer(); ?>