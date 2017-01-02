<?php get_header(); ?>

<?php while(have_posts()) : the_post(); 

		$public = get_the_terms( $post->ID, 'age' ); 

	   	if(!empty($public)){

		   	$public =  (array) $public;
		   	foreach($public as $value) { $str_public = $str_public.' '.$value->name.', '; }
		   	$str_public = substr($str_public, 0, -2); 
	   	}   

	   	$types = get_the_terms( $post->ID, 'type' ); 
	   	$types =  (array) $types;
	   	foreach($types as $value){ $term_id = $value->term_id; }

?>

<?php endwhile; ?>

<div class="titre-activite">
	<h1 ><?php echo get_the_title(); ?></h1>
	<?php if(isset($str_public)) : ?><p class="public"><?php echo $str_public; ?></p><?php endif; ?>
</div>

<?php 

if(get_field('filtre_photo') == 'Par défaut'){
	$filtre = get_field('category_color', 'type_'.$term_id);
}else if(get_field('filtre_photo') == 'Bleu'){
	$filtre = '#1AADDB';
}else if(get_field('filtre_photo') == 'Violet'){
	$filtre = '#8E52A1';
}else if(get_field('filtre_photo') == 'Personnalisé'){
	$filtre = get_field('couleur_personnalisee');
}

?>

<div class="filtre-couleur" style="background: <?php echo $filtre; ?>"></div>


</header>


<aside id="filtres">
<?php get_sidebar('activites'); ?>
</aside>


<nav class="sous-nav sous-nav-activites">
	<ul>
		<?php if(get_field('description') )  : ?><li><a class="tab on" data-typ="desc" href= "">Description</a></li><?php endif; ?>
		<?php if(get_field('tarifs_et_horaires') )  : ?><li><a class="tab" data-typ="infos" href= "">Tarifs et horaires</a></li><?php endif; ?>
		<?php if(get_field('photos') )  : ?><li><a class="tab" data-typ="photos" href= "">Photos</a></li><?php endif; ?>
		<?php if(get_field('inscription') )  : ?><li><a class="tab" data-typ="inscription" href= "">Comment s'inscrire</a></li><?php endif; ?>
	</ul>
</nav>



<?php if(get_field('description') )  : ?>

<section id="desc" class="onglet onglet-activite on">
	<h2>Description</h2>
	<p><?php the_field('description'); ?></p>
</section>

<?php endif; ?>



<?php if(get_field('tarifs_et_horaires') )  : ?>

<section id="infos" class="onglet onglet-activite ">
	<h2>Tarifs et horaires</h2>
	<p><?php the_field('tarifs_et_horaires'); ?></p>
</section>

<?php endif; ?>


<?php if(get_field('photos') )  : ?>
<section id="photos" class="onglet onglet-activite ">
	<h2>Photos</h2>
	<?php
		if( have_rows('photos') ):
		    while ( have_rows('photos') ) : the_row();
		        if( get_row_layout() == 'photo' ):
		        	$img_large= wp_get_attachment_image_src(get_sub_field('image'), 'photo-galerie');
		        	$img_thumb= wp_get_attachment_image_src(get_sub_field('image'), 'activite-carre');
				?>

				<a class="fancybox" rel="group" href="<?php echo $img_large[0]; ?>"><span class="filtre-type photo"></span><img src="<?php echo $img_thumb[0]; ?>" alt="" /></a>

				<?php elseif( get_row_layout() == 'video' ): 
					$img_thumb = wp_get_attachment_image_src(get_sub_field('image'), 'activite-carre');
					$video = '//www.youtube.com/embed/'.get_sub_field('lien');
				?>
		        <a class="fancybox fancybox.iframe" href="<?php echo $video; ?>"><span class="filtre-type video"></span><img src="<?php echo $img_thumb[0]; ?>" alt="" /></a>
				<?php
		        endif;
		    endwhile;
		endif;
	?>

</section>

<?php endif; ?>



<?php if(get_field('inscription') )  : ?>

<section id="inscription" class="onglet onglet-activite ">

	<h2>Comment s'inscrire ?</h2>

	<p><?php the_field('inscription'); ?></p>

</section>

<?php endif; ?>


<aside id="cplt">
	<div class="img"><?php echo wp_get_attachment_image( get_field('portrait'), 'miniature-carre' ); ?></div>

	<h3><?php the_field('organisateur'); ?></h3>

	<p><?php the_field('presentation'); ?></p>

	<?php if( get_field('nombre_participants') ) : ?><div class="nbr"><p>Nombre de participants par groupe :</p><span><?php the_field('nombre_participants'); ?></span></div><?php endif; ?>

</aside>

<div class="clear"></div>


<?php get_footer(); ?>