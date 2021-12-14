<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- font awesome -->
    <!-- <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"> -->
    <!-- slick-css -->
    <!-- <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="slick/slick.css"> -->
    <!-- css -->
    <?php wp_head(); ?>
    <!-- jQuery -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js" defer></script> -->
    <!-- slick-js -->
    <!-- <script src="slick/slick.min.js" type="text/javascript" charset="utf-8" defer></script> -->
    <!-- JavaScript -->
    <!-- <script src="js/main.js" defer></script> -->
</head>
<body id="body" <?php body_class(); ?>>
    <!-- <h1><a href="<?php //echo esc_url(home_url()); ?>"><?php //bloginfo('name'); ?></a></h1> -->
    <!-- <p><?php //bloginfo('description'); ?></p> -->
    <header id="header">
        <div class="h_inner">
            <h1><a id="h1_text" href="<?php echo esc_url(home_url()); ?>">Nakaofolio</a></h1>
            <nav class="gnav">
                <!-- <ul class="gnav_ul">
                    <li><a href="#">profile</a></li>
                    <li><a href="#2">skill</a></li>
                    <li><a href="#3">works</a></li>
                    <li><a href="#4">blog</a></li>
                </ul> -->
                <?php 
                $args = array(
                    'theme_location' => 'header_nav',
                    'menu_class' => 'menu',
                );
                wp_nav_menu($args);
                ?>
                <?php 
                $args = array(
                    'theme_location' => 'header_nav',
                    'menu_class' => 'gnav_ul',
                    'menu_id' => 'gnav_ul',
                );
                wp_nav_menu($args);
                ?>
                <i class="fas fa-bars menu-icon"></i>
            </nav>
        </div>
    </header><!-- #header end -->