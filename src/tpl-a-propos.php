<?php
/*
Template Name: A propos
*/
?>

<?php get_header();?>

<h1>La MJC</h1>

<p class="chapo"><?php the_field('chapo'); ?></p>


<nav class="sous-nav sous-nav-about">
	<ul>
		<li><a class="tab on" data-typ="pres" href= "">Présentation</a></li>
		<li><a class="tab" data-typ="hist" href= "">Historique</a></li>
		<li><a class="tab" data-typ="equip" href= "">L'équipe</a></li>
	</ul>
</nav>


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

<div class="clear"></div>

</header>


<section id="pres" class="onglet on">

	<h2>Présentation</h2>
	<p><?php the_field('presentation'); ?></p>

</section>


<section id="hist" class="onglet">

	<h2>Historique</h2>
	<p><?php the_field('historique'); ?></p>

</section>


<section id="equip" class="onglet">

<h2>L'équipe permanente</h2>

<p class="introduction"><?php echo get_field('introduction'); ?></p>

<ul class="permanente">
	<?php 

	if( have_rows('equipe') ):

		$membres_conseil = array();

		$membres_droit = array();
 
	    while ( have_rows('equipe') ) : the_row();
	 
	        if( get_row_layout() == 'membre_permanent' ): 

	        $portrait = wp_get_attachment_image_src(get_sub_field('photo'), 'miniature-carre');

	        ?>

	        	<li>
					<div class="img"><img src="<?php echo $portrait[0]; ?>"/></div>
					<p class="nom"><?php the_sub_field('nom'); ?></p>
					<p class="fonction"><?php the_sub_field('fonction'); ?></p>
				</li>
	 
	        <?php elseif( get_row_layout() == 'membre_conseil' ) :

	        	array_push($membres_conseil, get_sub_field('nom'));

	        elseif( get_row_layout() == 'membre_droit' ) :

	        	array_push($membres_droit, get_sub_field('nom'));
	 
	        endif;
	 
	    endwhile;
 
	else :
	 
	 
	endif;
 
	?>
</ul>

<div class="clear"></div>
	

<div class="admin">

<h3>Les membres du conseil d'administration :</h3>

<ul>
	<?php foreach ($membres_conseil as $k => $v) : ?>

	<li><?php echo $v; ?></li>

	<?php endforeach; ?>
</ul>

</div><!--


--><div class="droit">

<h3>Les membres de droit :</h3>

<ul>
	<?php foreach ($membres_droit as $k => $v) : ?>

	<li><?php echo $v; ?></li>

	<?php endforeach; ?>
</ul>

<div>

</section>
	
	

<?php get_footer();?>

    
           
</div>

        

