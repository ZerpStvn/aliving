<?php
function socialtrending()
{
    ?>
    <ul class="social_trending">
        <?php
        $trending_query = new WP_Query(
            array(
                'post_type' => 'trending_on_socials',
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 4,
            )
        );

        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                // $linkurl = get_post_meta( $post_id, "trending_on_socials_meta_box", true)
                ?>
                <li class="socialtrending">
                    <a href="#">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="trending">
                        <h1><?php echo get_the_title() ?></h1>
                    </a>

                </li>
                <?php
            endwhile;
            wp_reset_postdata();
        else:
            echo '<div></div>';
        endif;
        ?>
    </ul>
    <?php
}