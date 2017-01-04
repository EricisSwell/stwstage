<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.2
 */

$templates = array( 'archive.twig', 'index.twig' );

$data = Timber::get_context();

$data['title'] = 'Archive';
if ( is_day() ) {
    $data['title'] = 'Archive: '.get_the_date( 'D M Y' );
} else if ( is_month() ) {
    $data['title'] = 'Archive: '.get_the_date( 'M Y' );
} else if ( is_year() ) {
    $data['title'] = 'Archive: '.get_the_date( 'Y' );
} else if ( is_tag() ) {
    $data['title'] = single_tag_title( '', false );
} else if ( is_category() ) {
    $cat_id = get_query_var( 'cat' );
    $data['title'] = single_cat_title( '', false );
    $data['term'] = get_category($cat_id);
    array_unshift( $templates, 'archive-' . get_query_var( 'cat_name' ) . '.twig' );
} else if ( is_tax() ) {
    $data['title'] = single_cat_title( '', false );
    $data['term'] = new TimberTerm();
     array_unshift( $templates, 'archive-' . get_query_var( 'cat' ) . '.twig' );
} else if ( is_post_type_archive() ) {
    $post_type_slug = get_query_var( 'post_type' );
    // display single page for banner
    $data['post'] = Timber::get_post('pagename='.$post_type_slug);
    array_unshift( $templates, 'archive-' . get_post_type() . '.twig' );
}

$data['posts'] = Timber::get_posts();
$data['pagination'] = Timber::get_pagination();
$data['sponsored'] = Timber::get_posts('post_type=post&highlight=sponsored&numberposts=1');
$data['partners'] = Timber::get_posts('post_type=highlight&numberposts=4');
Timber::render( $templates, $data );
