<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('|'); echo tribe_is_list_view() ? 'MJC de la Duchère' : null; ?></title>
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
      integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/knacss.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/screen.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <link rel=apple-touch-icon sizes=57x57 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-57x57.png">
    <link rel=apple-touch-icon sizes=114x114 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-114x114.png">
    <link rel=apple-touch-icon sizes=72x72 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-72x72.png">
    <link rel=apple-touch-icon sizes=144x144 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-144x144.png">
    <link rel=apple-touch-icon sizes=60x60 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-60x60.png">
    <link rel=apple-touch-icon sizes=120x120 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-120x120.png">
    <link rel=apple-touch-icon sizes=76x76 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-76x76.png">
    <link rel=apple-touch-icon sizes=152x152 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon-152x152.png">
    <link rel=apple-touch-icon sizes=152x152 href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png">
    <link rel=icon type="image/png" href="<?php bloginfo('template_directory'); ?>/img/faviconmjc64.png" sizes=64x64>
    <link rel=icon type="image/png" href="<?php bloginfo('template_directory'); ?>/img/faviconmjc16.png" sizes=16x16>
    <link rel=icon type="image/png" href="<?php bloginfo('template_directory'); ?>/img/faviconmjc32.png" sizes=32x32>

    <!--[if lt IE 9]><script>window.location = "http://mjcduchere.fr/ooops";</script><![endif]-->

<?php wp_head() ?>

</head>

<body>

<div id="page_wrap" class="container <?php echo $wp_query->get_queried_object()->post_type; ?>">

<?php

while (have_posts()) : the_post();
    $bg = wp_get_attachment_image_src(get_post_thumbnail_id(), 'header');
    $bg = !empty($bg) ? 'url('.$bg[0].') no-repeat center; background-size: cover; ' : null;
endwhile;

if (tribe_is_event()) {
    $bg = get_field('couverture_evenements', 'option');
    $bg = wp_get_attachment_image_src($bg, 'header');
    $bg = 'url('.$bg[0].') no-repeat center; background-size: cover; ';
} elseif (is_post_type_archive('activites')) {
    $bg = get_field('couverture_activites', 'option');
    $bg = wp_get_attachment_image_src($bg, 'header');
    $bg = 'url('.$bg[0].') no-repeat center; background-size: cover; ';
    $id = 'head-activite';
} elseif (is_tax('type')) {
    $bg = get_field('couverture_types', 'option');
    $bg = wp_get_attachment_image_src($bg, 'header');
    $bg = 'url('.$bg[0].') no-repeat center; background-size: cover; ';
    $id = 'head-activite';
} elseif (is_singular('activites')) {
    $id = 'head-activite';
} elseif (is_home()) {
    $bg = get_field('couverture_actus', 'option');
    $bg = wp_get_attachment_image_src($bg, 'header');
    $bg = 'url('.$bg[0].') no-repeat center; background-size: cover; ';
}

?>

<header class="w100 <?php echo is_page('infos-pratiques') ? null : 'header-page';  echo !empty($id) ? ' '.$id : null; ?>" <?php echo !empty($bg) ? 'style="background: '.$bg.'"' : null; ?> >

    <div class="header-mobile">
        <a href="/" class="titre">MJC la Duchère <em>!</em></a>
        <a class="btn-mobile off" href=""></a>
    </div>

    <?php wp_nav_menu(array( 'theme_location'  => '', 'menu' => 'principal')); ?>

    <div id="logo">
        <a href="/"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png"/></a>
    </div>

    <div class="clear"></div>
