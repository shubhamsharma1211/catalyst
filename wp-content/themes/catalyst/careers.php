<?php
/*
 * Template Name: Careers page
 */
get_header();
?>
<main>
    <div class="services-section about-us-section services-wrapper-sec">
        <div class="container">
            <div class="logo-section desktop-wrapper" style="padding: 124px 0 124px;">
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
        </div>
    </div>
</main>

<?php get_footer(); ?>
