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