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

        $upload_dir = wp_get_upload_dir();
        $image_url = $upload_dir['baseurl'] . '/2024/09/play-btn.png'; // Dynamic path
    
        if ($trending_query->have_posts()):
            while ($trending_query->have_posts()):
                $trending_query->the_post();
                // $linkurl = get_post_meta( get_the_ID(), "_trending_on_socials_meta_box", true);
                $video_url = get_post_meta(get_the_ID(), "_trending_on_socials_video_url", true);
                ?>
                <li class="socialtrending">
                    <a href="#">
                        <?php if (!empty($video_url)) { ?>
                            <video class="social-video" controls loop poster="<?php echo get_the_post_thumbnail_url(); ?>" muted>
                                <source src="<?php echo $video_url; ?>" type="video/mp4">
                            </video>
                            <div class="play-btn-wrapper">
                                <img src="<?php echo esc_url($image_url); ?>" class="play-btn" alt="Play Button">
                            </div>
                        <?php } else { ?>
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" loading="lazy" alt="trending">
                        <?php } ?>
                        <h1><?php echo get_the_title(); ?> </h1>
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