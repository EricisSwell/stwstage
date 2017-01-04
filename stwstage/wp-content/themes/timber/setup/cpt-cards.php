<?php

// Cards Custom Post Type
function custom_post_type_cards() {

    $labels = array(
        'name'                => _x( 'Cards', 'Post Type General Name', 'text_domain' ),
        'singular_name'       => _x( 'Card', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'           => __( 'Cards', 'text_domain' ),
        'name_admin_bar'      => __( 'Cards', 'text_domain' ),
        'parent_item_colon'   => __( 'Cards:', 'text_domain' ),
        'all_items'           => __( 'All Cards', 'text_domain' ),
        'add_new_item'        => __( 'Add New Card', 'text_domain' ),
        'add_new'             => __( 'Add New', 'text_domain' ),
        'new_item'            => __( 'New Card', 'text_domain' ),
        'edit_item'           => __( 'Edit Card', 'text_domain' ),
        'update_item'         => __( 'Update Card', 'text_domain' ),
        'view_item'           => __( 'View Card', 'text_domain' ),
        'search_items'        => __( 'Search Card', 'text_domain' ),
        'not_found'           => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
    );
    $rewrite = array(
        'slug'                => 'cards',
        'with_front'          => false,
        'pages'               => true,
        'feeds'               => true,
    );
    $args = array(
        'label'               => __( 'card', 'text_domain' ),
        'description'         => __( 'Saving the West Cards', 'text_domain' ),
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
        'query_var'           => 'card',
        'rewrite'             => $rewrite,
        'capability_type'     => 'page',
    );
    register_post_type( 'cards', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type_cards', 0 );

?>
