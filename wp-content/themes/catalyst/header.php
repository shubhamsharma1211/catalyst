<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="HandheldFriendly" content="true">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-145053103-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-145053103-1');
        </script>

        <?php if (is_home() || is_front_page()) { ?>
            <title><?php echo get_bloginfo('name'); ?></title>
        <?php } else { ?>
            <title><?php the_title(); ?> | <?php echo get_bloginfo('name'); ?></title>
            <?php
        }
        wp_enqueue_script('jquery')
        ?>
        <?php wp_head(); ?>
<!--            <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>-->
    </head>

    <body <?php body_class(); ?>>
        <div class="loder">
            <div class="loder-warpper">
                <img src="<?php echo get_template_directory_uri(); ?>/images/Catalyst Visual indentity.svg" alt="Banner Image" class="img-responsive loder-image-wrapper">
                <h3>Loading...</h3>
            </div>           
        </div>
        <header>
            <div class="header-section">          
                <div class="mobile-show">
                    <div class="menu-toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <nav class="mobile-nav theme-menus d-flex align-items-center"> 
                        <div class="inner-menu">
                            <div class="mobile-menu-section">
                                <ul class="navbar-nav">
                                    <nav class="site-nav"> 
                                        <?php
                                        $args = array(
                                            'theme_location' => 'primary'
                                        );
                                        ?>          
                                        <?php wp_nav_menu($args); ?>                                                                                                             
                                    </nav>
                                </ul>                                       
                            </div>                             
                        </div>
                        <div class="social-icon-section">
                            <?php dynamic_sidebar('social-link'); ?>
                        </div>
                    </nav>
                </div>
            </div>
        </header>     
