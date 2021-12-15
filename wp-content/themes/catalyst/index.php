<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <div id="page-wrapper" class="row-fluid fullwidth <?php echo strtolower(get_the_title()); ?>-wrapper">
        <div class="container post">
            <h2 class="post-title fullwidth"><?php the_title(); ?></h2>
            <?php the_content(); ?>
        </div><!--End container-->
    </div><!--End Post Wrapper-->
    <?php
endwhile;
wp_reset_query();
?>
<?php get_footer(); ?>