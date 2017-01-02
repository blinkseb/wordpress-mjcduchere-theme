<div class="titlebar">

	<h2>Événements à venir</h2>
	<hr>

</div>

<div class="clear"></div>

<ul>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('event') ) : ?>


<?php endif; ?>
</ul>


<div class="bloc social">
		<h2>La newsletter</h2>
		<hr>
		<p><?php echo get_field('texte_newsletter', 'option'); ?></p>

		<?php echo do_shortcode( '[contact-form-7 id="667" title="Inscription à la newsletter"]' ); ?>

</div>


<div class="bloc actus">

	<h2>Actualites</h2>
	<hr>

	<?php

			$query = new WP_Query( array(
				'post_type' => 'post',
				'posts_per_page' => 4
				 ));

			if ( $query->have_posts() ) : ?>

			<ul>

		    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

		        <li><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></li>

		    <?php endwhile; ?>

			</ul>

		<?php endif; ?>

	<p class="tribe-events-widget-link"><a href="">Voir les actualités liées</a></p>


</div>
