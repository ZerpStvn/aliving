<?php get_header(); ?>
<div class="home  ">
    <div class="missionary" id="missionary">
        <div class="listofcontent global_width">
            <div class="missionarywrap ">
                <img id="logooverlay" src="<?php echo aliving_image . "/Logo2.png" ?>" loading="lazy" alt="logo"
                    class="logooverlay">
                <?php missionaryfront() ?>
            </div>
            <div class="trendinglist">
                <h1 id="trendingtitle">Trending</h1>
                <?php trendinglistview('trending') ?>
            </div>
        </div>

    </div>
    <div class="twolistview">
        <div class="paddingwraplistview global_width">
            <?php viewtwolist() ?>
        </div>
    </div>
    <div class="tooglepanel global_width">
        <?php toggleFronts() ?>
    </div>
    <div class="tooglepanel-mobile global_width">
        <?php toggleFrontsmobile(true) ?>
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
        <h1 class="title_prod">Collections</h1>
        <div class="homecollection ">

            <div class="articles">
                <div class="list_of_articles">
                    <h2 class="latestarticle">Latest</h2>
                    <?php listofarticle() ?>
                    <a class="viewcollection" href="<?php echo get_site_url() . '/gardening/' ?>">View Collections
                        <span><img
                                src="<?php echo aliving_svg . "/arrow_forward_24dp_5F6368_FILL0_wght400_GRAD0_opsz24.svg" ?>"
                                alt="arrow_icon"></span></a>
                </div>
                <div class="featuredarticles">
                    <?php articlefeatured() ?>
                </div>
            </div>
            <div class="trending">
                <?php trendFront('trending', ) ?>
                <div class="hottopics">
                    <?php trendFrontHottopics('hot_topic', 'editorial') ?>
                </div>
                <div class="featured">
                    <?php trendFrontfeatured('featured', 'editorial', ) ?>
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
                    <a class="secondarybutton" href="<?php echo get_site_url() . '/whattobuy/' ?>">See More<span><img
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
                        <?php shopwithusfront("The List", "Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis.", "#", "aliving list") ?>
                    </div>
                    <div class="listandguidecontent">
                        <?php shopwithusfront("List & Deals", "Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis.", "#", "deals") ?>
                    </div>
                    <div class="giftsguidecontent">
                        <?php shopwithusfront("Gift Guides", "Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi tincidunt quis.", "#", "gifts") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ourlatest global_width">

        <div class="ourlatestwrap">
            <h2>
                Our Latest
            </h2>
            <?php ourlastestpost() ?>
        </div>

    </div>
</div>
<?php get_footer(); ?>