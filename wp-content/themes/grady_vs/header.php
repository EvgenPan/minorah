<!DOCTYPE HTML>
<html>

<head <?php language_attributes(); ?>>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="text/html;">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <?php
    global $wp_query;
    wp_head();
    ?>
</head>

<body <?php if (is_front_page()) {
    print ' class="front_page" ';
} else {
    print ' class="inner_page" ';
} ?>>

<div id="root">
    <div class="app">
        <div class="app_main">


            <header>

                <div class="header_fluid">
                    <div class="container">
                        <div class="head_menu_top_col">
                            <?php
                            if (has_nav_menu('header_top_menu')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'header_top_menu',
                                    'menu_class' => 'menu-menu-container',
                                    'container' => '',
                                    'container_class' => '',
                                    'walker' => new Main_Submenu_Class()
                                ));
                            }
                            ?>
                        </div>
                        <div class="row head_menu valign-wrapper">
                            <button id="hamb_button" class="hamburger hamburger--collapse" type="button"><span
                                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>
                            <div class="col-auto header_logo">
                                <?php if (!is_front_page()) {
                                    print '<a href="' . get_home_url() . '">';
                                    dynamic_sidebar('header_logo');
                                    print '</a>';
                                } else {
                                    dynamic_sidebar('header_logo');
                                }
                                ?>
                            </div>
                            <div class="col head_menu_col">
                                <?php
                                if (has_nav_menu('header_menu')) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'header_menu',
                                        'menu_class' => 'menu-menu-container',
                                        'container' => '',
                                        'container_class' => '',
                                        'walker' => new Main_Submenu_Class()
                                    ));
                                }
                                ?>
                            </div>
                            <div class="col-auto header_btn">
                                <?php dynamic_sidebar('header_button'); ?>
                            </div>

                        </div>
                    </div>

                </div>
                <div class="image_under_menu"> <?php dynamic_sidebar('header_image'); ?></div>


                <div class="fixed-bar animated-quick fadeOutUp header_fluid">
                    <div class="container">
                        <div class="row head_menu valign-wrapper">
                            <button id="hamb_button" class="hamburger hamburger--collapse" type="button"><span
                                        class="hamburger-box"><span class="hamburger-inner"></span></span></button>

                            <div class="col-auto header_logo">
                                <?php if (!is_front_page()) {
                                    print '<a href="' . get_home_url() . '">';
                                } ?>
                                <?php dynamic_sidebar('header_logo'); ?>
                                <?php if (!is_front_page()) print '</a>'; ?>

                            </div>
                            <div class="col right-align head_menu_col">
                                <?php
                                if (has_nav_menu('header_menu')) {
                                    wp_nav_menu(array(
                                        'theme_location' => 'header_menu',
                                        'menu_class' => 'menu-menu-container',
                                        'container' => '',
                                        'container_class' => '',
                                        'walker' => new Main_Submenu_Class()
                                    ));
                                }
                                ?>
                            </div>
                            <div class="col-auto header_btn">
                                <?php dynamic_sidebar('header_button'); ?>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mobile_menu ">
                    <?php dynamic_sidebar('header_button'); ?>
                    <div>
                        <?php
                        if (has_nav_menu('header_menu')) {
                            wp_nav_menu(array(
                                'theme_location' => 'header_menu',
                                'menu_class' => 'menu_mobile',
                                'container' => '',
                                'container_class' => '',
                                'walker' => new Main_Submenu_Class()
                            ));
                        }
                        ?>
                        <?php
                        if (has_nav_menu('header_top_menu')) {
                            wp_nav_menu(array(
                                'theme_location' => 'header_top_menu',
                                'menu_class' => 'menu-menu-container',
                                'container' => '',
                                'container_class' => '',
                                'walker' => new Main_Submenu_Class()
                            ));
                        }
                        ?>

                        <div class="mob_menu_social">
                            <?php
                            if (has_nav_menu('social')) {
                                wp_nav_menu(array(
                                    'theme_location' => 'social',
                                    'menu_class' => 'footer_social',
                                    'container' => '',
                                    'container_class' => '',
                                    'walker' => new Main_Submenu_Class()
                                ));
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="bg "></div>
            </header>