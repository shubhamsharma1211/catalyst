<?php
get_header();
$feat_image = wp_get_attachment_url(get_post_thumbnail_id(get_the_id()));
while (have_posts()) : the_post();
    ?>
    <main>
        <div class="services-section projects-page">
            <div class="projects-page-background">
                <div class="container">
                    <div class="logo-section">
                        <a href="<?php echo get_home_url(); ?>">
                            <img src="<?php echo get_template_directory_uri(); ?>/images/Services-logo.svg" alt="Catalyst Logo" class="img-responsive">
                        </a>
                    </div> 
                    <div class="post-page-row">     
                        <div class="blog-banner-wrapper row">
                            <div class="col-sm-5">
                                <div class="blog-detail-section">
                                    <div class="blog-detail-wrapper">                
                                        <div class="post-content">
                                            <h1><?php the_title() ?></h1> 
                                            <?php the_content() ?>
                                        </div>
                                    </div>
                                    <div class="all-services-btn-wrapper our-team-btn-wrapper projects-btn-wrapper">
                                        <a href="<?php echo get_site_url(); ?>/projects/">Projects</a>
                                        <?php //if (get_field('project_link')) { ?>
     <!--                                        <a href="<?php //the_field('project_link')    ?>" target="_blank" >-->
                                        <?php //} ?>
                                        <?php // if (get_field('project_link')) { ?>
                                        <!--                                        Projects</a>-->
                                        <?php // } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="post-img-sec">
                                    <?php
//                                    $value = the_sub_field("project_gallery_image");
//                                     $value = get_sub_field('project_gallery_image');
//                                    if ($value) {
                                           if (have_rows('project_gallery')){
                                        ?> 
                                        <div class="owl-carousel owl-theme" id="project-gallery-carousel">
                                            <?php
                                            if (have_rows('project_gallery')):
                                                while (have_rows('project_gallery')) : the_row();
                                                    ?>
                                                    <div class="item">
                                                        <img src="<?php the_sub_field('project_gallery_image') ?>" alt="<?php the_sub_field('testimonials_client_name') ?>" class="img-responsive">                                                                      
                                                    </div>
                                                    <?php
                                                endwhile;
                                            else :
                                            endif;
                                            ?> 
                                        </div>                                     
                                        <?php
                                    } else {
                                        ?><img src="<?php echo $feat_image; ?>" class="post-feat-image sss" alt="blog-image"> <?php
                                    }
                                    ?> 
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
endwhile;
wp_reset_query();
get_footer();

