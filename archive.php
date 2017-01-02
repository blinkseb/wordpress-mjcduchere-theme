<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
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

<h1>Actualités</h1>

<p class="chapo"><?php echo eto_get_option('eto_chapo_actus'); ?></p>

<nav class="sous-nav sous-nav-header">
	<ul>
	<li><a href="../evenements">Événements</a></li>
	<li><a href=""  class="actif">Actualités</a></li>
	</ul>
</nav>

<div class="filtre-couleur" style="background: #<?php echo eto_get_option('eto_color_filtre_actus'); ?>"></div>

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