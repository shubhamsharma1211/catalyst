<?php
// Template name: Homepage
?>
<?php get_header(); ?>

<main>
  <div class="banner-section">
    <div class="banner-background" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/11/Banner-area-illustration.svg')">
       <div class="container banner-wrapper">
       <h1 class="ml11">
  <span class="text-wrapper">
    <span class="line line1"></span>
    <span class="letters">A Creative Digital Agency</span>
  </span>
</h1>
       </div>       
    </div>  
  </div>

 








<!-- tttttttttttttttttttttttttttttttttttttttttttttttttttttt -->
<div class="social-icon-background">
      <div class="social-icon-wrapper">
      <?php dynamic_sidebar('footer6'); ?>
          <div class="container">
            <div class="row">
            <div class="col-sm-7">

            <div class="digital-agency-wrapper">
              <div class="wrapper-heading">
                
        <?php
      // TO SHOW THE PAGE CONTENTS
      while (have_posts()) : the_post();
        ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
          <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

        <?php
      endwhile; //resetting the page loop
      wp_reset_query(); //resetting the page query
      ?>               
             </div>
          </div>
              
            </div>
            <div class="col-sm-5">
            <div class="animation-section">
                 <img class="animation-background" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/About-section-illustaration-with-complete-elements.svg" alt="Avatar">
                 <!-- tttttttttttttttt -->
                 <div class="animation-sec">
                 <img class="animation-img plane" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Plane-1.svg" alt="animation-img">
                 
            </div>
            </div>
            </div>


          </div>
    </div>
  </div>  <!--social-icong-background tttttttttttt-->














  <div class="mobile-about-us">
    <div class="container">
      <div class="wrapper-heading">
       <?php
      // TO SHOW THE PAGE CONTENTS
      while (have_posts()) : the_post();
        ?> <!--Because the_content() works only inside a WP Loop -->
        <div class="entry-content-page">
          <?php the_content(); ?> <!-- Page Content -->
        </div><!-- .entry-content-page -->

        <?php
      endwhile; //resetting the page loop
      wp_reset_query(); //resetting the page query
      ?>              
      </div>
    </div>
       <div class="animation-section">
                 <img class="animation-background" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/About-section-illustaration-with-complete-elements.svg" alt="Avatar">
                 <!-- tttttttttttttttt -->
                 <div class="animation-sec">
                 <img class="animation-img plane" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Plane-1.svg" alt="animation-img">
                 
            </div>
            </div>
    <!--ttttttttttttttttttttttt-->
  </div>  <!-- mobile-about-us -->

</div>  <!-- digital-power-section -->
  <div class="services-section">
    <div class="services-icong-background" data-rellax-speed="20" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Mask-Group-14.svg')">
        <div class="container wrapper-text-heading">
          <?php the_field('services_wrapper') ?>
          <div class="row services-col-section">
  <?php
          if (have_rows('services_wrapper_test')):
            while (have_rows('services_wrapper_test')) : the_row();
              ?>
             
                <div class="col-sm-4">
                  <div class="services-col-content">
                <img class="blue-image" src="<?php the_sub_field('blue_image'); ?>" alt="Avatar">
                <img class="white-image" src="<?php the_sub_field('white_image'); ?>" alt="Avatar">
                 <h3><?php the_sub_field('title'); ?></h3>
                 <p><?php the_sub_field('description'); ?></p>
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
  </div>

  
  <!-- test timeline  -->

  <div class="timeline-background" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Mask-Group-13-1.svg')">
  <div class="container wrapper-heading works-heading">
    <?php the_field('how_it_works_heading') ?>
</div>
<!-- works-timeline -->
<div class="works-timeline">
    <div class="timeline-container">
     <div class="cntl"> <span class="cntl-bar cntl-center"> <span class="cntl-bar-fill cntl-icon-fill"></span> </span>
        <div class="cntl-states">
        <?php
          if (have_rows('timeline')):
            $i=1;
            while (have_rows('timeline')) : the_row();     
            if( $i % 2== 0){
              ?>
            <div class="cntl-state" id="sec<?php echo $i?>">
              <div class="cntl-content">
                <div class="row">
                <div class="col-sm-5 col-5">
                        <img class="how-it-works-icon left-icon" src="<?php the_sub_field('timeline_image'); ?>" alt="Card image cap">
                  </div>
                    <div class="col-sm-7 col-7 right-section">
                      <h3><?php the_sub_field('title'); ?></h3>
                      <p><?php the_sub_field('timeline_content'); ?></p>
                    </div>

                </div>
              </div>
                <div class="cntl-icon cntl-center" id="<?php the_sub_field('id'); ?>"></div>
            </div>  <!-- cntl-state -->
            <?php } else{?>
              <div class="cntl-state" id="sec<?php echo $i?>">
              <div class="cntl-content">
                <div class="row">
                    <div class="col-sm-7 col-7 left-section">
                      <h3><?php the_sub_field('title'); ?></h3>
                      <p><?php the_sub_field('timeline_content'); ?></p>
                    </div>
                      <div class="col-sm-5 col-5">
                        <img class="how-it-works-icon right-icon" src="<?php the_sub_field('timeline_image'); ?>" alt="Card image cap">
                      </div>
                </div>
              </div>
                <div class="cntl-icon cntl-center" id="<?php the_sub_field('id'); ?>"></div>
            </div>  <!-- cntl-state -->
              <?php
            }
               $i++;
            endwhile;
          else :
          endif;
          ?>
        </div><!-- cntl-states -->
      </div><!-- cntl -->
     </div><!-- works-timeline container -->
  </div><!-- works-timeline -->
</div><!-- timeline-background -->
<!-- timeline carousel -->
<div class="timeline-carousel">
    
   <div class="container wrapper-heading">
     <?php the_field('how_it_works_heading') ?>
      <div class="owl-carousel custom1 owl-theme" id="timeline-slider">
        <?php
          if (have_rows('timeline')):
            while (have_rows('timeline')) : the_row();
              ?>
        <div class="item timeline-carouse-item">
           <h3><?php the_sub_field('title'); ?></h3>
            <img class="timeline-icon" src="<?php the_sub_field('timeline_image'); ?>" alt="Card image cap">
           <p><?php the_sub_field('timeline_content'); ?></p>
        </div>     <!-- item -->
          <?php
             endwhile;
             else :
             endif;
          ?>
      </div> <!-- owl-carousel -->
    </div>
 </div><!-- timeline carousel -->

 <div class="our-work-wrapper wrapper-text-heading">
    <div class="container">
      <?php the_field('our_work_section') ?>
    </div>
    <div class="owl-carousel owl-theme" id="reviews-slider">
      
       <?php
          if (have_rows('reviews_slider')):
            while (have_rows('reviews_slider')) : the_row();
              ?>
      
    <div class="item">
    <div class="card">
  <img class="our-work-img" src="<?php the_sub_field('image'); ?>" alt="Avatar" style="width:100%">
  <div class="card-text">
    <h4><?php the_sub_field('company_title'); ?></h4> 
    <p><?php the_sub_field('_description'); ?></p> 
    <a class=" btn-lg btn explore-button" href="<?php the_sub_field('company_url'); ?>">Explore</a>
  </div>
  </div>
    </div>
       <?php
             endwhile;
             else :
             endif;
          ?>
      
 <!-- test -->
</div>
<!--mobile-our-work -->

<div class="mobile-our-work">
  <div class="container">
    <div class="mobile-our-work-content">
       <h3>Creative Curators</h3>
       <h4>Website Development/UI/UX</h4>
       <img class="mobile-our-work-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Regal-Homes-Instagram-1-2.svg" alt="Avatar"> 
    </div><!--mobile-our-work-content -->
    <div class="mobile-our-work-content">
       <h3>Myriad Nuances</h3>
       <h4>Logo Design</h4>
       <img class="mobile-our-work-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Myriad-Nuances-2.svg" alt="Avatar"> 
    </div><!--mobile-our-work-content -->
    <div class="mobile-our-work-content">
       <h3>Regal Homes</h3>
       <h4>Brochure Design</h4>
       <img class="mobile-our-work-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Regal-Homes-Instagram-1-2.svg" alt="Avatar"> 
    </div><!--mobile-our-work-content -->
    <div class="btn-section">
      <a class=" btn-lg btn read-more-button" href="#">Read More</a>
    </div>
  </div>
</div><!--mobile-our-work -->

 </div><!-- our-work-wrapper-->

    <div class="our-specialisations-col">
    <div class="our-specialisations-background" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Mask-Group-19.svg')">
      <div class="container-fluid">
      <div class="our-specialisations-section wrapper-text-heading">
          <?php the_field('our_specialisations_wrapper') ?>
         <div class="web-development-content">
         <?php the_field('our_specialisations_content') ?>
         
         </div>  
      </div> 
  </div>
</div>

<div class="our-specialisations-section marketing-art-work-section"> 
   <div class="container-fluid">
     <?php the_field('digital_marketing_section') ?>
    </div>
</div>
</div><!-- our-specialisations-col -->
<!-- mobile-our-specialisations -->
<div class="mobile-our-specialisations">
  
     <div class="container  wrapper-text-heading">
     <?php the_field('our_specialisations_wrapper') ?>
     </div>
        <div class="mobile-specialisations-content container web-design-text">
          <h3>Web Design and Development</h3>
          <img class="mobile-specialisations-img testimg" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Web-Development-1.svg" alt="Avatar">
          <p>consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum volutpat nulla. Nunc efficitur lectus et nunc ornare, at tincidunt nulla imperdiet. Vivamus consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum.</p>
        </div><!--mobile-specialisations-content -->
        <div class="our-specialisations-mobile-background">
        <div class="mobile-specialisations-content test-class container">
          <h3>Mobile App UI/ UX</h3>
          <img class="mobile-specialisations-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Mobile-uI_UX-2.svg" alt="Avatar">
          <p>consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum volutpat nulla. Nunc efficitur lectus et nunc ornare, at tincidunt nulla imperdiet. Vivamus consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum.</p>
        </div><!--mobile-specialisations-content -->
        </div>    <!--background -->
        <div class="mobile-specialisations-content container">
          <h3>Digital Marketing</h3>
          <img class="mobile-specialisations-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/undraw_organize_resume_utk5-3.svg" alt="Avatar">
          <p>consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum volutpat nulla. Nunc efficitur lectus et nunc ornare, at tincidunt nulla imperdiet. Vivamus consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum.</p>
        </div><!--mobile-specialisations-content -->
        <div class="mobile-specialisations-content container">
          <h3>Creative Art and Design</h3>
          <img class="mobile-specialisations-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Creative-Art-and-Design-3.svg" alt="Avatar">
          <p>consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum volutpat nulla. Nunc efficitur lectus et nunc ornare, at tincidunt nulla imperdiet. Vivamus consectetur adipiscing elit. Quisque eu ex orci. Phasellus nisl eros, gravida ac sem a, rutrum.</p>
        </div><!--mobile-specialisations-content -->
   
 
</div><!--mobile-our-work -->

<!-- <div class="email-submit-section"> -->
<div class="email-submit-section-background" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Mask-Group-21-1.svg')">
    <div class="email-background">
       <div class="container">
         <h3>Subscribe to our newsletter</h3>
         <?php the_field('email_submit_section_wrapper') ?>
       </div>
    </div>
</div>
<div class="we-work-with-section">
  <img class="we-work-left-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Mask-Group-22-2.svg" alt="Avatar">
    <div class="container wrapper-text-heading">
      <?php the_field('we_work_with_text_section') ?>
    </div>
    <!-- tttttttttttt -->
    <div class="work-with-section">
  <div class="container">
    <div class="work-with-row">
    <?php
          if (have_rows('we_work_with')):
            while (have_rows('we_work_with')) : the_row();
              ?>
      <div class="work-with-col">
      <img class="work-with-img" src="<?php the_sub_field('work_with'); ?>" alt="work-with-logo">
      </div>
      <?php
            endwhile;
          else :
          endif;
          ?>
    </div>
  </div>
</div>
     <!--nnnnnnnnnnnnnnn--> 
</div>
<div class="testimonial-section">
   <div class="testimonial-section-background" style="background-image: url('https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Testimonial-BG-1.svg')">
   <div class="testimonial-text-wrapper container wrapper-text-heading">
     <h2><?php the_field('testimonial_heading') ?></h2>
   <div class="owl-carousel owl-theme" id="testimonial-slider">
          <?php
          if (have_rows('testimonials')):
            while (have_rows('testimonials')) : the_row();
              ?>
              <div class="item">
              <img class="item-top-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/format-quote-close.svg" alt="Avatar">
              <div class="item-section-backgrounds">
  
                 <div class="item-content-section">
                 <p><?php the_sub_field('review_content'); ?></p>
                <h4><?php the_sub_field('title'); ?></h4>
                 </div>
          </div>
          <img class="round-bottom-img" src="https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Ellipse-171.svg" alt="Avatar">
              </div>
              <?php
            endwhile;
          else :
          endif;
          ?>
        </div>
   </div><!--test-wrapper -->
  </div>
</div>
</main>






  







<?php get_footer(); ?>