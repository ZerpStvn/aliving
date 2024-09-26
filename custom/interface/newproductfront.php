<?php

function newProduct()
{
    ?>
    <ul class="producttable prodslider">
        <?php
        $trending_query = new WP_Query(array(
            'post_type' => 'alivingproduct',
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 5,
        ));

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                $shipping = get_post_meta(get_the_ID(), '_alivingproduct_shipping_days', true);
                $rating = get_post_meta(get_the_ID(), '_alivingproduct_rating', true);
                $paidship = get_post_meta(get_the_ID(), '_alivingproduct_shipping_type', true);
                $linkvalue = get_post_meta(get_the_ID(), '_alivingproduct_link', true);
                ?>
                <li class="producttable">
                    <div class="productdetails">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="product">
                        <p><?php echo the_title() ?></p>
                    </div>
                    <div class="emptyrate"></div>
                    <div class="productrating">
                        <p><?php echo $rating ?>/10</p>
                        <div class="startrate">
                            <img src="<?php echo aliving_image . "/star.png" ?>" loading="lazy" alt="star">
                            <img src="<?php echo aliving_image . "/star.png" ?>" loading="lazy" alt="star">
                            <img src="<?php echo aliving_image . "/star.png" ?>" loading="lazy" alt="star">
                            <img src="<?php echo aliving_image . "/star.png" ?>" loading="lazy" alt="star">
                            <img src="<?php echo aliving_image . "/star.png" ?>" loading="lazy" alt="star">
                            <img src="<?php echo aliving_image . "/star.png" ?>" loading="lazy" alt="star">
                        </div>
                    </div>

                    <div class="freeship">
                        <p><?php echo $paidship ?> Shipping</p>
                    </div>
                    <div class="daysip">
                        <p><?php echo $shipping ?></p>
                        <a target="_blank" href="<?php echo esc_url($linkvalue) ?>">View Deals</a>
                    </div>

                </li>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<li></li>';
        endif;
        ?>
    </ul>
    <?php
}

