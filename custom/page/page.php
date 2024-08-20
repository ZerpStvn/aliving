<?php

function add_customer_pages()
{
    $pages = array(
        array(
            'post_title' => 'Home',
            'post_content' => 'Home',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'home'
        ),
        array(
            'post_title' => 'Decor',
            'post_content' => 'Decor',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'decor'
        ),
        array(
            'post_title' => 'House Keeping',
            'post_content' => 'House Keeping',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'house-keeping'
        ),
        array(
            'post_title' => 'Home Improvement',
            'post_content' => 'Home Improvement',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'home-improvement'
        ),
        array(
            'post_title' => 'Gardening',
            'post_content' => 'Gardening',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'gardening'
        ),
        array(
            'post_title' => 'What to Buy',
            'post_content' => 'What to Buy',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'what-to-buy'
        ),
        array(
            'post_title' => 'Editorial',
            'post_content' => 'Editorial',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'editorial'
        ),
        array(
            'post_title' => 'Product Recomendation',
            'post_content' => 'Product Recomendation',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'product-recommendation'
        ),
        array(
            'post_title' => 'Gifts',
            'post_content' => 'Gifts',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'gifts'
        ),
        array(
            'post_title' => '404',
            'post_content' => '404',
            'post_status' => 'publish',
            'post_author' => 1,
            'post_type' => 'page',
            'post_name' => 'not-found '
        ),




    );

    foreach ($pages as $page) {
        $existing_page = get_page_by_path($page['post_name']);
        if (is_null($existing_page)) {
            wp_insert_post($page);
        }
    }
    $homepage = get_page_by_path('home');
    update_option('page_on_front', $homepage->ID);
    update_option('show_on_front', 'page');



}
add_action('init', 'add_customer_pages');