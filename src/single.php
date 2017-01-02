<?php get_header(); ?>

<h1>Actualités</h1>
<p class="chapo"><?php echo get_field('chapo_actus', 'option');  ?></p>


<?php

if (get_field('filtre_photo') == 'Par défaut') {
    $filtre = "#66A29C";
} elseif (get_field('filtre_photo') == 'Bleu') {
    $filtre = '#1AADDB';
} elseif (get_field('filtre_photo') == 'Violet') {
    $filtre = '#8E52A1';
} elseif (get_field('filtre_photo') == 'Personnalisé') {
    $filtre = get_field('couleur_personnalisee');
}

?>

<div class="filtre-couleur <?php echo get_field('opacite') ? get_field('opacite') : null; ?>" style="background: <?php echo $filtre; ?>"></div>

</header>


<div id="container">

<article id="single-actu">

<a class="retour" href="<?php echo get_bloginfo('siteurl').'/actualites'?>">Retour aux actualités</a>

<?php if (have_posts()) : ?>

	<?php while (have_posts()) : the_post();  ?>
	<date><?php the_date('d F Y'); ?></date>
	<h1><?php the_title(); ?></h1>
	<div class="clear"></div>

	<p><?php the_content(); ?></p>

	<?php endwhile; ?>

<?php endif; ?>

</article>

<aside id="sidebar-actus" >

	<?php get_sidebar('actus'); ?>

</aside>

</div>

<div class="clear"></div>




<?php get_footer(); ?>
