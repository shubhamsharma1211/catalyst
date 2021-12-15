<?php
/*
 * Template Name: Projects Page
 */
get_header();
?>
<main>
    <div class="services-section projects-page">
        <div class="container">
            <div class="logo-section">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/Services-logo.svg" alt="Catalyst Logo" class="img-responsive">
                </a>
            </div>
            <div class="our-services-section">              
                <div class="filter-tab-wrapper">
                    <div class="tab-warpper-sec">
                        <?php
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                        ?>                     
                        <div class="filters filter-button-group">
                            <ul>
                                <!--                                <li class="active" data-filter="*">All projects</li>-->
                                <li class="active" data-filter=".all-projects">All projects</li>
                                <li data-filter=".art">Art</li>
                                <li data-filter=".mobile">Mobile</li>
                                <li data-filter=".web">Web</li>
                            </ul>
                        </div>
                    </div>
                    <div class="content grid">
                        <div class="single-content all-projects grid-item">
                            <div class="row">          
                                <?php
                                $args = array(
                                    'post_type' => 'project',
                                    'post_status' => 'publish',
                                    // 'category_name' => 'web',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1
                                );
                                $testimonials = new WP_Query($args);
                                if ($testimonials->have_posts()) :
                                    ?>
                                    <?php
                                    while ($testimonials->have_posts()) :
                                        $testimonials->the_post();
                                        ?>
                                        <div class="col-sm-4">
                                            <a class="post-link post-blog-link" href="<?php the_permalink(); ?>">
                                                <div class="content-overlay"></div>
                                                <img src=" <?php the_post_thumbnail_url($size); ?>" alt="post-image" class="post-image">
                                                <div class="gallery-content-details">
                                                    <h3 class="gallery-title"><?php the_title() ?></h3>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                    <?php
                                else :
                                    esc_html_e('No testimonials in the diving taxonomy!', 'text-domain');
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="single-content web grid-item">
                            <div class="row">          
                                <?php
                                $args = array(
                                    'post_type' => 'project',
                                    'post_status' => 'publish',
                                    'category_name' => 'web',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1
                                );
                                $testimonials = new WP_Query($args);
                                if ($testimonials->have_posts()) :
                                    ?>
                                    <?php
                                    while ($testimonials->have_posts()) :
                                        $testimonials->the_post();
                                        ?>
                                        <div class="col-sm-4">
                                            <a class="post-link post-blog-link" href="<?php the_permalink(); ?>">
                                                <div class="content-overlay"></div>
                                                <img src=" <?php the_post_thumbnail_url($size); ?>" alt="post-image" class="post-image">
                                                <div class="gallery-content-details">
                                                    <h3 class="gallery-title"><?php the_title() ?></h3>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                    <?php
                                else :
                                    esc_html_e('No testimonials in the diving taxonomy!', 'text-domain');
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="single-content art grid-item">
                            <div class="row">          
                                <?php
                                $args = array(
                                    'post_type' => 'project',
                                    'post_status' => 'publish',
                                    'category_name' => 'art',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1
                                );
                                $testimonials = new WP_Query($args);
                                if ($testimonials->have_posts()) :
                                    ?>
                                    <?php
                                    while ($testimonials->have_posts()) :
                                        $testimonials->the_post();
                                        ?>
                                        <div class="col-sm-4">
                                            <a class="post-link post-blog-link" href="<?php the_permalink(); ?>">
                                                <div class="content-overlay"></div>
                                                <img src=" <?php the_post_thumbnail_url($size); ?>" alt="post-image" class="post-image">
                                                <div class="gallery-content-details">
                                                    <h3 class="gallery-title"><?php the_title() ?></h3>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                    <?php
                                else :
                                    esc_html_e('No testimonials in the diving taxonomy!', 'text-domain');
                                endif;
                                ?>
                            </div>
                        </div>
                        <div class="single-content mobile grid-item">
                            <div class="row">          
                                <?php
                                $args = array(
                                    'post_type' => 'project',
                                    'post_status' => 'publish',
                                    'category_name' => 'mobile',
                                    'orderby' => 'date',
                                    'order' => 'DESC',
                                    'posts_per_page' => -1
                                );
                                $testimonials = new WP_Query($args);
                                if ($testimonials->have_posts()) :
                                    ?>
                                    <?php
                                    while ($testimonials->have_posts()) :
                                        $testimonials->the_post();
                                        ?>
                                        <div class="col-sm-4">
                                            <a class="post-link post-blog-link" href="<?php the_permalink(); ?>">
                                                <div class="content-overlay"></div>
                                                <img src=" <?php the_post_thumbnail_url($size); ?>" alt="post-image" class="post-image">
                                                <div class="gallery-content-details">
                                                    <h3 class="gallery-title"><?php the_title() ?></h3>
                                                </div>
                                            </a>
                                        </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                    ?>
                                    <?php
                                else :
                                    esc_html_e('No testimonials in the diving taxonomy!', 'text-domain');
                                endif;
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
get_footer();
