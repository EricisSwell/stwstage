<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$data = Timber::get_context();
$post = Timber::query_post();
$data['post'] = $post;
$data['wp_title'] .= ' - ' . $post->title();
$data['comment_form'] = TimberHelper::get_comment_form();

// To get some posts:
$data['sponsored'] = Timber::get_posts('post_type=post&highlight=sponsored&numberposts=1');

$data['related_articles_default'] = Timber::get_posts(array(
    'post_type' => array('post'),
    'numberposts'    => 10,
    'orderby'        => 'post_date',
    'order'          => 'DESC',
    'post__not_in' => array($post->ID),
    )
);

shuffle($data['related_articles_default']);

if ( post_password_required( $post->ID ) ) {
    Timber::render( 'single-password.twig', $context );
} else {
    Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $data );
}
