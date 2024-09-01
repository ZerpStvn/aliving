<?php

function shopwithusfront($title, $description, $link, $slugs)
{
    ?>
    <ul class="shopwithus">
        <?php
        $recent_posts_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                // 'tax_query' => array(
                //     array(
                //         'taxonomy' => '_editorial_status',
                //         'field' => 'slug',
                //         'terms' => $slugs,
                //     ),
                // ),
                'meta_query' => array(
                    array(
                        'key' => '_editorial_status',
                        'value' => $slugs,
                        'compare' => '=',
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 2,
            )
        );

        $remaining_posts_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    array(
                        'key' => '_editorial_status',
                        'value' => $slugs,
                        'compare' => '=',
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 4,
                'offset' => 2,
            )
        );
        ?>

        <div class="columns">
            <!-- First Column: Recent 2 Posts -->
            <div class="mainleft">
                <div class="column left-column">
                    <?php
                    if ($recent_posts_query->have_posts()):
                        while ($recent_posts_query->have_posts()):
                            $recent_posts_query->the_post();
                            ?>
                            <li><a href="<?php echo get_permalink() ?>">

                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="featured"
                                        class="featuredimg">

                                    <div class="infosection">
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
                                        <h3>by <?php echo get_author_name() ?></h3>
                                    </div>
                                </a></li>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                    else:
                        echo '<div>No recent posts found.</div>';
                    endif;
                    ?>

                </div>
                <?php if ($recent_posts_query->found_posts != 0): ?>
                    <div class="title">
                        <h2><?php echo $title ?></h2>
                        <p><?php echo $description ?></p>
                        <a href="<?php echo esc_url($link) ?>">See More<span><img
                                    src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                    alt="arrow_icon"></span></a>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Second Column: Remaining 4 Posts -->
            <div class="column right-column">
                <?php
                if ($remaining_posts_query->have_posts()):
                    while ($remaining_posts_query->have_posts()):
                        $remaining_posts_query->the_post();
                        ?>
                        <li>
                            <a href="<?php echo get_permalink() ?>">
                                <div class="leftfeatured">
                                    <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="featured"
                                        class="featuredimg">
                                    <div class="infosection">
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
                                        <h2><?php echo truncate_title(30) ?></h2>
                                        <h3>by <?php echo get_author_name() ?></h3>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<div>No more posts found.</div>';
                endif;
                ?>
            </div>
        </div>
    </ul>
    <?php
}