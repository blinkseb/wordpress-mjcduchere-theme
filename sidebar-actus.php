<div class="titlebar">

	<h2>Événements à venir</h2>
	<hr>

</div>

<div class="clear"></div>

<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('actus') ) : ?>

 
<?php endif; ?>
</ul>

<div class="social">

	<div class="bloc newsletter">
		<h2>La newsletter</h2>
		<hr>
		<p><?php echo get_field('texte_newsletter', 'option'); ?></p>

		<?php echo do_shortcode( '[contact-form-7 id="667" title="Inscription à la newsletter"]' ); ?>

	</div>

	<div class="bloc reseaux">
		<h2>Réseaux sociaux</h2>
		<hr>
		<div class="clear"></div>
		<div class="btn-social">
			<a class="facebook-a" target="blank" href="<?php echo get_field('facebook', 'option'); ?>"><span></span>La MJC</a><!--
			--><a class="facebook-b" target="blank" href="<?php echo get_field('facebook_jeunes', 'option'); ?>"><span></span>Secteur Jeunes</a><!--
			--><a class="youtube" target="blank" href="<?php echo get_field('youtube', 'option'); ?>"><span></span>Vidéos</a><!--
			--><a class="flickr" target="blank" href="<?php echo get_field('flickr', 'option'); ?>"><span></span>Photos</a>
		</div>
	</div>
	
</div>