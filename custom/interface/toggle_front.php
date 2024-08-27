<?php

function toggleFronts()
{
    $categories = array('decor', 'house_improvement', 'home_improvement', 'garden');
    $panel_count = count($categories);
    $url_service = null;
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

                        } else if ($index === 1) {
                            echo "House Keeping";

                        } else if ($index === 2) {
                            echo "Home Improvements";
                        } else if ($index === 3) {
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
                                    <a class="readmore" href="<?php
                                    if ($index === 0) {
                                        $url_service = "/decor/";

                                    } else if ($index === 1) {
                                        $url_service = "/house-keeping/";


                                    } else if ($index === 2) {
                                        $url_service = "/home-improvements/";
                                    } else if ($index === 3) {
                                        $url_service = "/gardening/";
                                    }
                                    echo get_site_url() . $url_service ?>">Rea more <span><img
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
    $url_service1 = null;
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
                                    <a class="readmore" href="<?php

                                    if ($index === 0) {
                                        $url_service1 = "/decor/";

                                    } else if ($index === 1) {
                                        $url_service1 = "/house-keeping/";


                                    } else if ($index === 2) {
                                        $url_service1 = "/home-improvement/";
                                    } else if ($index === 3) {
                                        $url_service1 = "/gardening/";
                                    } else if ($index === 4) {
                                        $url_service1 = "/whattobuy/";
                                    }

                                    echo get_site_url() . $url_service1;
                                    ?>">Rea more <span><img
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

function toggleFrontsmobile($whattobuy = false)
{
    $categories = array('decor', 'house_improvement', 'home_improvement', 'garden', 'whattobuuy');
    $panel_count = count($categories);
    $url_service = null;
    ?>
    <ul class="tabstoggle">
        <li class="decor pannel1">
            <h1>01</h1>
            <a href="#"> Decor</a>

        </li>
        <li class="house_keeping pannel2">
            <h1>02</h1>
            <a href="#"> House Keeping</a>

        </li>
        <li class="home_improvements pannel3">
            <h1>03</h1>
            <a href="#"> Home Improvements</a>

        </li>
        <li class="gardening pannel4">
            <h1>04</h1>
            <a href="#"> Gardening</a>
        </li>

    </ul>
    <ul class="togglemobilewrap ">
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
                'posts_per_page' => 3,
            );
            $toggle_front_arg1 = new WP_Query($query_args);
            ?>
            <li class="pannelcontent  <?php echo $index === 0 ? 'active' : ''; ?>" id="pannelwrap<?php echo $index + 1; ?>">
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
                            <div class="rigthcorner">
                                <a class="readmore" href="<?php
                                if ($index === 0) {
                                    $url_service = "/decor/";

                                } else if ($index === 1) {
                                    $url_service = "/house-keeping/";


                                } else if ($index === 2) {
                                    $url_service = "/home-improvement/";
                                } else if ($index === 3) {
                                    $url_service = "/gardening/";
                                }
                                echo get_site_url() . $url_service ?>">Rea more <span
                                        class="material-symbols-outlined">
                                        arrow_forward
                                    </span></a>
                            </div>
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

                                    </a>
                                </div>
                                <?php
                                $count++;
                            endwhile;
                            ?>

                        </div>
                    </div>
                <?php else: ?>
                    <div style="color:white">No posts available in this category.</div>
                <?php endif; ?>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}

function toggleFrontsmobile2()
{
    $categories = array('decor', 'house_improvement', 'home_improvement', 'garden', 'whattobuuy');
    $panel_count = count($categories);
    $url_service = null;
    ?>
    <ul class="tabstoggle toggle2">
        <li class="decor pannel1">
            <h1>01</h1>
            <a href="#"> Decor</a>

        </li>
        <li class="house_keeping pannel2">
            <h1>02</h1>
            <a href="#"> House Keeping</a>

        </li>
        <li class="home_improvements pannel3">
            <h1>03</h1>
            <a href="#"> Home Improvements</a>

        </li>
        <li class="gardening pannel4">
            <h1>04</h1>
            <a href="#"> Gardening</a>
        </li>
        <li class="whattobuy pannel5">
            <h1>05</h1>
            <a href="#"> What To Buy</a>
        </li>
    </ul>
    <ul class="togglemobilewrap ">
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
                'posts_per_page' => 3,
            );
            $toggle_front_arg1 = new WP_Query($query_args);
            ?>
            <li class="pannelcontent  <?php echo $index === 0 ? 'active' : ''; ?>" id="pannelwrap<?php echo $index + 1; ?>">
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
                            <div class="rigthcorner">
                                <a class="readmore" href="<?php
                                if ($index === 0) {
                                    $url_service = "/decor/";

                                } else if ($index === 1) {
                                    $url_service = "/house-keeping/";


                                } else if ($index === 2) {
                                    $url_service = "/home-improvement/";
                                } else if ($index === 3) {
                                    $url_service = "/gardening/";
                                }
                                echo get_site_url() . $url_service ?>">Rea more <span
                                        class="material-symbols-outlined">
                                        arrow_forward
                                    </span></a>
                            </div>
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

                                    </a>
                                </div>
                                <?php
                                $count++;
                            endwhile;
                            ?>

                        </div>
                    </div>
                <?php else: ?>
                    <div style="color:white">No posts available in this category.</div>
                <?php endif; ?>
            </li>
            <?php
        }
        ?>
    </ul>
    <?php
}