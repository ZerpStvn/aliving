<?php

function theme_enqueue_styles()
{
    wp_register_style('common_css', aliving_css . '/common.css', array(), '1.0', 'all');
    wp_register_style('home_css', aliving_css . '/home.css', array(), '1.2', 'all');
    wp_register_style('slick_css', aliving_css . '/slick.css', array(), '1.3', 'all');
    wp_register_style('root_css', aliving_css . '/root.css', array(), '1.4', 'all');
    wp_register_style('collection_css', aliving_css . '/collection.css', array(), '1.5', 'all');
    wp_register_style('main_article_css', aliving_css . '/main_article.css', array(), '1.6', 'all');
    wp_register_style('main_article2_css', aliving_css . '/main_article2.css', array(), '1.7', 'all');
    wp_register_style('single_css', aliving_css . '/single.css', array(), '1.6', 'all');
    wp_register_script('common_js', aliving_js . '/common.js', array('jquery'), '1.0', true);
    wp_register_script('jquery_js', aliving_js . '/jquery.js', array('jquery'), '3.7.1', true);
    wp_register_script('slick_js', aliving_js . '/slick.js', array('jquery'), '1.2', true);


    // ======
    wp_enqueue_style('single_css');
    wp_enqueue_style('main_article2_css');
    wp_enqueue_style('common_css');
    wp_enqueue_style('collection_css');
    wp_enqueue_style('root_css');
    wp_enqueue_style('slick_css');
    wp_enqueue_style('main_article_css');
    wp_enqueue_style('home_css');
    wp_enqueue_script('common_js');
    wp_enqueue_script('jquery_js');
    wp_enqueue_script('slick_js');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function theme_enqueue_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100..900;1,100..900&display=swap', array(), null);
}
add_action('wp_enqueue_scripts', 'theme_enqueue_fonts');

// Add preconnect links
function add_preconnects()
{
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">';
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>';
}
add_action('wp_head', 'add_preconnects');

