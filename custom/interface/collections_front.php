<?php

function checkcollection($service)
{
    if ($service === "decor") {
        echo 'style="color:#652B41;"';
    } else if ($service === "house_keeping") {
        echo 'style="color:#DEBB50;"';
    } else if ($service === "home_improvement") {
        echo 'style="color:#E37052;"';
    } else if ($service === "garden") {
        echo 'style="color:#CE3E55;"';
    } else if ($service === "whattobuy") {
        echo 'style="color:#698F92;"';
    }
}
function collectionsfront($service)
{


    ?>
    <ul class="collection_service">
        <?php
        $trending_query = new WP_Query(array(
            'post_type' => 'editorial',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_service',
                    'value' => $service,
                    'compare' => '!='
                ),
            ),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 6,
        ));

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                ?>
                <li class="collection_list">

                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo the_post_thumbnail_url(); ?>" loading="lazy" alt="<?php echo the_title(); ?>">
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
                                        <h1 class="category" <?php checkcollection($service) ?>>
                                            <?php echo esc_html($category->name) ?>
                                        </h1>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <?php
                            }
                            ?>
                            <h2 class="title"><?php echo truncate_title(50); ?></h2>
                            <p class="post_excerpt"><?php echo truncate_excerpt(120) ?></p>
                        </div>
                        <div class="author">
                            <h2>By <?php echo get_author_name() ?></h2>
                            <p>
                                "<?php authorbio() ?>"
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