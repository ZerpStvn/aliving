<?php
get_header();
$latestEditorialGiftspost = new WP_Query(array(
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
    'posts_per_page' => 1,
));
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

$latestproduct = new WP_Query(array(
    'post_type' => 'alivingproduct',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 4,
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
                        <?php
                        if ($latestEditorialGiftspost->have_posts()):
                            while ($latestEditorialGiftspost->have_posts()):
                                $latestEditorialGiftspost->the_post();
                                ?>
                                <img class="thumbnails" src="<?php echo the_post_thumbnail_url(); ?>" loading="lazy"
                                    alt="<?php echo the_title(); ?>">
                                <div class="wrapauthorname">
                                    <h1>By <?php echo get_author_name() ?></h1>
                                    <div>
                                        <?php shareicon() ?>
                                    </div>
                                </div>
                                <p class="post_excerpt"><?php echo truncate_excerpt(340) ?></p>


                                <?php
                            endwhile;
                            wp_reset_postdata();
                        else:
                            echo '<div></div>';
                        endif;
                        ?>
                    </div>
                    <div class="listofproduct">
                        <ul class="listprodwrap">
                            <?php
                            if ($latestproduct->have_posts()):
                                $counter = 1;
                                while ($latestproduct->have_posts()):
                                    $latestproduct->the_post();
                                    $value = get_post_meta($post->ID, '_alivingproduct_pricing', true);
                                    $valuelink = get_post_meta($post->ID, '_alivingproduct_link', true);
                                    ?>
                                    <li>
                                        <div class="productview">
                                            <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy"
                                                alt="thumbnail">
                                            <div class="productinfo">
                                                <h1><?php echo $counter; ?></h1>
                                                <h2><?php echo truncate_title(20) ?></h2>
                                                <p><?php echo truncate_excerpt(15) ?>...</p>
                                                <a href="<?php echo esc_url($valuelink) ?>"> $ <?php echo $value ?> <span
                                                        class="material-symbols-outlined">
                                                        arrow_forward
                                                    </span></a>
                                            </div>
                                        </div>
                                        <!-- <?php echo 'Post ' . $counter; ?> -->
                                        <p class="contentwraptitle"><?php echo truncate_excerpt(450) ?></p>
                                        <p class="bottomcontentwrap">
                                            Sed egestas, ante et vulputate volutpat, eros pede semper est, vitae luctus metus
                                            libero
                                            eu augue. Morbi purus libero, faucibus adipiscing, commodo quis, gravida id, est.
                                            Sed
                                            lectus. Praesent elementum hendrerit tortor. Sed semper lorem at felis. Vestibulum
                                            volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien
                                            ornare nisl. Phasellus pede arcu, dapibus eu, fermentum et, dapibus sed, urna. Morbi
                                            interdum mollis sapien. Sed ac risus. Phasellus lacinia, magna a ullamcorper
                                            laoreet,
                                            lectus arcu pulvinar risus, vitae facilisis libero dolor a purus. Sed vel lacus.
                                            Mauris
                                            nibh felis, adipiscing varius, adipiscing in, lacinia vel, tellus. Suspendisse ac
                                            urna.
                                            Etiam pellentesque mauris ut lectus. Nunc tellus ante, mattis eget, gravida vitae,
                                            ultricies ac, leo. Integer leo pede, ornare a, lacinia eu, vulputate vel, nisl.
                                        </p>
                                    </li>
                                    <?php
                                    $counter++;
                                endwhile;
                                wp_reset_postdata();
                            else:
                                echo '<div>No posts found.</div>';
                            endif;
                            ?>
                        </ul>

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
get_footer();
?>