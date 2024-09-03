<?php get_header() ?>
<div class="house-keeping collections">
    <div class="collectiontile global_width">
        <h1>House Keeping</h1>
    </div>
    <div class="decorwrap global_width">
        <div class="homecollection ">
            <div class="trending">
                <!-- <img src="<?php echo aliving_image . "/Logo2.png" ?>" loading="lazy" alt="logo" class="logooverlay"> -->
                <?php trendFront('trending', 'house_keeping', ) ?>
                <div class="hottopics">
                    <?php trendFrontHottopics('hot_topic', 'editorial') ?>
                </div>
                <div class="featured">
                    <?php trendFrontfeatured('featured', 'editorial', 'house_keeping') ?>
                </div>
            </div>
            <div class="articles">

                <div class="featuredarticles">
                    <?php articlefeatured('house_keeping') ?>
                </div>
                <div class="list_of_articles">
                    <h2 class="latestarticle">RECOMMENDATION</h2>
                    <?php listofarticle('house_keeping') ?>
                    <!-- <a class="viewcollection" href="">View Collections <span><img
                                src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                alt="arrow_icon"></span></a> -->
                </div>
            </div>

        </div>
    </div>
    <div class="tooglepanel global_width">
        <?php collectiontoggleFronts() ?>
    </div>
    <div class="tooglepanel-mobile global_width">
        <?php toggleFrontsmobile2() ?>
    </div>
    <div class="collectionwraplist global_width">
        <?php collectionsfront('house_keeping') ?>
    </div>
</div>
<?php get_footer() ?>