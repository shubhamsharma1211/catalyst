<?php

/**
 * @desc All js and css Files enque function
 * @date 10 April 2020
 * @author Catalyst
 */
// Disable WordPress image compression

function scriptenqueue() {
    // CSS files
    wp_enqueue_style("customcss", get_template_directory_uri() . '/css/style.css', array(), '9.3');
    wp_enqueue_style("responsivecss", get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('bootstrap-v4', get_stylesheet_directory_uri() . '/css/bootstrap.min.css', '1.0', 'all');
    wp_enqueue_style('owl.carousel.min', get_stylesheet_directory_uri() . '/css/owl.carousel.min.css', '1.01', '1.01');
    wp_enqueue_style('owl.theme.default.min', get_stylesheet_directory_uri() . '/css/owl.theme.default.min.css', '1.01', '1.01');
    //wp_enqueue_style('allcss', get_stylesheet_directory_uri() . '/css/all.css', '1.01', '1.01');
    if (is_page(array(147))) {
        wp_enqueue_style('jquery.fullPage', get_stylesheet_directory_uri() . '/css/jquery.fullPage.css', '1.01', '1.01', 'all and (min-width: 768px)');
    }
    //Js Files  
    wp_enqueue_script('bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '1.1', true);
    if (is_page(array(147))) {
        wp_enqueue_script("fullPage.min-js", get_template_directory_uri() . '/js/jquery.fullPage.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script("easings.min-js", get_template_directory_uri() . '/js/jquery.easings.min.js', array('jquery'), 1.1, true);
        wp_enqueue_script("scrolloverflow.min-js", get_template_directory_uri() . '/js/scrolloverflow.min.js', array('jquery'), 1.1, true);
    }
    wp_enqueue_script("owlcarouseljs", get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), 1.1, true);
    if (is_page(array(152))) {
        wp_enqueue_script("isotope.pkgd.min-js", get_template_directory_uri() . '/js/isotope.pkgd.min.js', array('jquery'), 1.1, true);
    }
    wp_enqueue_script('mainjs', get_template_directory_uri() . '/js/main.js', array(), '1.5', true);
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.14.0/css/all.css');
    //wp_enqueue_script("jqueryjs", get_template_directory_uri() . '/js/jquery.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'scriptenqueue');

//navigation menu

register_nav_menus(array(
    'primary' => __('Primary menu'),
    'footer' => __('pages menu')
));

//them setup
function catalyst_setup() {

    //Add featured image support
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'catalyst_setup');

//featured post

function extra_user_profile_fields($user) {
    $meta = get_user_meta($user->ID, 'meta_key_name', false);
}

/**
 *  @desc  New allowed mime types
 *  @author Catalyst
 *  @date 12/11/2019
 */
function my_custom_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    $mimes['doc'] = 'application/msword';
    unset($mimes['exe']);
    return $mimes;
}

add_filter('upload_mimes', 'my_custom_mime_types');

//Add our Widget location
function ourWidgetsInit() {
    //footer Area bar
    register_sidebar(array(
        'name' => 'social Link',
        'id' => 'social-link',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="my-special-class">',
        'after_title' => '</h6>'
    ));
    register_sidebar(array(
        'name' => 'Company Info',
        'id' => 'company-info',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="my-special-class">',
        'after_title' => '</h6>'
    ));
    register_sidebar(array(
        'name' => 'Company Address',
        'id' => 'company-address',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="my-special-class">',
        'after_title' => '</h6>'
    ));
    register_sidebar(array(
        'name' => 'Footer Content',
        'id' => 'footer-content',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="my-special-class">',
        'after_title' => '</h6>'
    ));
}

add_action('widgets_init', 'ourWidgetsInit');

//blog page
//Add our custom post type

function create_posttype() {
    //set UI labels for custom post type
    $labels = array(
        'name' => _X('Project', 'post type general name', 'Catalyst'),
        'singular_name' => _x('Project', 'post type singular name', 'Catalyst'),
        'menu_name' => __('Project', 'Catalyst'),
        'parent_item_colon' => __('parent Project', 'Catalyst'),
        'all_items' => __('All Project', 'Catalyst'),
        'view_items' => __('view Project', 'Catalyst'),
        'add_new_item' => __('add new Project', 'Catalyst'),
        'add_new' => __('add new', 'Catalyst'),
        'edit_item' => __('edit Project', 'Catalyst'),
        'update_item' => __('update Project', 'Catalyst'),
        'search_item' => __('search Project', 'Catalyst'),
        'not_found' => __('not found', 'Catalyst'),
        'not_found_in_trash' => __('not found in trash', 'Catalyst'),
    );
    //set other options for custom post type
    $args = array(
        'label' => __('Project', 'Catalyst'),
        'description' => __('Project news and reviews', 'Catalyst'),
        'labels' => $labels,
        //features this CPT supports in post editor
        'supports' => array('title', 'editor', 'excerpt', 'author', 'content', 'thumbnail', 'comments', 'revisions', 'custom-fields',),
        //you can associate this CPT is with a taxonomy or cumstom taxonomy.
        //'taxonomies' => array('genres'),
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
        'show_Project' => 3,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'show_in_rest' => true,
        'capability_type' => 'post',
        // This is where we add taxonomies to our CPT
        'taxonomies' => array('category'),
    );
    //registering your custom post type
    register_post_type('project', $args);
}

add_action('init', 'create_posttype');

// hide the meta tag generator from head and rss
function disable_version() {
   return '';
}
add_filter('the_generator','disable_version');