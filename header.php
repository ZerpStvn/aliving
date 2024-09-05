<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class();

$latest_editorial = new WP_Query(array(
    'post_type' => 'editorial',
    'posts_per_page' => 1,
));

$latestEditorialpost = new WP_Query(array(
    'post_type' => 'editorial',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => '_editorial_status',
            'value' => 'product_recommendation',
            'compare' => '='
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 1,
));
if ($latestEditorialpost->have_posts()):
    $latestEditorialpost->the_post();
    $latestEditorialpost = get_permalink();
    wp_reset_postdata();
else:

    $latestEditorialpost = home_url();
endif;

if ($latest_editorial->have_posts()):
    $latest_editorial->the_post();
    $latest_editorial_url = get_permalink();
    wp_reset_postdata();
else:

    $latest_editorial_url = home_url();
endif;
?>>
    <header class="sticky-header">
        <div class="<?php if (is_page('collection'))
            echo 'coloredheader'; ?> headerwrap global_padding">
            <div class="centerheader global_width">
                <div class="<?php if (!is_page('home')) {
                    echo 'logocont';
                } else {
                    echo 'logocontainer';
                } ?>">
                    <a href="<?php echo get_home_url() ?>"> <img id="site-logo" src="<?php if (is_single()) {
                           echo esc_url(aliving_image . '/logo4.png');
                       } else {
                           echo esc_url(aliving_image . '/Logo1.png');
                       } ?>" loading="lazy" alt="Main Logo"></a>
                </div>
                <a href="#" id="hamburgermenu">Menu <span class="material-symbols-outlined">
                        menu
                    </span></a>
                <nav class="navmenuheader">
                    <li>
                        <a href="<?php echo get_home_url() ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url($latest_editorial_url); ?>">Editorial</a>
                    </li>
                    <li class="collection-header">
                        <a id="collectionnav" href="">Collections <span class="material-symbols-outlined">
                                keyboard_arrow_down
                            </span></a>
                        <ul class="sub-menu">
                            <li><a href="<?php echo get_site_url() . "/decor" ?>">Decor</a></li>
                            <li> <a href="<?php echo get_site_url() . "/house-keeping" ?>">Housekeeping</a></li>
                            <li> <a href="<?php echo get_site_url() . "/home-improvement" ?>">Home Improvement</a></li>
                            <li><a href="<?php echo get_site_url() . "/gardening" ?>">Gardening</a></li>
                            <li><a href="<?php echo get_site_url() . "/what-to-buy" ?>">What to Buy</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo get_site_url() . "/product-recommendation" ?>">Product Recommendation</a>
                    </li>
                    <li>
                        <a href="<?php echo get_site_url() . "/gifts" ?>">Gifts</a>
                    </li>

                </nav>
            </div>
        </div>
        <?php
        popupmenu();
        ?>
    </header>
    <main>