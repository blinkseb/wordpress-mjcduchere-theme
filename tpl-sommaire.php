<?php
/*
Template Name: Sommaire
*/
?>

<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<p class="chapo"><?php echo get_the_excerpt(); ?></p>

<?php 

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

</header>

<div id="sommaire">

        <ul>

         <?php 

            // Liste d'items du sommaire à partir du sous menu

            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object( $locations[ 'menu'] );
            $items = wp_get_nav_menu_items($menu->term_id);
            $page_object = get_queried_object();
            $page_id = get_queried_object_id();    
            $menuID = 0;
            $submenu = array();  


            // On identifie l'élément de menu concerné
            
            foreach($items as $item){
            $menuPageID = $item->object_id;

            if((int) $page_id == (int) $menuPageID){
            $menuID = $item->ID;

            }
            }

            // On recherche les éléments de sous menu liés

            foreach($items as $item){
            $menuPageID = $item->object_id;
            if((int) $item->menu_item_parent == $menuID){
                array_push($submenu, $item);
            }
            }   

            // On les affiche

            if (!empty($submenu)) { 
            foreach($submenu as $el){
                $img_id = get_post_thumbnail_id( $el->object_id );
                $img = wp_get_attachment_image_src($img_id, 'activite-carre');
               echo '<li class="item bloc"><a href="'.$el->url.'" ><span style="background:'.$filtre.'">'.$el->title.'</span><img src="'.$img[0].'"/></a>'; echo '</li>';
            }
            }

        ?>
        </ul>

    <div class="clear"></div>
</div>

<div class="clear"></div>

<?php get_footer(); ?>