<?php
/*
Template Name: Actualités
*/
?>


<?php get_header(); ?>

<h1>Actualités</h1>
<p class="chapo"><?php echo get_field('chapo')?></p>

<?php if(eto_get_option('eto_checkbox_filtre_actus')) :?><div class="filtre-couleur <?php echo get_field('opacite_actus', 'option') ? get_field('opacite_actus', 'option') : NULL; ?>" style="background: #<?php echo eto_get_option('eto_color_filtre_actus'); ?>"></div><?php endif; ?>
</header>

<section id="container">

	<div id="archive-actus" >

	<?php $query = new WP_Query( array('post_type' => 'post', 'posts_per_page' => 3 )); ?>

	<?php if ($query->have_posts()) : ?>
		    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
		        
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

	<aside id="sidebar-actus" ><?php get_sidebar('actus'); ?></aside>

	<div class="clear"></div>

</section>

<?php get_footer(); ?>