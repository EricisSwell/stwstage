<?php
// Register Custom Taxonomy
function custom_taxonomy_sponsored() {
	$labels = array(
		'name'                       => _x( 'Highlights', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Highlight', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Highlight Types', 'text_domain' ),
		'all_items'                  => __( 'Highlights', 'text_domain' ),
		'parent_item'                => __( 'Parent Highlight', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Highlight:', 'text_domain' ),
		'new_item_name'              => __( 'New Highlight Type', 'text_domain' ),
		'add_new_item'               => __( 'Add Highlight Type', 'text_domain' ),
		'edit_item'                  => __( 'Edit Highlight Type ', 'text_domain' ),
		'update_item'                => __( 'Update Highlight Type', 'text_domain' ),
		'view_item'                  => __( 'View Highlight Type', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate highlight types with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove highlight types', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular states', 'text_domain' ),
		'search_items'               => __( 'Search states', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                       => 'highlight',
		'with_front'                 => false,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'highlight',
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'highlight', array( 'post' ), $args );
}
add_action( 'init', 'custom_taxonomy_sponsored', 0 );