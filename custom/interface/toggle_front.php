<?php

function toggleFronts()
{
    $categories = array('decor', 'house_improvement', 'home_decoration', 'garden');
    $panel_count = count($categories);
    ?>

    <ul class="tooglepanelwrap">
        <?php
        foreach ($categories as $index => $category_slug) {
            $query_args = array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_service',
                        'value' => $category_slug,
                        'compare' => '='
                    ),

                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 5,
            );
            $toggle_front_arg1 = new WP_Query($query_args);
            ?>

            <li class="panels <?php echo $index === 0 ? 'active' : ''; ?>" id="pannel<?php echo $index + 1; ?>">
                <div class="pannelnumbers">
                    <h1><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></h1>
                    <h2>
                        <?php if ($index === 0) {
                            echo "Decor";
                        } else if ($index == 1) {
                            echo "House Keeping";
                        } else if ($index == 2) {
                            echo "Home Improvements";
                        } else if ($index == 3) {
                            echo "Gardening";
                        }
                        ; ?>
                    </h2>
                </div>
                <div class="pannelcontent <?php echo $index === 0 ? 'show-content ' : ''; ?>">
                    <?php if ($toggle_front_arg1->have_posts()): ?>
                        <?php $toggle_front_arg1->the_post(); ?>
                        <div class="contentwrapping">
                            <div class="recentcontent">
                                <a href="<?php echo get_permalink() ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="featured" loading="lazy">
                                    <h1><?php echo truncate_title(30) ?></h1>
                                    <h2><?php echo truncate_excerpt(150) ?></h2>
                                    <p>By <?php echo get_author_name() ?></p>
                                </a>
                            </div>
                            <div class="listofcontent">
                                <?php
                                $count = 0;
                                while ($toggle_front_arg1->have_posts() && $count < 3):
                                    $toggle_front_arg1->the_post();
                                    ?>
                                    <div class="list-item itemspresent<?php echo $count ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                $categories = array_slice($categories, 0, 1);
                                                ?>

                                                <div class="listofcategory">
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        ?>
                                                        <h1 class="category">
                                                            <?php echo esc_html($category->name) ?>
                                                        </h1>

                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <?php
                                            }
                                            ?>
                                            <h2><?php echo truncate_title(50) ?></h2>
                                            <h3><?php echo truncate_excerpt(90) ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                ?>
                                <div class="rigthcorner">
                                    <a class="readmore" href="">Rea more <span><img
                                                src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                                alt="arrow_icon"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div style="color:white">No posts available in this category.</div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </li>

            <?php
        }
        ?>
    </ul>
    <?php
}
function collectiontoggleFronts()
{
    $categories = array('decor', 'house_keeping', 'home_improvement', 'garden', 'whattobuy');
    $panel_count = count($categories);
    ?>

    <ul class="tooglepanelwrap">
        <?php
        foreach ($categories as $index => $category_slug) {
            $query_args = array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_service',
                        'value' => $category_slug,
                        'compare' => '='
                    ),

                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 5, // Get 5 posts, 1 for the featured and 4 for the list
            );
            $toggle_front_arg1 = new WP_Query($query_args);
            ?>

            <li class="panels <?php echo $index === 0 ? 'active' : ''; ?>" id="pannel<?php echo $index + 1; ?>">
                <div class="pannelnumbers">
                    <h1><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT); ?></h1>
                    <h2>
                        <?php if ($index === 0) {
                            echo "Decor";
                        } else if ($index == 1) {
                            echo "House Keeping";
                        } else if ($index == 2) {
                            echo "Home Improvements";
                        } else if ($index == 3) {
                            echo "Gardening";
                        } else if ($index == 4) {
                            echo "What To Buy";
                        }
                        ; ?>
                    </h2>
                </div>
                <div class="pannelcontent <?php echo $index === 0 ? 'show-content ' : ''; ?>">
                    <?php if ($toggle_front_arg1->have_posts()): ?>
                        <?php $toggle_front_arg1->the_post(); ?>
                        <div class="contentwrapping">
                            <div class="recentcontent">
                                <a href="<?php echo get_permalink() ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="featured" loading="lazy">
                                    <h1><?php echo truncate_title(30) ?></h1>
                                    <h2><?php echo truncate_excerpt(150) ?></h2>
                                    <p>By <?php echo get_author_name() ?></p>
                                </a>
                            </div>
                            <div class="listofcontent">
                                <?php
                                $count = 0;
                                while ($toggle_front_arg1->have_posts() && $count < 3):
                                    $toggle_front_arg1->the_post();
                                    ?>
                                    <div class="list-item itemspresent<?php echo $count ?>">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php
                                            $categories = get_the_category();
                                            if (!empty($categories)) {
                                                $categories = array_slice($categories, 0, 1);
                                                ?>

                                                <div class="listofcategory">
                                                    <?php
                                                    foreach ($categories as $category) {
                                                        ?>
                                                        <h1 class="category">
                                                            <?php echo esc_html($category->name) ?>
                                                        </h1>

                                                        <?php
                                                    }
                                                    ?>
                                                </div>

                                                <?php
                                            }
                                            ?>
                                            <h2><?php echo truncate_title(50) ?></h2>
                                            <h3><?php echo truncate_excerpt(90) ?></h3>
                                        </a>
                                    </div>
                                    <?php
                                    $count++;
                                endwhile;
                                ?>
                                <div class="rigthcorner">
                                    <a class="readmore" href="">Rea more <span><img
                                                src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                                alt="arrow_icon"></span></a>
                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div style="color:white">No posts available in this category.</div>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </li>

            <?php
        }
        ?>
    </ul>
    <?php
}