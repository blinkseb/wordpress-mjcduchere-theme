<?php get_header(); ?>
<?php if (have_posts()) : ?>
<h1><?php $terms = get_the_terms(get_the_ID(), 'type'); foreach($terms as $term){ echo $term->name; } ?></h1>
<p class="chapo"><?php echo get_field('chapo_types', 'option'); ?></p>
<?php endif; ?>

<?php if (get_field('filtre_types', 'option')) : ?><div class="filtre-couleur" style="background: <?php echo get_field('couleur_types', 'option'); ?> "></div><?php endif; ?>


</header>

<div id="sommaire">

        <ul>

         <?php if (have_posts()) : ?>

            <?php while(have_posts()) : the_post();

                if(get_field('filtre_photo') == 'Par défaut'){
                    $filtre = '#8E52A1';
                }else if(get_field('filtre_photo') == 'Bleu'){
                    $filtre = '#1AADDB';
                }else if(get_field('filtre_photo') == 'Violet'){
                    $filtre = '#8E52A1';
                }else if(get_field('filtre_photo') == 'Personnalisé'){
                    $filtre = get_field('couleur_personnalisee');
                }

                $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'activite-carre');
            ?>
               <li class="item bloc"><a href="<?php the_permalink(); ?>" ><span style="background:<?php echo $filtre; ?>"><?php the_title(); ?></span><img src="<?php echo $img[0]; ?>"/></a></li>
        

            <?php endwhile; ?>
        <?php endif; ?>
        </ul>

    <div class="clear"></div>
</div>

<div class="clear"></div>

<?php get_footer(); ?>