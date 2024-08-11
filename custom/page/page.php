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