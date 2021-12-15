<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <title>Catalyst</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <script src="https://cdn.jsdelivr.net/scrollreveal.js/3.3.1/scrollreveal.min.js"></script>
    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
<!--    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.12.0/paper-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js"></script>

<!--    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">-->




    <?php wp_head(); ?>


  </head>
  <body>
    <header>
      <div class="contact-section">   
      </div>   <!-- contact-section -->
      <div class="navbaar-section">

        <a href="https://www.catalyst.sh/wp/"> <img src='https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Header-Logo-3.png' class="img-responsive  logo-img" alt="logo"></a>
        <a href="https://www.catalyst.sh/wp/"> <img src='https://www.catalyst.sh/wp/wp-content/uploads/2019/10/Header-Logo-2.png' class="img-responsive mobile-logo" alt="logo"></a>

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





      <!--mobile menu -->
      <div id="myNav" class="overlay">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <div class="overlay-content">
          <?php
          $args = array(
              'theme_location' => 'primary'
          );
          ?>          
          <?php wp_nav_menu($args); ?>    

        </div>
      </div>

      <span class="mobile-menu-btn" onclick="openNav()">&#9776;</span>
    </header>








