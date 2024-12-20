<?php

function trendFront($status, $type)
{
    ?>
    <ul class="treding_post_collection">
        <?php
        $trending_query = new WP_Query(array(
            'post_type' => 'editorial',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_editorial_status',
                    'value' => $status,
                    'compare' => '='
                ),
                array(
                    'key' => '_editorial_type',
                    'value' => $type,
                    'compare' => '='
                )
            ),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 2,
        ));

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <li>

                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo the_post_thumbnail_url(); ?>" loading="lazy" alt="<?php echo the_title(); ?>">
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
                        <h2 class="title"><?php echo truncate_title(40); ?></h2>
                        <p class="post_excerpt"><?php echo truncate_excerpt(80) ?></p>
                    </a>
                </li>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<li></li>';
        endif;
        ?>
    </ul>
    <?php
}

function trendFrontHottopics($status, $type)
{
    ?>
    <div class="treding_post_collection_hottopics">
        <?php
        $trending_query = new WP_Query(array(
            'post_type' => 'editorial',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_editorial_status',
                    'value' => $status,
                    'compare' => '='
                ),
                array(
                    'key' => '_editorial_type',
                    'value' => $type,
                    'compare' => '='
                )
            ),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 1,
        ));

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <a href="<?php echo get_permalink() ?>" class="hottopicswrap">
                    <h1><?php echo truncate_title('50') ?></h1>
                    <h2>By <?php echo get_author_name() ?></h2>
                </a>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<div></div>';
        endif;
        ?>
    </div>
    <?php
}

function trendFrontfeatured($status, $type)
{
    ?>
    <div class="treding_post_collection_featured">
        <?php
        $trending_query = new WP_Query(array(
            'post_type' => 'editorial',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_editorial_status',
                    'value' => $status,
                    'compare' => '='
                ),
                array(
                    'key' => '_editorial_type',
                    'value' => $type,
                    'compare' => '='
                )
            ),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 1,
        ));

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <a href="<?php echo get_permalink() ?>" class="featuredwrap">
                    <img loading="lazy" src="<?php echo get_the_post_thumbnail_url() ?>" alt="featured">
                    <div class="featuredetails">
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
                        <h2>
                            <?php echo truncate_title(60) ?>
                        </h2>
                    </div>
                </a>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<div></div>';
        endif;
        ?>
    </div>
    <?php
}