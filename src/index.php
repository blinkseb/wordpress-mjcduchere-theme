<?php
/**
 * Wordpress theme used by the MJC la Duchère website:
 *	http://www.mjcduchere.fr
 *
 * Sources can be found on github:
 *  https://github.com/blinkseb/wordpress-mjcduchere-theme
 *
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Loads the WordPress Environment and Template */
require('./wp-blog-header.php');

?>

<?php get_header(); ?>

	<?php $query = new WP_Query( array( 'post_type' => 'page', 'name' => 'actualites' )); ?>
	<?php if ($query->have_posts()) : ?><?php while ( $query->have_posts() ) : $query->the_post(); ?>
	<h1><?php the_title();  ?></h1>
	<p class="chapo"><?php echo customExcerpt(get_the_content(), 40);  ?></p>
    <?php endwhile; ?><?php endif; wp_reset_query(); ?>

<?php if (get_field('filtre_actus', 'option')) : ?><div class="filtre-couleur <?php echo get_field('opacite_actus', 'option') ? get_field('opacite_actus', 'option') : NULL; ?>" style="background: <?php echo get_field('couleur_actus', 'option'); ?> "></div><?php endif; ?>

</header>

<section id="container">

	<div id="archive-actus" >

	<?php if (have_posts()) : ?>

		    <?php while ( have_posts() ) : the_post(); ?>

		       	<div class="actu">
			       	<a href="<?php echo get_permalink(); ?>">
			       	<?php the_post_thumbnail('actualite-rectangle'); ?>
					<date><?php the_date('d F Y'); ?></date>
					<h2><?php the_title(); ?></h2>
					<div class="clear"></div>
					<?php the_excerpt(); ?>
					<hr>
					</a>
				</div>

		    <?php endwhile; ?>

		   	<?php twentyfourteen_paging_nav(); ?>

		<?php endif; ?>

	</div>


	<aside id="sidebar-actus" >

		<?php get_sidebar('actus'); ?>

	</aside>

	<div class="clear"></div>

</section>

<?php get_footer(); ?>
