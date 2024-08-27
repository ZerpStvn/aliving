<?php
function missionaryfront()
{
    ?>
    <ul class="missionaryfrontwrap mobile">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 8,
            )
        );

        if ($trending_query->have_posts()):
            $post_count = 0;
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                $post_count++;

                if ($post_count == 1): ?>
                    <!-- Show the first latest content -->
                    <li>
                        <a href="<?php echo get_permalink() ?>">
                            <div class="first-latest">
                                <div class="infocontent">
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
                                    <h2><?php echo truncate_title(90); ?></h2>
                                    <h3><?php echo truncate_excerpt(210) ?></h3>
                                    <p>By <?php the_author(); ?></p>
                                </div>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="thumbnail">
                            </div>
                        </a>
                    </li>


                <?php endif;

            endwhile;
            wp_reset_postdata();
        else: ?>
            <div>No posts found.</div>
        <?php endif; ?>
    </ul>
    <ul class="missionaryfrontwrap desktop">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 8,
            )
        );

        if ($trending_query->have_posts()):
            $post_count = 0;
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                $post_count++;

                if ($post_count == 1): ?>
                    <!-- Show the first latest content -->
                    <li>
                        <a href="<?php echo get_permalink() ?>">
                            <div class="first-latest">
                                <div class="infocontent">
                                    <h2><?php echo truncate_title(40); ?></h2>
                                    <p>By <?php the_author(); ?></p>
                                </div>
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="thumbnail">
                            </div>
                        </a>
                    </li>

                <?php elseif ($post_count == 2 || $post_count == 3): ?>
                    <!-- Show the second and third latest content -->
                    <?php if ($post_count == 2): ?>
                        <li class="second-latest">
                            <a href="<?php echo get_permalink() ?>">
                                <div class="first-second-latest" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>)">
                                    <p>By <?php the_author(); ?></p>
                                    <h2><?php echo truncate_title(60); ?></h2>
                                </div>
                            </a>
                        <?php elseif ($post_count == 3): ?>
                            <a id="second-third-latest" href="<?php echo get_permalink() ?>">
                                <div class="second-third-latest">
                                    <h2><?php echo truncate_title(40); ?></h2>
                                    <h3><?php echo truncate_excerpt(90); ?></h3>
                                    <p>By <?php the_author(); ?></p>
                                </div>
                            </a>
                        </li>
                    <?php endif; ?>

                <?php elseif ($post_count >= 4 && $post_count <= 6): ?>
                    <!-- Start of the next three posts -->
                    <?php if ($post_count == 4): ?>
                        <li class="next-three-posts">
                        <?php endif; ?>
                        <!-- Show the 4th to 6th posts -->
                        <a href="<?php echo get_permalink() ?>" class="post">
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
                            <p><?php echo truncate_title(64); ?></p>
                        </a>
                        <?php if ($post_count == 6): ?>

                        </li> <!-- End of the next three posts -->
                    <?php endif; ?>
                <?php endif;

            endwhile;
            wp_reset_postdata();
        else: ?>
            <div>No posts found.</div>
        <?php endif; ?>
    </ul>
    <?php
}

function trendinglistview($status)
{
    ?>
    <div class="trendingpost">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',
                'meta_query' => array(
                    'relation' => 'AND',
                    array(
                        'key' => '_editorial_status',
                        'value' => $status,
                        'compare' => '='
                    ),

                ),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 4,
            )
        );

        if ($trending_query->have_posts()):
            $post_count = 0;
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                $post_count++;

                if ($post_count == 1): ?>
                    <!-- Show the first trending content -->
                    <a class="first-trendingcont" href="<?php echo get_permalink(); ?>">
                        <div class="first-latest-trending"
                            style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>)">
                            <div class="infocontent">
                                <p>By <?php the_author(); ?></p>
                                <h2><?php echo truncate_title(40); ?></h2>
                            </div>
                        </div>
                    </a>

                <?php else: ?>
                    <!-- Show the 2nd to 4th posts each as separate items -->
                    <div class="next-three-posts-trending">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="post">
                            <div class="left">
                                <?php
                                $categories = get_the_category();
                                if (!empty($categories)) {
                                    $categories = array_slice($categories, 0, 1);
                                    ?>
                                    <div class="listofcategory">
                                        <?php foreach ($categories as $category): ?>
                                            <h1 class="category">
                                                <?php echo esc_html($category->name); ?>
                                            </h1>
                                        <?php endforeach; ?>
                                    </div>
                                <?php } ?>
                                <p><?php echo truncate_title(40); ?></p>
                            </div>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" loading="lazy" alt="featured">
                        </a>
                    </div>
                <?php endif;

            endwhile;
            wp_reset_postdata();
        else: ?>
            <div>No posts found.</div>
        <?php endif; ?>
        <div class="buttontrendwrap">
            <a class="viewcollection" href="<?php echo get_site_url() . "/home-improvement/" ?>">Read More <span><img
                        src="<?php echo esc_url(aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg"); ?>"
                        alt="arrow_icon"></span></a>
        </div>
    </div>
    <?php
}
