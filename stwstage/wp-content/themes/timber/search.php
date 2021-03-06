<?php
/**
 * Search results page
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

$templates = array( 'search.twig', 'archive.twig', 'index.twig' );
$data = Timber::get_context();

$data['title'] = 'Search results for '. get_search_query();
$data['post_parent'] = Timber::get_post(10);
$data['posts'] = Timber::get_posts();
$data['sponsored'] = Timber::get_posts('post_type=post&highlight=sponsored&numberposts=1');

Timber::render( $templates, $data );
