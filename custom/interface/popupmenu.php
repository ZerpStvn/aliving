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



            <!-- <nav class="listmenu">

                <li>

                    <a href="<?php echo get_home_url() ?>">Home</a>

                </li>

                <li>

                    <a href="<?php echo esc_url($latest_editorial_url); ?>">Editorial</a>

                </li>

                <li><a href="<?php echo get_site_url() . "/decor" ?>">Decor</a></li>

                <li> <a href="<?php echo get_site_url() . "/house-keeping" ?>">Housekeeping</a></li>

                <li> <a href="<?php echo get_site_url() . "/home-improvement" ?>">Home Improvement</a></li>

                <li><a href="<?php echo get_site_url() . "/gardening" ?>">Gardening</a></li>

                <li><a href="<?php echo get_site_url() . "/what-to-buy" ?>">What to Buy</a></li>



                <li>

                    <a href="<?php echo get_site_url() . '/product-recommendation' ?>">Product Recommendation</a>

                </li>

                <li>

                    <a href="<?php echo get_site_url() . "/gifts" ?>">Gifts</a>

                </li>



            </nav> -->

        </div>

        <nav class="newlistmenu">

            <li>

                <div>

                    <a href="<?php echo get_home_url() ?>">Home</a>

                </div>

            </li>

            <li>

                <div>

                    <a href="<?php echo get_site_url() . "/editor" ?>">Editorial</a>



                </div>

            </li>

            <li class="menu-collections">

                <div>

                    <a href="#" id="collection-mobile">Collections</a>

                    <span class="material-symbols-outlined">

                        arrow_right

                    </span>

                </div>

            </li>

            <ul class="sub-menu-collections">

                <li>



                    <a href="<?php echo get_site_url() . "/decor" ?>">Decor</a>



                </li>

                <li> <a href="<?php echo get_site_url() . "/house-keeping" ?>">Housekeeping</a></li>

                <li> <a href="<?php echo get_site_url() . "/home-improvement" ?>">Home Improvement</a></li>

                <li><a href="<?php echo get_site_url() . "/gardening" ?>">Gardening</a></li>

                <li><a href="<?php echo get_site_url() . "/what-to-buy" ?>">What to Buy</a></li>



            </ul>

            <li>

                <div> <a href="<?php echo get_site_url() . '/product-recommendation' ?>">Product Recommendation</a>

                </div>

            </li>

            <li>

                <div><a href="<?php echo get_site_url() . "/gifts" ?>">Gifts</a>

                </div>

            </li>

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

                <li><a href=""><img src="<?php echo aliving_image . "/icon/social/icon _tiktok_.png" ?>" loading="lazy"
                            alt="ico"></a></li>

                <li><a href=""><img src="<?php echo aliving_image . "/icon/social/icon _facebook squared_.png" ?>"
                            loading="lazy" alt="ico"></a></li>

                <li><a href=""><img src="<?php echo aliving_image . "/icon/social/icon _instagram_.png" ?>" loading="lazy"
                            alt="ico"></a></li>

                <li><a href=""><img src="<?php echo aliving_image . "/icon/social/icon _pinterest_.png" ?>" loading="lazy"
                            alt="ico"></a></li>

            </ul>

        </div>

    </div>

    <?php



}