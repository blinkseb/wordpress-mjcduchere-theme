<?php
/*
Template Name: Vierge
*/
?>

<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?> >

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php wp_title('|'); echo tribe_is_list_view() ? 'MJC de la Duchère' : NULL; ?></title>
    <meta name="viewport" content="width=device-width">

    
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/knacss.css">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/css/screen.css">
    <link href="<?php bloginfo('template_directory'); ?>/css/jquery.bxslider.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico">
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

</head>

<div id="page_wrap" class="container">
	<div id="content960">

		<?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

       		<h1>MJC la Duchère <em>!</em></h1>
       		<p><?php echo get_the_content(); ?></p>

    	<?php endwhile;  ?>
    <?php endif; ?>

	</div>

</div>

