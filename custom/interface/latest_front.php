<?php

function ourlastestpost($postslug = null)
{

    ?>
    <ul class="ourlatestcollection">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_editorial_status',
                        'value' => !empty($postslug) ? $postslug : array(),
                        'compare' => '='
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 8,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <li>
                    <a href="<?php echo get_permalink() ?>" class="latestwrap">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="latest">
                        <h1>
                            <?php echo truncate_title(20) ?>
                        </h1>
                        <p>
                            By <?php echo get_author_name() ?>
                        </p>
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


function ourlastestpost2($postslug = null)
{

    ?>
    <ul class="ourlatestcollection">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_editorial_status',
                        'value' => !empty($postslug) ? $postslug : array(),
                        'compare' => '='
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 8,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <li>
                    <a href="<?php echo get_permalink() ?>" class="latestwrap">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="latest">
                        <div class="infoprod">
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
                            <h1>
                                <?php echo truncate_title(40) ?>
                            </h1>
                            <p>
                                By <?php echo get_author_name() ?>
                            </p>
                        </div>
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