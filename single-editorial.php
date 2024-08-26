<?php get_header();
$post_id = get_the_ID();
$get_service = get_post_meta($post_id, '_service', true);
$get_editorial_status = get_post_meta($post_id, '_editorial_status', true);
$store_front = get_post_meta($post->ID, '_store_front', true);
$publish_date = get_the_date('F j, Y');

?>
<?php
if ($get_editorial_status === "gifts") {
    ?>
    <div class="elementor-singlewrap product-gifts">
        <div class="predoct-recomwrap global_width">
            <div class="sectiontitle">
                <?php if (!empty($store_front)): ?>
                    <h1> Beast Deals At <?php echo $store_front ?></h1>
                <?php else: ?>
                    <h1>Beast Deals</h1>
                    <h2> Update <?php echo $publish_date ?></h2>
                <?php endif; ?>
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
    <?php

} else if ($get_editorial_status === "product_recommendation") {
    ?>

        <div class="elementor-singlewrap product-recom">

            <div class="predoct-recomwrap global_width">
                <div class="sectiontitle">
                <?php if (!empty($store_front)): ?>
                        <h1> Beast Deals At <?php echo $store_front ?></h1>
                        <h2> Update <?php echo $publish_date ?></h2>
                <?php else: ?>
                        <h1>Beast Deals</h1>
                        <h2> Update <?php echo $publish_date ?></h2>
                <?php endif; ?>
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
    <?php
} else {
    ?>
        <div class="editorial">
            <div class="editorial-header"
                style="background-position: center; background-repeat: no-repeat; background-size: cover; background-image:url(<?php echo get_the_post_thumbnail_url() ?>)">
                <div class="wrapcontent global_width">
                    <div class="headingcontent global_padding">
                        <h1>
                        <?php echo truncate_title(40) ?>

                        </h1>
                        <!-- <p><?php echo truncate_excerpt(210) ?>

                        </p> -->
                    </div>
                    <div class="authordescrip global_padding">
                        <div class="authorwrap">
                            <h1>By <?php $author_id = $post->post_author;
                            $author_name = get_the_author_meta('display_name', $author_id);
                            echo $author_name
                                ?></h1>
                            <h2><?php echo get_the_date('F j, Y'); ?></h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="excerptwrap">
                <div class="leftcorner">
                    <div class="sharesocials">

                    </div>
                    <div class="morelikethis">
                        <h1>
                            More Like This
                        </h1>
                    <?php morelikethisfront($get_service) ?>
                    </div>
                </div>
                <div class="rightcorner">
                    <?php
                    $content = apply_filters('the_content', get_the_content());
                    echo $content;
                    ?>

                </div>
            </div>
            <div class="nextpostwrap">
                <div class="containernextpost ">
                <?php display_next_post_link() ?>
                </div>

            </div>
        </div>
    <?php
}
?>
<?php get_footer() ?>