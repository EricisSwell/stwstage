<?php

// Hero Custom Post Type
function custom_post_type_hero() {

    $labels = array(
        'name'                => _x( 'Heroes', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Hero', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Hero', 'text_domain' ),
        'name_admin_bar'      => __( 'Heroes', 'text_domain' ),
        'parent_item_colon'   => __( 'Hero Item:', 'text_domain' ),
        'all_items'           => __( 'All Heroes', 'text_domain' ),
        'add_new_item'        => __( 'Add New Hero', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Hero', 'text_domain' ),
        'edit_item'           => __( 'Edit Hero', 'text_domain' ),
        'update_item'         => __( 'Update Hero', 'text_domain' ),
        'view_item'           => __( 'View Hero', 'text_domain' ),
        'search_items'        => __( 'Search Hero', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                => 'hero',
        'with_front'          => true,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'hero', 'text_domain' ),
        'description'         => __( 'Headlining page content and call to action', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'revisions' ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-format-image',
        'show_in_admin_bar'   => true,
        'show_in_nav_menus'   => true,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'query_var'           => 'hero',
        'rewrite'             => $rewrite,
        'capability_type'     => 'page',
    );
    register_post_type( 'hero', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_hero', 0 );

?>
