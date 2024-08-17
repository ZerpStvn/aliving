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
        <h1 class="title_prod"> Product Collections</h1>
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
    <div class="shopwrap">
        <div class="global_width">
            <div class="shopwraplist">
                <h1>Shop With Us!</h1>
                <div class="shopbtn">
                    <p>Suspendisse mauris. Fusce accumsan mollis eros. Pellentesque a diam sit amet mi ullamcorper
                        vehicula.
                        Integer adipiscing risus a sem. Nullam quis massa sit amet nibh viverra malesuada.</p>
                    <a class="secondarybutton" href="">See More<span><img
                                src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                alt="arrow_icon"></span></a>
                </div>
            </div>
            <div class="tabwraps">
                <ul class="tablinks">
                    <li><button class="thelist"> The List</button></li>
                    <li><button class="listdeals">List & Deals</button></li>
                    <li><button class="giftguides">Gift Guides</button></li>
                </ul>

                <div class="tabcontents">
                    <div class="the_list_content">
                        <?php shopwithusfront("The List", "Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis.", "#", "originals") ?>
                    </div>
                    <div class="listandguidecontent">
                        <?php shopwithusfront("List & Deals", "Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis.", "#", "originals") ?>
                    </div>
                    <div class="giftsguidecontent">
                        <?php shopwithusfront("Gift Guides", "Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis.", "#", "originals") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>