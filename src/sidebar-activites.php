
<ul>
	<?php $ages = (array) get_terms('age', array('orderby'=>'slug'));

	foreach($ages as $k => $v) :
		$age = new WP_Query( array(
		'post_type' => 'activites',
		'age' => $v->slug,
		'posts_per_page' => 200
		 ));
	?>

	<li>
		<span class="cat off" href="">Activités <?php echo $v->name; ?> <?php echo !empty($v->description) ? '<span>'.$v->description.'</span>' : NULL; ?></span>
		<ul>
		<?php if($age->have_posts()) : ?>
			<?php while ( $age->have_posts() ) : $age->the_post(); ?>

			<li><a href="<?php echo get_site_url().'/activites/'.get_page_uri($post->ID); ?>"><?php the_title(); ?></a></li>
			<?php endwhile; wp_reset_postdata(); ?>
		<?php endif; ?>
		</ul>
	</li>

	<?php endforeach; ?>

</ul>
