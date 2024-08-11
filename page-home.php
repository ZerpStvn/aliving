<?php get_header(); ?>
<div class="home  ">

    <div class="tooglepanel global_width">
        <?php toggleFronts() ?>
    </div>
    <div class="originals">
        <div class="originalswrap global_width">
            <h2 class="originals_title">
                A List Living
            </h2>
            <div class="originalslides">
                <?php originalsFronts(); ?>
            </div>
        </div>
    </div>

    <div class="trending_on_socials_wrap">
        <div class="trending_on_socials global_width">
            <h2>
                Trending on Social
            </h2>
            <div class="social_trending_post">
                <?php socialtrending() ?>
            </div>
        </div>
    </div>
    <div class="bycategory global_width">
        <h1 class="title"> Product Collections</h1>
        <div class="homecollection ">

            <div class="articles">
                <div class="list_of_articles">
                    <h2 class="latestarticle">Latest</h2>
                    <?php listofarticle('article') ?>
                    <a class="viewcollection" href="">View Collections <span><img
                                src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                alt="arrow_icon"></span></a>
                </div>
                <div class="featuredarticles">
                    <?php articlefeatured('featured', 'article') ?>
                </div>
            </div>
            <div class="trending">
                <!-- <img src="<?php echo aliving_image . "/Logo2.png" ?>" loading="lazy" alt="logo" class="logooverlay"> -->
                <?php trendFront('trending', 'editorial') ?>
                <div class="hottopics">
                    <?php trendFrontHottopics('hot_topic', 'editorial') ?>
                </div>
                <div class="featured">
                    <?php trendFrontfeatured('featured', 'editorial') ?>
                </div>
            </div>


        </div>
    </div>

</div>
<?php get_footer(); ?>