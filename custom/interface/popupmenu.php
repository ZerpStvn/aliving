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
            <nav class="listmenu">
                <li>
                    <a href="<?php echo get_home_url() ?>">Home</a>
                </li>
                <li>
                    <a href="<?php echo esc_url($latest_editorial_url); ?>">Editorial</a>
                </li>
                <li><a href="<?php echo get_site_url() . "/decor" ?>">Decor</a></li>
                <li> <a href="<?php echo get_site_url() . "/house-keeping" ?>">House Keeping</a></li>
                <li> <a href="<?php echo get_site_url() . "/home-improvement" ?>">Home improvement</a></li>
                <li><a href="<?php echo get_site_url() . "/gardening" ?>">Gardening</a></li>
                <li><a href="<?php echo get_site_url() . "/what-to-buy" ?>">What to Buy</a></li>

                <li>
                    <a href="<?php echo get_site_url() . '/product-recommendation' ?>">Product Recommendation</a>
                </li>
                <li>
                    <a href="<?php echo get_site_url() . "/gifts" ?>">Gifts</a>
                </li>

            </nav>
        </div>
    </div>
    <?php

}