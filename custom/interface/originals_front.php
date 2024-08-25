<?php

function originalsFronts()
{
    ?>
    <div class="orginalcarousel">
        <div class="wrapslider">
            <ul class="original_collections responsive">
                <?php
                $trending_query = new WP_Query(
                    array(
                        'post_type' => 'editorial',
                        'tax_query' => array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'category',
                                'field' => 'slug',
                                'terms' => 'a-list-of-living',
                            ),

                        ),
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 6,
                    )
                );

                if ($trending_query->have_posts()):
                    while ($trending_query->have_posts()):
                        $trending_query->the_post();
                        ?>
                        <li>
                            <a href="<?php echo get_permalink() ?>">
                                <img class="image_list" src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy"
                                    alt="originals">
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
                            </a>
                            <h2 class="original_title"><?php echo truncate_title(50) ?></h2>
                        </li>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                else:
                    echo '<div></div>';
                endif;
                ?>
            </ul>
        </div>
        <div class="buttonsarrow">

            <button id="arrow-left">
                <span class="material-symbols-outlined">
                    arrow_back
                </span></a>
            </button>
            <button id="arrow-right">
                <span class="material-symbols-outlined">
                    arrow_forward
                </span></a>
            </button>
        </div>
    </div>

    <?php
}