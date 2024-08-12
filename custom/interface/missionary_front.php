<?php

function missionary_front1()
{
    ?>
    <div class="missionary_front1">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_service',
                        'value' => 'decor',
                        'compare' => '='
                    ),

                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 1,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <div class="listcontent">
                    <section>
                        <h1><?php echo truncate_title(30) ?></h1>
                        <h2><?php echo truncate_excerpt(180) ?></h2>
                        <p>By <?php echo get_author_name() ?></p>

                    </section>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="image">
                </div>
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

function missionary_front2()
{
    ?>
    <div class="missionary_front2">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_service',
                        'value' => 'house_improvement',
                        'compare' => '='
                    ),
                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 2, // Limit to 2 posts
            )
        );

        if ($trending_query->have_posts()):
            $post_count = 0; // Initialize a counter
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                $post_count++;
                if ($post_count == 1): // First post
                    ?>
                    <div class="leftcorner"
                        style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>); background-position: center; background-repeat: no-repeat; background-size: cover; position:relative;">
                        <section>
                            <?php getlist_categories(); ?>
                            <h1><?php echo truncate_title(50); ?></h1>
                        </section>
                    </div>

                    <?php
                elseif ($post_count == 2): // Second post
                    ?>

                    <div class="rightcontent">
                        <!-- Your content here for the second post -->
                        <section>
                            <h1><?php echo truncate_title(50) ?></h1>
                            <h2><?php echo truncate_excerpt(110) ?></h2>
                            <p>By <?php echo get_author_name() ?></p>

                        </section>
                    </div>
                    <?php
                endif;
            endwhile;
            wp_reset_postdata();
        else:
            echo '<div>No posts available.</div>';
        endif;
        ?>
    </div>
    <?php
}
