<?php

/*
Template Name: Join
*/

$data = Timber::get_context();
$home = new TimberPost();

$data['home'] = $home;
$args = 'post_type=hero&numberposts=1';
$data['hero'] = Timber::get_post($args);
$args = 'post_type=lightbox&numberposts=1';
$data['lightbox'] = Timber::get_post($args);
$data['partners'] = Timber::get_posts('post_type=partners&numberposts=4');

// Get latest partner post
$data['partner_posts'] = Timber::get_posts('post_type=post&highlight=from-our-partners&numberposts=1');
if (!empty($data['partner_posts'])){
    $partner_id = $data['partner_posts'][0]->ID;
} else {
    $partner_id = 0;
}

// Get latest spnsored post
$data['sponsored'] = Timber::get_posts('post_type=post&highlight=sponsored&numberposts=1');
if (!empty($data['sponsored'])){
    $sponsored_id = $data['sponsored'][0]->ID;
} else {
    $sponsored_id = 0;
}

// Get the 10 most recent blog posts that aren't sponsored or partner
$data['posts'] = Timber::get_posts(array(
    'post_type' => array('post'),
    'numberposts'    => 11,
    'orderby'        => 'post_date',
    'order'          => 'DESC',
    'post__not_in' => array($sponsored_id, $partner_id),
    )
);

Timber::render('template-home.twig', $data);


