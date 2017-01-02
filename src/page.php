<?php get_header(); ?> 

<h1><?php the_title(); ?></H1>
<p class="chapo"><?php the_field('chapo');?></p>

<?php if(get_field('type_presentation') == "onglets") : ?>

<nav class="sous-nav sous-nav-event">
	<ul>
		<?php
		if( have_rows('contenu_onglets') ):
		    while ( have_rows('contenu_onglets') ) : the_row();
		        if( get_row_layout() == 'onglet' ):
				?>

				<li ><a class="tab" data-typ="<?php echo sanitize_title(get_sub_field('titre')); ?>" href=""><?php the_sub_field('titre'); ?></a></li>

				<?php
		        endif;
		    endwhile;
		endif;
		?>

	</ul>

	<div class="clear"></div>
</nav>

<?php endif; ?>

<?php 

if(get_field('filtre_photo')) :

	if(get_field('filtre_photo') == 'Par défaut'){
	    $filtre = '#8E52A1';
	}else if(get_field('filtre_photo') == 'Bleu'){
	    $filtre = '#1AADDB';
	}else if(get_field('filtre_photo') == 'Violet'){
	    $filtre = '#8E52A1';
	}else if(get_field('filtre_photo') == 'Personnalisé'){
	    $filtre = get_field('couleur_personnalisee');
	}

	?>

	<div class="filtre-couleur" style="background: <?php echo $filtre; ?>"></div>

<?php endif; ?>

</header>

<div id="container-flex">

<?php if(get_field('type_presentation') == 'onglets') : ?>

	<?php
	if( have_rows('contenu_onglets') ):
	    while ( have_rows('contenu_onglets') ) : the_row();
	        if( get_row_layout() == 'onglet' ):
			?>
			
			<div id="<?php echo sanitize_title(get_sub_field('titre')); ?>" class='onglet onglet-default'>
				<h2><?php the_sub_field('titre'); ?></h2>
				<?php the_sub_field('contenu_onglet'); ?>
			</div>


			<?php
	        endif;
	    endwhile;
	endif;
?>

<?php elseif( get_field('type_presentation') == 'simple') : ?>

	<?php the_field('contenu_simple'); ?>

<?php endif; ?>

</div>


<?php get_footer(); ?>

        

