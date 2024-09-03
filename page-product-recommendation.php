<?php
get_header();
$latestEditorialreco = new WP_Query(array(
    'post_type' => 'editorial',
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => '_editorial_status',
            'value' => 'product_recommendation',
            'compare' => '='
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 1,
));
?>
<div>

    <div class="productrecommendation collections">
        <div class="collectiontile global_width">
            <h1>Best Deals At Mart</h1>
        </div>
        <div class="wrapproductreco global_width">
            <?php
            if ($latestEditorialreco->have_posts()):
                while ($latestEditorialreco->have_posts()):
                    $latestEditorialreco->the_post();
                    ?>
                    <div class="upperreco">
                        <div class="wrapauthorname">
                            <h1>By <?php echo get_author_name() ?></h1>
                            <div>
                                <?php shareicon() ?>
                            </div>
                        </div>
                    </div>
                    <?php the_content(); ?>
                    <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<div></div>';
            endif;
            ?>

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
    <div class="giftscollectionwrap recomend">
        <div class="giftscontent global_width">
            <h1 class="giftstitle">Best Deals 2024</h1>
            <?php ourlastestpost('sales_and_deals') ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>