<?php
/*
 * Template Name: Services Page
 */
get_header();
?>
<main>
    <div class="services-section about-us-section services-wrapper-sec">
        <div class="container">
            <div class="logo-section desktop-wrapper">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/catalyst-logo.svg" alt="Catalyst Logo" class="img-responsive">
                </a>
            </div>
            <div class="meet-our-team-content">
                <?php
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>
            </div>
            <div class="our-services-section">   
                <div class="row">
                    <?php
                    if (have_rows('our_services_section')):
                        while (have_rows('our_services_section')) : the_row();
                            ?>
                            <div class="col-sm-4">                           
                                <div class="our-services-sec">
<!--                                    <span class="services-image-wrapper"><img src="<?php //the_sub_field('icon'); ?>" alt=" <?php the_sub_field('title'); ?>" class="img-responsive"></span>-->
                                    <span class="services-image-wrapper"><i class="our-services-icon <?php the_sub_field('services_icon'); ?>"></i></span>
                                    <h4><?php the_sub_field('title') ?></h4>
                                    <div class="services-content-wrapper">                                  
                                        <?php
                                        if (have_rows('services_content')):
                                            while (have_rows('services_content')) : the_row();
                                                ?>
                                                <?php if (get_sub_field('services_sub_title_link')) { ?>
                                                    <a href="<?php the_sub_field('services_sub_title_link') ?>" target="_blank" >
                                                    <?php } ?>
                                                    <p><?php the_sub_field('services_sub_title'); ?></p>
                                                    <?php if (get_sub_field('services_sub_title_link')) { ?>
                                                    </a>
                                                <?php } ?>
                                                <?php
                                            endwhile;
                                        else :
                                        endif;
                                        ?>
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
        <div class="team-work-image">
            <img src="<?php the_field('services_image_wrapper') ?>" alt="Banner Image" class="img-responsive">
        </div>
    </div>
</main>

<?php
get_footer();
