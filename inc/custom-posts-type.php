<?php
add_action('init', 'register_services');
function register_services(){
    $labels = array(
        'name' => __('Services', 'corppix_site'), 
        'singular_name' => 'Service',
        'menu_name' => __('Services', 'corppix_site'), 
        'all_items' => __('All', 'corppix_site'),           
        'add_new' =>  __('Add', 'corppix_site'),
        'add_new_item' => __('Add', 'corppix_site'),
        'edit_item' => __('Edit', 'corppix_site'),
        'view_item' => __('View', 'corppix_site'),
        'search_items' => __('Search', 'corppix_site'),
        'not_found' =>  __('Not Found', 'corppix_site'),
        'not_found_in_trash' => __('Not Found In Trash', 'corppix_site'),
        'new_item' => __('New Item', 'corppix_site'),    
        );

    $supports = array(
        'title',
        'thumbnail',
        'editor'
        );
    $rewrite = array(
        'slug' => 'services', 
        'with_front' => false,
        'pages' => true, 
        );
    $args = array(
        'labels' => $labels,
        'supports' => $supports,
        'rewrite' => $rewrite,
        'label' => 'services',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_admin_bar' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'hierarchical' => false,
        'has_archive' => true,
        'query_var' => true,    
        'show_in_rest' => true,
    );
    register_post_type('services-post',$args);
}

add_action('init', 'register_cases');
function register_cases(){
    $labels = array(
        'name' => __('Cases', 'corppix_site'), 
        'singular_name' => 'Case',
        'menu_name' => __('Cases', 'corppix_site'), 
        'all_items' => __('All', 'corppix_site'),           
        'add_new' =>  __('Add', 'corppix_site'),
        'add_new_item' => __('Add', 'corppix_site'),
        'edit_item' => __('Edit', 'corppix_site'),
        'view_item' => __('View', 'corppix_site'),
        'search_items' => __('Search', 'corppix_site'),
        'not_found' =>  __('Not Found', 'corppix_site'),
        'not_found_in_trash' => __('Not Found In Trash', 'corppix_site'),
        'new_item' => __('New Item', 'corppix_site')      
        );

    $supports = array(
        'title',
        'thumbnail',
        'editor'
        );
    $rewrite = array(
        'slug' => 'cases', 
        'with_front' => false,
        'pages' => true, 
        );
    $args = array(
        'labels' => $labels,
        'supports' => $supports,
        'rewrite' => $rewrite,
        'label' => 'cases',
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_admin_bar' => true,
        'show_in_menu' => true,
        'menu_position' => 20,
        'menu_icon' => 'dashicons-portfolio',
        'hierarchical' => false,
        'has_archive' => true,
        'query_var' => true,    
        'show_in_rest' => true,
    );
    register_post_type('cases-post',$args);
}


function add_case_taxonomies() {

  register_taxonomy('case-cat', 'cases-post', array(

    'hierarchical' => true,
    'show_in_rest' => true,

    'labels' => array(
      'name' => __( 'Categories', 'corppix_site' ),
      'singular_name' => _x( 'Category', 'corppix_site' ),
      'search_items' =>  __( 'Search', 'corppix_site' ),
      'all_items' => __( 'All', 'corppix_site' ),
      'parent_item' => __( 'Parent', 'corppix_site' ),
      'parent_item_colon' => __( 'Parent:', 'corppix_site' ),
      'edit_item' => __( 'Edit', 'corppix_site' ),
      'update_item' => __( 'Update', 'corppix_site' ),
      'add_new_item' => __( 'Add New', 'corppix_site' ),
      'new_item_name' => __( 'New Category' , 'corppix_site'),
      'menu_name' => __( 'Categories', 'corppix_site' ),
    ),

    'rewrite' => array(
      'slug' => 'cases-cat',
      'with_front' => false, 
      'hierarchical' => true,
    ),
  ));
}
add_action( 'init', 'add_case_taxonomies', 0 );