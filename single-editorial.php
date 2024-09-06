<?php get_header();
$post_id = get_the_ID();
$get_service = get_post_meta($post_id, '_service', true);
$get_editorial_status = get_post_meta($post_id, '_editorial_status', true);
$store_front = get_post_meta($post->ID, '_store_front', true);
$publish_date = get_the_date('F j, Y');

?>
<?php
if ($get_editorial_status == 'product_recommendation') {

    if ($store_front != ''):
        signleproduct_recommendation("At" . " " . $store_front);
    else: {
            signleproduct_recommendation("");
        }
    endif;

} else if ($get_editorial_status === 'giftsidea' || $get_editorial_status === 'gifts') {
    gifts_front();
} else {
    ?>
        <div class="editorial">
            <div class="editorial-header archive-layout" style="background-position: center; background-repeat: no-repeat;">
                <div class="editorial-header-image">
                    <img src="<?php echo get_the_post_thumbnail_url(null, 'large') ?>" />
                </div>
                <div class="editorial-header-content">
                    <div class="headingcontent global_padding">
                        <h1 class="font__color__white">
                        <?php echo truncate_title(40) ?>
                            <div class="mobileinfowrap">
                                <p><?php echo truncate_excerpt(150) ?>
                                </p>
                                <div class="authorwrap">
                                    <h1>By <?php $author_id = $post->post_author;
                                    $author_name = get_the_author_meta('display_name', $author_id);
                                    echo $author_name
                                        ?></h1>
                                    <h2><?php echo get_the_date('F j, Y'); ?></h2>
                                </div>
                            </div>
                        </h1>
                        <p class="dekstop__only font__color__white font__title"><?php echo truncate_excerpt(350) ?></p>

                    </div>
                    <div class="authordescrip global_padding dekstop__only">
                        <div class="authorwrap">
                            <h1 class="font__color__white">By <?php $author_id = $post->post_author;
                            $author_name = get_the_author_meta('display_name', $author_id);
                            echo $author_name
                                ?></h1>
                            <h2 class="font__color__white"><?php echo get_the_date('F j, Y'); ?></h2>
                        </div>
                    </div>
                </div>

            </div>

            <div class="excerptwrap">
                <div class="leftcorner">
                    <div class="sharesocials">
                    <?php shareicon() ?>
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
                    the_content();
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