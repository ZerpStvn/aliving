<?php

function morelikethisfront($service)
{
    ?>
    <ul class="morelikethiswraplist">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_service',
                        'value' => $service,
                        'compare' => '='
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 4,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <li>
                    <a href="<?php echo get_permalink() ?>">
                        <img class="image_list" src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="originals">
                        <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            $categories = array_slice($categories, 0, 1);
                            ?>
                            <div class="morelikethiscategory">
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
                    <h2><?php echo truncate_title(20) ?></h2>
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