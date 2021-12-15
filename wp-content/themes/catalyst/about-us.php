<?php
/*
 * Template Name: About Us Page
 */
get_header();
?>
<main>
    <div class="about-us-section">
        <div class="container">
            <div class="logo-section">
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
            <div class="our-team-member-section row">            
                <?php
                if (have_rows('meet_our_team_section')):
                    $i = 1;
                    while (have_rows('meet_our_team_section')) : the_row();
                        if ($i % 2 == 0) {
                            ?>
                            <div class="team-member-wrapper col-sm-6" id="sec<?php echo $i ?>">
                                <div class="row">
                                    <div class="col-sm-6 first-team-sec">
                                        <div class="code-sec-wrapper">
                                            <p><?php the_sub_field('team_member_code') ?></p>
                                            <h5>-<?php // the_sub_field('team_member_name') ?></h5>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <a href="javascript:void(0);">
                                            <span class="team-member-image">                                          
                                                <img src="<?php the_sub_field('team_member_image') ?>" alt="<?php the_sub_field('team_member_name') ?>" class="img-responsive">                                       
                                            </span>    
                                        </a>                           
                                        <h4><?php the_sub_field('team_member_name') ?></h4>
                                        <p><?php the_sub_field('team_member_post') ?></p>
                                    </div>   

                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="team-member-wrapper col-sm-6" id="sec<?php echo $i ?>">
                                <div class="row">

                                    <div class="col-sm-6 first-team-sec">
                                        <a href="javascript:void(0);">
                                            <span class="team-member-image">                                          
                                                <img src="<?php the_sub_field('team_member_image') ?>" alt="<?php the_sub_field('team_member_name') ?>" class="img-responsive">                                       
                                            </span>    
                                        </a>
                                        <h4><?php the_sub_field('team_member_name') ?></h4>
                                        <p><?php the_sub_field('team_member_post') ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="code-sec-wrapper">
                                            <p><?php the_sub_field('team_member_code') ?></p>
<!--                                            <h5>-<?php the_sub_field('team_member_name') ?></h5>-->
                                        </div>
                                    </div>                        
                                </div>
                            </div>
                            <?php
                        }
                        $i++;
                    endwhile;
                else :
                endif;
                ?>
            </div>
<!--            <div class="team-work-section">           
                <h2><?php // the_field('advisor_title') ?></h2>
            </div>-->
            <?php
//            if (have_rows('meet_our_advisors')):
                ?>        
<!--                <div class="our-team-member-section our-advisor-section row">  
                    <?php
//                    while (have_rows('meet_our_advisors')) : the_row();
//                        ?>
                        <div class="team-member-wrapper advisor-wrapper col-sm-4">
                            <a href="//<?php // the_sub_field('advisor_linkedin_link') ?>" target="_blank">
                                <span class="team-member-image advisor-img">                                          
                                    <img src="<?php // the_sub_field('advisor_image') ?>" alt="<?php // the_sub_field('advisor_name') ?>" class="img-responsive">                                       
                                </span>    
                            </a>                           
                            <h4><?php // the_sub_field('advisor_name') ?></h4>
                            <p><?php // the_sub_field('advisor_post') ?></p>  
                        </div>-->
                        <?php
//                    endwhile;
//                    ?>
                <!--</div>-->    
                <?php
//            endif;
            ?>
         

        </div>
           <div class="team-work-section team-gallery">
                <?php //the_field('team_work_content') ?>
                <h2><?php the_field('gallery_title') ?></h2>

                <div id="gallery-carousel" class="owl-carousel owl-theme">
                    <?php
                    if (have_rows('gallery_carousel_section')):
                        while (have_rows('gallery_carousel_section')) : the_row();
                            ?>
                            <div class="item">
                                <div class="content-overlay"></div>
                                <img src="<?php the_sub_field('image') ?>" alt="<?php the_sub_field('') ?>" class="img-responsive gallery-image">  
                                <div class="gallery-content-details">
                                    <h3 class="gallery-title"><?php the_sub_field('image_title') ?></h3>
                                </div>
                            </div>
                            <?php
                        endwhile;
                    else :
                    endif;
                    ?> 
                </div>
            </div>
        <div class="team-work-image">
            <img src="
            <?php the_field('team_work_image') ?>
                 " alt="Banner Image" class="img-responsive">
        </div>
    </div>
</main>

<?php get_footer(); ?>
