<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('-', true, 'right'); ?> <?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="sticky-header">
        <div class="<?php if (is_page('collection'))
            echo 'coloredheader'; ?> headerwrap global_padding">
            <div class="centerheader global_width">
                <div class="logocontainer">
                    <img src="<?php echo esc_url(aliving_image . '/Logo1.png'); ?>" loading="lazy" alt="Main Logo">
                </div>
                <nav>
                    <li>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <a href="">Collections</a>
                    </li>
                    <li>
                        <a href="">Editiorial</a>
                    </li>
                    <li>
                        <a href="">Article</a>
                    </li>
                    <li>
                        <a href="">Products</a>
                    </li>
                    <li>
                        <a href="">Gifts</a>
                    </li>
                    <li>
                        <a href="">Contact</a>
                    </li>
                </nav>
            </div>
        </div>
    </header>
    <main>