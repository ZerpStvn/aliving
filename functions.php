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
// change login log
function my_custom_login_logo()
{
    ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/image/Logo2.png');
            height: 65px;
            width: 320px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }
    </style>
    <?php
}
add_action('login_enqueue_scripts', 'my_custom_login_logo');


// 
function filter_editorial_posts_by_author($query)
{
    // Check if we're in the admin area and it's the main query
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'editorial') {

        $current_user = wp_get_current_user();

        // If the user is not an administrator, filter posts by author
        if (!in_array('administrator', $current_user->roles)) {
            $query->set('author', $current_user->ID);
        }
    }
}
add_action('pre_get_posts', 'filter_editorial_posts_by_author');


// 
function my_theme_add_elementor_support()
{
    add_post_type_support('editorial', 'elementor');
}
add_action('init', 'my_theme_add_elementor_support');

// 
// Disable WordPress auto-update email notification
add_filter('auto_core_update_send_email', '__return_false');

// Disable theme and plugin update notifications in the admin dashboard
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_update_theme', '__return_false');
// Disable plugin auto-update notifications
add_filter('auto_update_plugin', '__return_false');
add_filter('auto_plugin_update_send_email', '__return_false');


function my_custom_admin_css()
{
    // Enqueue custom admin CSS file
    wp_enqueue_style('custom-admin-style', aliving_css . '/update.css');
}
add_action('admin_enqueue_scripts', 'my_custom_admin_css');

// custom widget
//================================================
include_once(aliving_dir . '/custom/main.php');