<?php

function articlefeatured($status, $type)
{
    ?>
    <div class="articlefeatured_collection">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                // 'meta_query' => array(
                //     'relation' => 'AND',
                //     array(
                //         'key' => '_editorial_status',
                //         'value' => $status,
                //         'compare' => '='
                //     ),
                //     array(
                //         'key' => '_editorial_type',
                //         'value' => $type,
                //         'compare' => '='
                //     )
                // ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 1,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <a href="<?php echo get_permalink() ?>" class="articlefeatured">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="featured article">
                    <div class="articlefeatured_details">
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
                            <?php echo truncate_title(50) ?>
                        </h2>
                        <h3><?php echo truncate_excerpt(100) ?></h3>
                        <h4>By <?php echo get_author_name() ?></h4>
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

function listofarticle($type, )
{
    ?>
    <ul class="collection_article">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_editorial_type',
                        'value' => $type,
                        'compare' => '='
                    ),

                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 5,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>

                <li class="listofarticle">
                    <a href="<?php echo get_permalink() ?>">
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
                        <h2 class="articletitle">
                            <?php echo truncate_title(50) ?>
                        </h2>
                    </a>
                </li>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<div></div>';
        endif;
        ?>
    </ul>
    <?php
}