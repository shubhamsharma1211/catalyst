<?php
/*
 * Template Name: Home Page
 */
get_header();
?>
<div class="backgroud-wrapper"></div>
<ul class="menu" id="menu">
    <?php
    if (have_rows('navigation_menu_links')):
        while (have_rows('navigation_menu_links')) : the_row();
            ?>
            <li>
                <a class="menu-links" data-menuanchor="<?php the_sub_field('menu_link_wrapper') ?>" href="#<?php the_sub_field('menu_link_wrapper') ?>"><span class="dot-wrapper"></span></a>
                <ul class="sub-menu">
                    <li><a href="#<?php the_sub_field('menu_link_wrapper') ?>"><?php the_sub_field('menu_name_wrapper') ?></a></li>
                </ul>
            </li>
            <?php
        endwhile;
    else :
    endif;
    ?> 
</ul>
<div class="logo-sections desktop-wrapper">
    <a href="<?php echo get_home_url(); ?>"  class="logo-section-wrapper">
        <div class="catalyst-logo-wrappers">
            <img src="<?php echo get_template_directory_uri(); ?>/images/Catalyst Visual indentity.svg" alt="Catalyst Logo" class="img-responsive desktop-wrapper">  
        </div>
        <div class="logo-text-wrapper">
            <h3>catalyst</h3>
            <p>solutions</p>
        </div>
    </a>
</div> 
<div class="banner-sec-image banner-image-animation desktop-wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/images/Catalyst Visual indentity.svg" alt="Banner Image" class="img-responsive">
</div>
<div class="mobile-logo-wrapper mobile-wrapper">
    <img src="<?php echo get_template_directory_uri(); ?>/images/catalyst-logo.svg" alt="Banner Image" class="img-responsive">
</div>
<div id="fullpage">
    <section class="vertical-scrolling">
        <div class="home-banner-sec">
            <div class="row">
                <div class="col-sm-7"> 
                    <div class="banner-content-sec">
                        <?php
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                        ?>
                    </div>
                </div>   
                <div class="col-sm-5"></div>
                <div class="mobile-banner-sec-image mobile-wrapper">
                    <img src="<?php the_field('banner_mobile_image_section') ?>" alt="Banner Image" class="img-responsive">
                </div>
            </div>
        </div>
    </section>
    <section class="vertical-scrolling">
        <div class="home-about-sec about-background-wrapper about-sec-wrapper">
            <div class="row">
                <div class="col-sm-5">                   
                    <div class="banner-sec-image desktop-wrapper">
                        <img src="<?php the_field('about_us_section_image') ?>" alt="Banner Image" class="img-responsive">
                    </div>
                    <div class="banner-sec-image mobile-wrapper">
                        <img src="<?php the_field('about_us_section_mobile_image') ?>" alt="Banner Image" class="img-responsive">
                    </div>
                </div>    
                <div class="col-sm-7 banner-image-sec">                 
                    <div class="banner-content-sec">
                        <?php the_field('about_us_section_content') ?>
                        <div class="all-services-btn-wrapper our-team-btn-wrapper">
                            <a href="<?php echo get_site_url(); ?>/team">Our team</a>
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    </section>
    <section class="vertical-scrolling">
        <div class="home-about-sec opportunities-background-wrapper">
            <div class="row">
                <div class="col-sm-6"> 
                    <div class="banner-content-sec">
                        <?php the_field('opportunities_section_content') ?>
                    </div>
                </div>    
                <div class="col-sm-6 banner-image-sec">                 
                    <div class="banner-sec-image">
                        <img src="<?php the_field('opportunities_section_image') ?>" alt="Banner Image" class="img-responsive">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vertical-scrolling">
        <div class="home-about-sec services-background-wrapper">
            <div class="row">
                <div class="col-sm-5"> 
                    <div class="banner-sec-image desktop-wrapper">
                        <img src="<?php the_field('services_section_image') ?>" alt="Banner Image" class="img-responsive">
                    </div>
                    <div class="banner-sec-image mobile-wrapper">
                        <img src="<?php the_field('services_section_mobile_image') ?>" alt="Banner Image" class="img-responsive">
                    </div>
                </div>    
                <div class="col-sm-7 banner-image-sec">                 
                    <div class="banner-content-sec">
                        <?php the_field('services_section_content') ?>
                        <div class="all-services-btn-wrapper">
                            <a href="<?php echo get_site_url(); ?>/services/">All services</a>
                        </div>
                    </div>
                    <div class="services-wrapper">
                        <!--                        <div class="row">
                        <?php
                        //  if (have_rows('all_services_section')):
                        //  while (have_rows('all_services_section')) : the_row();
                        ?>
                                                            <div class="col-sm-4">                           
                                                                <span class="services-image-wrapper"><img src="<?php // the_sub_field('icon');  ?>" alt=" <?php // the_sub_field('icon_title');  ?>" class="img-responsive"></span>
                                                                <h3><?php //the_sub_field('icon_title');  ?></h3>
                                                            </div>
                                                       //     <?php
                        //endwhile;
                        //  else :
                        // endif;
                        ?> 
                                                </div>    -->

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="vertical-scrolling">    
        <div class="home-projects-section">
            <div class="projects-container">
                <h2><?php the_field('projects_section_title') ?></h2>    
                <div class="projects-sec">

                </div>
                <div class="row">
                    <?php
                    if (have_rows('projects_carousel_section')):
                        while (have_rows('projects_carousel_section')) : the_row();
                            ?>
                            <div class="col-sm-4">
                                <a href="<?php echo get_site_url(); ?>/projects/<?php the_sub_field('projects_carousel_link'); ?>" class="projects-link-wrapper">
                                    <div class="projects-card-sec">                             
                                        <div class="projects-card-wrapper">
                                            <div class="projects-card-content">
                                                <div class="projects-card-image">
                                                    <img src="<?php the_sub_field('projects_carousel_image') ?>" alt="card Image" class="img-responsive">
                                                </div>
                                                <h4><?php the_sub_field('projects_carousel_title'); ?></h4>
                                                <p><?php the_sub_field('projects_carousel_content'); ?></p>
                                                <a href="<?php echo get_site_url(); ?>/<?php the_sub_field('projects_carousel_link'); ?>" class="projects-card-link">Learn more <span class="arrow-wrapper">></span></a>
                                            </div>
                                        </div>                                  
                                    </div>
                                </a>
                            </div>
                            <?php
                        endwhile;
                    else :
                    endif;
                    ?> 
                </div>
            </div>
        </div>    
    </section>
    <section class="vertical-scrolling">    
        <div class="home-projects-section testimonials-section">
            <div class="projects-container">
                <h2><?php the_field('testimonials_section_title') ?></h2>  
                <img src="<?php the_field('testimonials_section_image') ?>" class="ok-img-wrapper" alt="Ok Image" class="img-responsive">
                <div class="owl-carousel owl-theme" id="testimonials-carousel">
                    <?php
                    if (have_rows('testimonials_carousel_section')):
                        while (have_rows('testimonials_carousel_section')) : the_row();
                            ?>
                            <div class="item">
                                <div class="testimonials-carousel-card">
                                    <div class="client-content-sec">
                                        <img src="<?php the_sub_field('testimonials_client_image') ?>" alt="<?php the_sub_field('testimonials_client_name') ?>" class="img-responsive">
                                        <h4><?php the_sub_field('testimonials_client_name') ?></h4>
                                        <p><?php the_sub_field('testimonials_client_post') ?></p>
                                    </div>
                                    <div class="testimonials-content-sec">
                                        <p><?php the_sub_field('testimonials_client_review') ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else :
                    endif;
                    ?> 
                </div>
            </div>           
        </div> 
    </section>
    <section class="vertical-scrolling">    
        <div class="home-contact-us-sec">
            <div class="contact-us-conatiner">
                <div class="contact-us-content">
                    <div class="logo-section desktop-wrapper">
                        <a href="#home">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/catalyst-logo.svg" alt="Catalyst Logo" class="img-responsive">
                        </a>
                    </div>
                    <div class="home-contact-us-content">
                        <h2><?php the_field('contact_us_title') ?></h2>
                        <?php the_field('contact_us_content') ?>
                        <div class="home-contact-us-form-sec">
                            <div class="form-row-wrapper">
                                <?php echo do_shortcode('[contact-form-7 id="290" title="Home Contact form"]') ?>
                            </div>                      
                        </div>
                    </div>
                    <img src="<?php the_field('contact_us_image_section') ?>" alt="Rocket Image" class="img-responsive rocket-img-wrapper desktop-wrapper">
                    <img src="<?php the_field('contact_us_mobile_image_section') ?>" alt="Rocket Image" class="img-responsive rocket-img-wrapper mobile-wrapper">
                </div>
            </div>           
        </div>
        <div class="sub-section">
            <div class="footer-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <?php dynamic_sidebar('footer-content'); ?>
                        </div>
                        <div class="col-sm-3">
                            <?php dynamic_sidebar('company-address'); ?>
                        </div>
                        <div class="col-sm-3">
                            <?php dynamic_sidebar('company-info'); ?>
                            <div class="social-icon-section-wrapper">
                                <?php dynamic_sidebar('social-link'); ?>
                            </div>
                        </div>
                    </div>                     
                    <div class="copyright-section">
                        <p>Copyright © CT Solutions Private Limited <?php echo date('Y'); ?>. All rights reserved.</p>
                    </div>
                </div>
            </div> 
        </div>
    </section>
</div>

<?php
get_footer();
