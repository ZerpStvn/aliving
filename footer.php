</main>
</body>
<?php wp_footer();

$latest_editorial = new WP_Query(array(
    'post_type' => 'editorial',
    'posts_per_page' => 1,
));

$latestEditorialpost = new WP_Query(array(
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
if ($latestEditorialpost->have_posts()):
    $latestEditorialpost->the_post();
    $latestEditorialpost = get_permalink();
    wp_reset_postdata();
else:

    $latestEditorialpost = home_url();
endif;

if ($latest_editorial->have_posts()):
    $latest_editorial->the_post();
    $latest_editorial_url = get_permalink();
    wp_reset_postdata();
else:

    $latest_editorial_url = home_url();
endif;
?>

<div class="footer">
    <div class="footerwrap global_width">
        <div class="newsletters mobile-version">
            <h1>Newsletters</h1>
            <p>Get updates on our latest collections.</p>
            <form action="">
                <input type="text" name="email_letters" placeholder="your@example.com">
                <button type="submit">Submit</button>
            </form>
        </div>
        <div class="uppercontent">

            <div class="leftcolumn">
                <a href="<?php echo get_home_url() . "/" ?>"><img
                        src="<?php echo esc_url(aliving_image . "/Logo3.png") ?>" loading="lazy" alt="footer"></a>
                <h2>
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                    Nullam malesuada erat ut turpis.
                </h2>
            </div>
            <div class="rightcolumn">
                <div class="listpage">
                    <ul class="quicklinks">
                        <h1>Quick Links</h1>
                        <li><a href="<?php echo esc_url($latest_editorial_url) ?>">Editorials</a></li>
                        <li><a href="">Collections</a></li>
                        <li><a href="<?php echo get_site_url() . "/product-recommendation" ?>">Products
                                Recommendation</a></li>
                        <li><a href="">Gifts</a></li>
                    </ul>
                    <ul class="discovery">
                        <h1>Discover</h1>
                        <li><a href="<?php echo get_site_url() . "/decor" ?>">Decor</a></li>
                        <li><a href="<?php echo get_site_url() . "/house-keeping" ?>">Housekeeping</a></li>
                        <li><a href="<?php echo get_site_url() . "/home-improvement" ?>">Home Improvement</a></li>
                        <li><a href="<?php echo get_site_url() . "/gardening" ?>">Garden</a></li>
                        <li><a href="<?php echo get_site_url() . "/what-to-buy" ?>">What To Buy</a></li>
                    </ul>
                    <div class="newsletters">
                        <h1>Newsletters</h1>
                        <p>Get updates on our latest collections.</p>
                        <form action="">
                            <input type="text" name="email_letters" placeholder="your@example.com">
                            <button type="submit">Submit</button>
                        </form>
                    </div>
                </div>
                <div class="bottomdes">
                    <p>
                        Disclaimer(s)<br>
                        Articles may contain affiliate links which enable us to share in the revenue of any purchases
                        made.
                        Registration on or use of this site constitutes acceptance of our Terms of Service.
                    </p>
                </div>
            </div>
        </div>
        <div class="bottomdes mobile">
            <p>
                Disclaimer(s)<br>
                Articles may contain affiliate links which enable us to share in the revenue of any purchases
                made.
                Registration on or use of this site constitutes acceptance of our Terms of Service.
            </p>
        </div>
        <div class="socials">
            <h1>
                &copy; Aliving.
            </h1>
            <div class="socialswrapiconft">
                <ul>
                    <li><a href=""><img src="<?php echo aliving_image . "/icon/icon_tiktok_.png" ?>" loading="lazy"
                                alt="ico"></a></li>
                    <li><a href=""><img src="<?php echo aliving_image . "/icon/icon_facebook squared_.png" ?>"
                                loading="lazy" alt="ico"></a></li>
                    <li><a href=""><img src="<?php echo aliving_image . "/icon/icon _instagram_.png" ?>" loading="lazy"
                                alt="ico"></a></li>
                    <li><a href=""><img src="<?php echo aliving_image . "/icon/icon_pinterest_.png" ?>" loading="lazy"
                                alt="ico"></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

</html>