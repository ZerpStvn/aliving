<?php



function popupmenu()
{

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



    <div class="popupmenu">

        <div class="popupmenuwrap">

            <div class="closebtn">

                <a href="#" id="closedbtn">

                    <span class="material-symbols-outlined">

                        close

                    </span>

                </a>

            </div>

            <div class="logo">

                <img src="<?php echo aliving_image . "/Logo2.png" ?>" loading="lazy" alt="logo">

            </div>
        </div>

        <nav class="newlistmenu">

            <a href="<?php echo get_home_url() ?>">

                <div>

                    <h1>Home</h1>

                </div>

            </a>
            <a href="<?php echo get_site_url() . "/decor" ?>">
                <div>
                    <h1>Decor</h1>
                </div>
            </a>
            <a href="<?php echo get_site_url() . "/house-keeping" ?>">
                <div>
                    <h1>Housekeeping</h1>
                </div>
            </a>
            <a href="<?php echo get_site_url() . "/home-improvement" ?>">
                <div>
                    <h1> Home Improvement</h1>
                </div>
            </a>
            <a href="<?php echo get_site_url() . "/gardening" ?>">
                <div>
                    <h1>Gardening</h1>
                </div>
            </a>
            <a href="<?php echo get_site_url() . "/what-to-buy" ?>">
                <div>
                    <h1>What to Buy</h1>
                </div>
            </a>


            <li class="menu-collections">

                <div>

                    <h1 id="collection-mobile">Collections</h1>

                    <span class="material-symbols-outlined">

                        arrow_right

                    </span>

                </div>

            </li>

            <ul class="sub-menu-collections">
                <li> <a href="<?php echo get_site_url() . "/editor" ?>">
                        Editorial
                    </a>
                </li>
                <li>

                    <a href="<?php echo get_site_url() . '/product-recommendation' ?>">
                        Product Recommendation
                    </a>


                </li>

                <li> <a href="<?php echo get_site_url() . "/gifts" ?>">
                        Gifts

                    </a></li>

            </ul>
        </nav>

        <div class="newsletters mobile-version">

            <h1>Newsletters</h1>

            <p>Get updates on our latest collections.</p>

            <form action="">

                <input type="text" name="email_letters" placeholder="your@example.com">

                <button type="submit">Submit</button>

            </form>

        </div>

        <div class="socialswrapiconft">

            <ul>

                <li><a href=""><img class="rounded-icon-black"
                            src="<?php echo aliving_image . "/icon/social/icontik.svg" ?>" loading="lazy" alt="ico"></a>
                </li>

                <li><a href=""><img class="rounded-icon-black" src="<?php echo aliving_image . "/icon/social/iconfb.svg" ?>"
                            loading="lazy" alt="ico"></a></li>

                <li><a href=""><img class="rounded-icon-black-insta"
                            src="<?php echo aliving_image . "/icon/social/iconinsta.svg" ?>" loading="lazy" alt="ico"></a>
                </li>

                <li><a href=""><img class="rounded-icon-black"
                            src="<?php echo aliving_image . "/icon/social/iconpen.svg" ?>" loading="lazy" alt="ico"></a>
                </li>

            </ul>

        </div>

    </div>

    <?php



}