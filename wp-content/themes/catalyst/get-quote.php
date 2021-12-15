<?php
/*
 * Template Name: Get A Quote Page
 */
get_header();
?>
<main>
    <div class="about-us-section get-quote-section">
        <div class="container">
            <div class="logo-section">
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/catalyst-logo.svg" alt="Catalyst Logo" class="img-responsive">
                </a>
            </div>
            <div class="quote-page">
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


