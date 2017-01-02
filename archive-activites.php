<?php get_header(); ?>

<h1><?php echo get_field('titre_activites', 'option');  ?></h1>

<p class="chapo"><?php echo get_field('chapo_activites', 'option'); ?></p>

<?php if (get_field('filtre_activites', 'option')) : ?><div class="filtre-couleur <?php echo get_field('opacite_activites', 'option') ? get_field('opacite_activites', 'option') : NULL; ?>" style="background: <?php echo get_field('couleur_activites', 'option'); ?> "></div><?php endif; ?>

</header>

<aside id="filtres"><?php get_sidebar('activites'); ?></aside>

<div id="list-activites">

    <?php
    $activites = new WP_Query( array(
            'post_type' => 'activites',
            'posts_per_page' => 200
             ));

    $ordered_list = array();


	 if (have_posts()) : ?>
        <?php 
        while ($activites->have_posts()) : $activites->the_post();
        $types = get_the_terms( $post->ID, 'type' ); 
	   	$types =  (array) $types;

	   	foreach($types as $value) { 

            $term_id = !empty($value->term_id) ? $value->term_id : '0';

            $data = array(
                'id' => 'type_'.$term_id,
                'title' => get_the_title(),
                'permalink' => get_permalink(),
                'color' => get_field('category_color', 'type_'.$term_id),
                'src' => wp_get_attachment_image_src(get_post_thumbnail_id(), 'activite-carre')
                );

            $ordered_list[$term_id] = !empty($ordered_list[$term_id]) ? $ordered_list[$term_id] : array();

            array_push($ordered_list[$term_id], $data);

        }
     
     endwhile; wp_reset_postdata(); ?>
    <?php endif; 

    foreach ($ordered_list as $type => $posts) : 

        foreach($posts as $p) : ?>
        <a  href="<?php echo $p['permalink']; ?>" class="activite <?php echo $p['id']; ?>"><span style="background: <?php echo get_field('category_color', $p['id']); ?>"><?php echo $p['title']; ?></span><img src="<?php echo $p['src'][0]; ?>" /></a> 
        <?php endforeach;
    
    endforeach; ?>

    <div class="clear"></div>
</div>

<div class="clear"></div>

<?php get_footer(); ?>