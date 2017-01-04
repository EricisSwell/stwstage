<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
    echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
    return;
}

$data = Timber::get_context();

// Get sponsored post, and then all posts (ecluding the sponsored one)

$data['sponsored'] = Timber::get_posts('post_type=post&highlight=sponsored&numberposts=1');
$sponsored = $data['sponsored'][0];

$data['posts'] = Timber::get_posts();
$data['posts'] = Timber::get_posts(array(
    'post_type' => array('post'),
    'numberposts'    => 10,
    'orderby'        => 'post_date',
    'order'          => 'DESC',
    'post__not_in' => array($sponsored->ID),
    )
);

$data['pagination'] = Timber::get_pagination();

Timber::render( 'archive.twig', $data );
