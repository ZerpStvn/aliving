<?php

function gifts_front()
{
    $latestlistGiftspost = new WP_Query(array(
        'post_type' => 'editorial',
        'meta_query' => array(
            'relation' => 'AND',
            array(
                'key' => '_editorial_status',
                'value' => 'giftsidea',
                'compare' => '='
            ),
        ),
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 5,
    ));

    ?>
    <div>
        <div class="giftwraps collections">
            <div class="collectiontile global_width">
                <h1>Best Gifts</h1>
            </div>
            <div class="upperwrapgifts global_width">
                <div class="upperwrap">
                    <div class="leftcorner">
                        <div class="uppertitle">
                            <img class="thumbnails" src="<?php echo the_post_thumbnail_url(); ?>" loading="lazy"
                                alt="<?php echo the_title(); ?>">
                            <div class="wrapauthorname">
                                <h1>By <?php echo get_author_name() ?></h1>
                                <div>
                                    <?php shareicon() ?>
                                </div>
                            </div>
                            <?php
                            if (have_posts()):
                                while (have_posts()):
                                    the_post();
                                    the_content();
                                endwhile;
                            endif;
                            ?>
                        </div>
                    </div>
                    <div class="rightcorner">
                        <h1 class="titlewrap">Latest Gift Ideas</h1>
                        <ul class="listwrap">
                            <?php
                            if ($latestlistGiftspost->have_posts()):
                                while ($latestlistGiftspost->have_posts()):
                                    $latestlistGiftspost->the_post();
                                    ?>
                                    <li>
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
                                            <h2 class="title"><?php echo truncate_title(40); ?></h2>

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
                    </div>
                </div>
            </div>

        </div>
        <div class="giftscollectionwrap">
            <div class="giftscontent global_width">
                <h1 class="giftstitle">Gift Ideas for 2024</h1>
                <?php ourlastestpost('giftsidea') ?>
            </div>
        </div>
    </div>


    <?php

}