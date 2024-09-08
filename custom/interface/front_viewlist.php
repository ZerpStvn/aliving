<?php
function viewtwolist()
{

    ?>
    <ul class="front_list">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'editorial',

                'orderby' => 'date',
                'order' => 'ASC',
                'posts_per_page' => 2,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <li class="front_list_wrap">
                    <a href="">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="thumbnail">
                        <div class="infowraplist">
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
                                    <h2><?php echo truncate_title(30) ?></h2>
                                    <h3><?php echo truncate_excerpt(40) ?></h3>
                                    <p>By <?php echo get_author_name() ?></p>
                                </div>
                                <?php
                            }
                            ?>
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