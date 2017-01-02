<?php


/**************/
/*  Sidebars  */
/**************/

if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'name' => 'Home',
        'id' => 'home'
    ));
    register_sidebar(array(
        'name' => 'Actualités',
        'id' => 'actus'
    ));
    register_sidebar(array(
        'name' => 'Evénement',
        'id' => 'event'
    ));
}

/***********/
/*  Menus  */
/***********/

function custom_navigation_menus()
{
    $locations = array(
        'menu' => 'Le menu principal',
        'menu-footer' => 'Menu du footer'
    );
    register_nav_menus($locations);
}

// Hook into the 'init' action
add_action('init', 'custom_navigation_menus');


/************************/
/*  Custom image sizes  */
/************************/

add_theme_support('post-thumbnails');
add_image_size('actualite-carre', 426, 426, true);
add_image_size('activite-carre', 214, 214, true);
add_image_size('miniature-carre', 100, 100, true);
add_image_size('actualite-rectangle', 700, 300, true);
add_image_size('header', 1280, 500, true);
add_image_size('photo-galerie', 1200, 800, false);
add_image_size('logo-footer', 44, 44, false);
add_image_size('facebook', 1200, 630, true);



/*********************/
/*  Number of posts  */
/*********************/


function my_post_queries($query)
{
    // not an admin page and it is the main query
  if (!is_admin() && $query->is_main_query()) {
      if (is_tax()) {
          // show 50 posts on custom taxonomy pages
      $query->set('posts_per_page', 200);
      }
  }
}
add_action('pre_get_posts', 'my_post_queries');




/*********************/
/*  Custom excerpts  */
/*********************/

function new_excerpt_length($length)
{
    return 25;
}
add_filter('excerpt_length', 'new_excerpt_length');

function new_excerpt_more($more)
{
    return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function customExcerpt($txt, $len=20)
{
    $tab=str_word_count($txt, 2);
    $mot=array_keys($tab);
    if (count($mot)>$len) {
        $txt = substr($txt, 0, $mot[$len]);
        $txt .= '…';
    } else {
        $txt = $txt;
    }
    return $txt;
}


/****************/
/*  Post types  */
/****************/

add_action('init', 'register_my_cpt_activites', 10);
function register_my_cpt_activites()
{
    register_post_type("activites", array(
  'labels' =>
  array(
    'name' => 'Activités',
    'singular_name' => 'Activité',
    'add_new' => 'Ajouter',
    'add_new_item' => 'Ajouter une nouvelle activité',
    'edit_item' => 'Modifier l\'activité',
    'new_item' => 'Nouvelle activité',
    'view_item' => 'Voir l\'activité',
    'search_items' => 'Chercher une activité',
    'not_found' => 'Aucune activité trouvée',
    'not_found_in_trash' => 'Aucune activité trouvée dans la corbeille',
    'parent_item_colon' => 'Activité parente:',
  ),
  'description' => '',
  'publicly_queryable' => true,
  'exclude_from_search' => false,
  'map_meta_cap' => true,
  'capability_type' => 'post',
  'public' => true,
  'hierarchical' => false,
  'rewrite' =>
  array(
    'slug' => 'activites',
    'with_front' => true,
    'pages' => true,
    'feeds' => 'activites',
  ),
  'has_archive' => 'activites',
  'query_var' => 'activites',
  'supports' =>
  array(
    0 => 'title',
    1 => 'editor',
    2 => 'thumbnail',
  ),
  'taxonomies' =>
  array(
    0 => 'type',
  ),
  'show_ui' => true,
  'menu_position' => 30,
  'menu_icon' => false,
  'can_export' => true,
  'show_in_nav_menus' => true,
  'show_in_menu' => true,
));
}

/****************/
/*  Taxonomies  */
/****************/


// Ages

add_action('init', 'register_my_taxo_age', 10);
function register_my_taxo_age()
{
    register_taxonomy("age", array(
  0 => 'activites',
), array(
  'hierarchical' => '1',
  'update_count_callback' => '_update_post_term_count',
  'rewrite' =>
  array(
    'slug' => 'age',
    'with_front' => true,
    'hierarchical' => false,
  ),
  'query_var' => 'age',
  'public' => true,
  'show_ui' => true,
  'show_tagcloud' => true,
  'labels' =>
  array(
    'name' => 'Ages',
    'singular_name' => 'Age',
    'search_items' => 'Chercher un âge',
    'popular_items' => 'Ages populaires',
    'all_items' => 'Tous les ages',
    'parent_item' => 'Age parent',
    'parent_item_colon' => 'Age parent :',
    'edit_item' => 'Modifier l\'âge',
    'view_item' => 'View age',
    'update_item' => 'Mettre à jour l\'âge',
    'add_new_item' => 'Ajouter un nouvel âge',
    'new_item_name' => 'Nouveau nom d\'âge',
    'separate_items_with_commas' => 'Séparer les âges avec une virgule',
    'add_or_remove_items' => 'Ajouter ou supprimer des âges',
    'choose_from_most_used' => 'Choisir parmi les âges les plus utilisés',
  ),
  'capabilities' =>
  array(
    'manage_terms' => 'manage_categories',
    'edit_terms' => 'manage_categories',
    'delete_terms' => 'manage_categories',
    'assign_terms' => 'edit_posts',
  ),
  'show_in_nav_menus' => true,
));
}

//Types d'activité

add_action('init', 'register_my_taxo_type', 10);
function register_my_taxo_type()
{
    register_taxonomy("type", array(
  0 => 'activites',
), array(
  'hierarchical' => '1',
  'update_count_callback' => '_update_post_term_count',
  'rewrite' =>
  array(
    'slug' => 'type',
    'with_front' => true,
    'hierarchical' => false,
  ),
  'query_var' => 'type',
  'public' => true,
  'show_ui' => true,
  'show_tagcloud' => true,
  'labels' =>
  array(
    'name' => 'Types',
    'singular_name' => 'Type',
    'search_items' => 'Chercher un type',
    'popular_items' => 'Types populaires',
    'all_items' => 'Tous les types',
    'parent_item' => 'Type parent',
    'parent_item_colon' => 'Type parent :',
    'edit_item' => 'Modifier le type',
    'view_item' => 'View typ',
    'update_item' => 'Mettre à jour le type',
    'add_new_item' => 'Ajouter un nouveau type',
    'new_item_name' => 'Nouveau nom de type',
    'separate_items_with_commas' => 'Séparer les types avec une virgule',
    'add_or_remove_items' => 'Ajouter ou supprimer des types',
    'choose_from_most_used' => 'Choisir parmi les types les plus utilisés',
  ),
  'capabilities' =>
  array(
    'manage_terms' => 'manage_categories',
    'edit_terms' => 'manage_categories',
    'delete_terms' => 'manage_categories',
    'assign_terms' => 'edit_posts',
  ),
  'show_in_nav_menus' => true,
));
}

/*************/
/*  Scripts  */
/*************/

function mjc_scripts() {

    wp_register_script('modernizr', get_bloginfo('template_directory').'/js/modernizr.custom.js', false, null, true);
    wp_register_script('main', get_bloginfo('template_directory').'/js/main.js', array('modernizr', 'jquery'), null, true);

    if (is_page('accueil')) {
        wp_register_script('home', get_bloginfo('template_directory').'/js/home.js', array('main'), null, true);
    } elseif (is_singular('activites') || is_archive('activites')) {
        wp_register_script('activites', get_bloginfo('template_directory').'/js/activites.js', false, null, true);
        wp_register_script('gallery', get_bloginfo('template_directory').'/js/jquery.fancybox.pack.js?v=2.1.5', array('jquery'), null, true);
    }

    wp_enqueue_script('gallery');

    wp_enqueue_script('main');
    wp_enqueue_script('home');
    wp_enqueue_script('activites');
}

add_action('wp_enqueue_scripts', 'mjc_scripts', 100);


/****************/
/*  Pagination  */
/****************/

if (! function_exists('twentyfourteen_paging_nav')) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return void
 */
function twentyfourteen_paging_nav()
{
    // Don't print empty markup if there's only one page.
    if ($GLOBALS['wp_query']->max_num_pages < 2) {
        return;
    }

    $paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
    $pagenum_link = html_entity_decode(get_pagenum_link());
    $query_args   = array();
    $url_parts    = explode('?', $pagenum_link);

    if (isset($url_parts[1])) {
        wp_parse_str($url_parts[1], $query_args);
    }

    $pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
    $pagenum_link = trailingslashit($pagenum_link) . '%_%';

    $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
    $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit('page/%#%', 'paged') : '?paged=%#%';

    // Set up paginated links.
    $links = paginate_links(array(
        'base'     => $pagenum_link,
        'format'   => $format,
        'total'    => $GLOBALS['wp_query']->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map('urlencode', $query_args),
        'prev_text' => __('&larr; Précédent', 'twentyfourteen'),
        'next_text' => __('Suivant &rarr;', 'twentyfourteen'),
    ));

    if ($links) :

    ?>
    <nav class="navigation paging-navigation" role="navigation">
        <div class="pagination loop-pagination">
            <?php echo $links; ?>
        </div><!-- .pagination -->
    </nav><!-- .navigation -->
    <?php
    endif;
}
endif;


/******************************/
/*  Get url with resized img  */
/******************************/


function url_resize($url, $size)
{
    $url_len = strlen($url);
    $ext = substr($url, $url_len-4, $url_len);
    $new_url = substr($url, 0, $url_len-4).'-'.$size.$ext;
    return $new_url;
}


/**************************************/
/* Suppression des fonctions inutiles */
/**************************************/

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support()
{
    $post_types = get_post_types();

    foreach ($post_types as $post_type) {
        if (post_type_supports($post_type, 'comments')) {
            remove_post_type_support($post_type, 'comments');
            remove_post_type_support($post_type, 'trackbacks');
        }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status()
{
    return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments)
{
    $comments = array();
    return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu()
{
    remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');


// Supression sdes taxonomies par défaut(tags + catégories)
add_action('init', 'gkp_remove_default_taxonomies');
function gkp_remove_default_taxonomies()
{
    register_taxonomy('category', array());
    register_taxonomy('post_tag', array());
}





/****************/
/*  Menu Admin  */
/****************/

// Supprime l'élément événement de la top bar admin

function remove_admin_bar_links()
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('tribe-events');
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');


// Supprime le sous menu Réglage > Médias

function sgr_filter_image_sizes($sizes)
{
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['large']);
    return $sizes;
}

add_filter('intermediate_image_sizes_advanced', 'sgr_filter_image_sizes');

function my_remove_menu_pages()
{
    remove_submenu_page('options-general.php', 'options-media.php');
}

add_action('admin_menu', 'my_remove_menu_pages');


// Défini une taille d'image pour Facebook

function sc_opengraph_image_size($size="medium")
{
    return "facebook";
}
add_filter('wpseo_opengraph_image_size', 'sc_opengraph_image_size', 10, 1);
