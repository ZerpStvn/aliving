<?php
function missionaryfront()
{
    ?>
    <div class="missionaryfrontwrap">
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
                    <a href="<?php echo get_permalink() ?>">
                        <div class="first-latest">
                            <div class="infocontent">
                                <h2><?php echo truncate_title(40); ?></h2>
                                <p>By <?php the_author(); ?></p>
                            </div>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="thumbnail">
                        </div>
                    </a>

                <?php elseif ($post_count == 2 || $post_count == 3): ?>
                    <!-- Show the second and third latest content -->
                    <?php if ($post_count == 2): ?>
                        <div class="second-latest">
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
                        </div>
                    <?php endif; ?>

                <?php elseif ($post_count >= 4 && $post_count <= 6): ?>
                    <!-- Start of the next three posts -->
                    <?php if ($post_count == 4): ?>
                        <a href="<?php echo get_permalink() ?>" class="next-three-posts">
                        <?php endif; ?>
                        <!-- Show the 4th to 6th posts -->
                        <div class="post">
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
                            <p><?php echo truncate_excerpt(70); ?></p>
                        </div>
                        <?php if ($post_count == 6): ?>
                        </a> <!-- End of the next three posts -->
                    <?php endif; ?>
                <?php endif;

            endwhile;
            wp_reset_postdata();
        else: ?>
            <div>No posts found.</div>
        <?php endif; ?>
    </div>
    <?php
}
