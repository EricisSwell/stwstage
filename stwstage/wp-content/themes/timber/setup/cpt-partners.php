<?php

// Partners Custom Post Type
function custom_post_type_partners() {

    $labels = array(
        'name'                => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Partners', 'text_domain' ),
        'name_admin_bar'      => __( 'Partners', 'text_domain' ),
        'parent_item_colon'   => __( 'Partners:', 'text_domain' ),
        'all_items'           => __( 'All Partners', 'text_domain' ),
        'add_new_item'        => __( 'Add New Partner', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Partner', 'text_domain' ),
        'edit_item'           => __( 'Edit Partner', 'text_domain' ),
        'update_item'         => __( 'Update Partner', 'text_domain' ),
        'view_item'           => __( 'View Partner', 'text_domain' ),
        'search_items'        => __( 'Search Partner', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                => 'partners',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'partner', 'text_domain' ),
        'description'         => __( 'Saving the West Partners', 'text_domain' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
        'taxonomies'          => array(),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-id-alt',
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
    register_post_type( 'partners', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_partners', 0 );

?>
