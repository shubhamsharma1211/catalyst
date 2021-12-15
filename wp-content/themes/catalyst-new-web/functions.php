<?php

function catalyst() {
//  wp_enqueue_style('style', get_stylesheet_uri());
  wp_enqueue_style("master", get_template_directory_uri() . '/css/master.css');
  wp_enqueue_style("responsive", get_template_directory_uri() . '/css/responsive.css');
  wp_enqueue_style('bootstrap-v4', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', '1.0', 'all');
  wp_enqueue_style('owl.carousel.min', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', '1.01', '1.01');
  wp_enqueue_style('owl.theme.default.min', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', '1.01', '1.01');

 wp_enqueue_script("jqueryjs", get_template_directory_uri() . '/js/jquery.js', array('jquery'), 1.1, true);
  wp_enqueue_script("jquerycntljs", get_template_directory_uri() . '/js/jquery.cntl.js', array('jquery'), 1.1, true);

//  wp_enqueue_script("owlcarouselminjs", get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), 1.1, true);
  wp_enqueue_script("owl.carousel.min.js", get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), 1.1, true);
  wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '20190612', true);
  wp_enqueue_script('main-theme', get_template_directory_uri() . '/js/main.js', array(), '2019061112', true);
}

add_action('wp_enqueue_scripts', 'catalyst');

//navigation menu

register_nav_menus(array(
    'primary' => __('primary menu'),
));

//them setup
function learingwordpress_setup() {


  //Add featured image support
  add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'learingwordpress_setup');

//Add our Widget location
function ourWidgetsInit() {
  register_sidebar(array(
      'name' => 'sidebar',
      'id' => 'sidebar1'
  ));
  //footer Area bar
  register_sidebar(array(
      'name' => 'footer Area 1',
      'id' => 'footer1',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="my-special-class">',
      'after_title' => '</h6>'
  ));
  register_sidebar(array(
      'name' => 'footer Area 2',
      'id' => 'footer2',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="my-special-class">',
      'after_title' => '</h6>'
  ));
  register_sidebar(array(
      'name' => 'footer Area 3',
      'id' => 'footer3',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="my-special-class">',
      'after_title' => '</h6>'
  ));
  register_sidebar(array(
      'name' => 'footer Area 4',
      'id' => 'footer4',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="my-special-class">',
      'after_title' => '</h6>'
  ));
  register_sidebar(array(
      'name' => 'footer Area 5',
      'id' => 'footer5',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="my-special-class">',
      'after_title' => '</h6>'
  ));
  register_sidebar(array(
      'name' => 'footer Area 6',
      'id' => 'footer6',
      'before_widget' => '<div class="widget-item">',
      'after_widget' => '</div>',
      'before_title' => '<h6 class="my-special-class">',
      'after_title' => '</h6>'
  ));
}

add_action('widgets_init', 'ourWidgetsInit');

//Add our custom post type

function create_posttype() {
  //set UI labels for custom post type
  $labels = array(
      'name' => _X('Products', 'post type general name', 'twentythirteen'),
      'singular_name' => _x('Products', 'post type singular name', 'twentythirteen'),
      'menu_name' => __('Products', 'twentythirteen'),
      'parent_item_colon' => __('parent Products', 'twentythirteen'),
      'all_items' => __('all Products', 'twentythirteen'),
      'view_items' => __('view Products', 'twentythirteen'),
      'add_new_item' => __('add new Products', 'twentythirteen'),
      'add_new' => __('add new', 'twentythirteen'),
      'edit_item' => __('edit Products', 'twentythirteen'),
      'update_item' => __('update Products', 'twentythirteen'),
      'search_item' => __('search Products', 'twentythirteen'),
      'not_found' => __('not found', 'twentythirteen'),
      'not_found_in_trash' => __('not found in trash', 'twentythirteen'),
  );
  //set other options for custom post type
  $args = array(
      'label' => __('Products', 'twentythirteen'),
      'description' => __('Products news and reviews', 'twentythirteen'),
      'labels' => $labels,
      //features this CPT supports in post editor
      'supports' => array('title', 'editor', 'excerpt', 'author', 'content', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
      //you can associate this CPT is with a taxonomy or cumstom taxonomy.
      'taxonomies' => array('genres'),
      /* A hierarchiacl CPT is like pages and can have 
       * parent and child item. A non-hierarchiacl CPT 
       * is like posts */
      'hierarchiacl' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menu' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'show_Products' => 3,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'page',
      // This is where we add taxonomies to our CPT
      'taxonomies' => array('category'),
  );
  //registering your custom post type
  register_post_type('Products', $args);
}

add_action('init', 'create_posttype');

//  Reviews post type
//Add our custom post type

function create_posttypes() {
  //set UI labels for custom post type
  $labels = array(
      'name' => _X('Reviews', 'post type general name', 'twentythirteen'),
      'singular_name' => _x('Reviews', 'post type singular name', 'twentythirteen'),
      'menu_name' => __('Reviews', 'twentythirteen'),
      'parent_item_colon' => __('parent Reviews', 'twentythirteen'),
      'all_items' => __('all Reviews', 'twentythirteen'),
      'view_items' => __('view Reviews', 'twentythirteen'),
      'add_new_item' => __('add new Reviews', 'twentythirteen'),
      'add_new' => __('add new', 'twentythirteen'),
      'edit_item' => __('edit Reviews', 'twentythirteen'),
      'update_item' => __('update Reviews', 'twentythirteen'),
      'search_item' => __('search Reviews', 'twentythirteen'),
      'not_found' => __('not found', 'twentythirteen'),
      'not_found_in_trash' => __('not found in trash', 'twentythirteen'),
  );
  //set other options for custom post type
  $args = array(
      'label' => __('Reviews', 'twentythirteen'),
      'description' => __('Reviews news and reviews', 'twentythirteen'),
      'labels' => $labels,
      //features this CPT supports in post editor
      'supports' => array('title', 'editor', 'excerpt', 'author', 'content', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
      //you can associate this CPT is with a taxonomy or cumstom taxonomy.
      'taxonomies' => array('genres'),
      /* A hierarchiacl CPT is like pages and can have 
       * parent and child item. A non-hierarchiacl CPT 
       * is like posts */
      'hierarchiacl' => false,
      'public' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'show_in_nav_menu' => true,
      'show_in_admin_bar' => true,
      'menu_position' => 5,
      'can_export' => true,
      'has_archive' => true,
      'exclude_from_search' => false,
      'publicly_queryable' => true,
      'capability_type' => 'page',
      // This is where we add taxonomies to our CPT
      'taxonomies' => array('category'),
  );
  //registering your custom post type
  register_post_type('Reviews', $args);
}

add_action('init', 'create_posttypes');



