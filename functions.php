<?php

define("aliving_dir", get_template_directory());
define("aliving_uri", get_template_directory_uri());
define("aliving_asst", aliving_uri . "/assets");
define("aliving_js", aliving_asst . "/js");
define("aliving_image", aliving_asst . '/image');
define("aliving_svg", aliving_asst . '/svg');
define('aliving_css', aliving_asst . '/css');


function theme_setup()
{
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

function truncate_title($length = 20, $append = '...')
{
    $title = get_the_title();
    if (strlen($title) > $length) {
        $title = substr($title, 0, $length) . $append;
    }
    return $title;
}
function truncate_excerpt($length = 40, $append = '...')
{
    $title = get_the_content();
    if (strlen($title) > $length) {
        $title = substr($title, 0, $length) . $append;
    }
    return $title;
}
function my_theme_register_menus()
{
    register_nav_menus(
        array(
            'primary' => __('Primary Menu', 'my-theme'),
            'footer' => __('Footer Menu', 'my-theme')
        )
    );
}
add_action('init', 'my_theme_register_menus');


function authorbio()
{
    $author_bio = get_the_author_meta('description');
    echo substr($author_bio, 0, 30);
}

function redirect_404_to_home()
{
    if (is_404()) {
        wp_redirect(site_url() . '/not-found');
        exit;
    }
}
add_action('template_redirect', 'redirect_404_to_home');


// show recent post

//================================================
include_once(aliving_dir . '/custom/main.php');