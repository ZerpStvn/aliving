<?php
function display_next_post_link()
{

    $next_post = get_adjacent_post(true, '', true);
    if (!empty($next_post)) {
        $next_post_url = get_permalink($next_post->ID);
        $next_post_title = get_the_title($next_post->ID);
        $next_post_excerpt = get_the_content($next_post->ID);
        $next_post_thumbnail = get_the_post_thumbnail($next_post->ID, 'thumbnail');
        ?>
        <div class="next-post">
            <a href="<?php echo esc_url($next_post_url); ?>" title="<?php echo esc_attr($next_post_title); ?>">
                <div class="infonext">
                    <h2><?php echo truncate_title(30); ?></h2>
                    <h3><?php echo esc_html(wp_trim_words($next_post_excerpt, 30)); ?></h3>
                    <p>By <?php echo get_the_author_meta('display_name', $next_post->post_author); ?></p>
                </div>
                <?php if ($next_post_thumbnail): ?>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="nextimg">
                <?php endif; ?>
            </a>
        </div>
        <?php
    } else {
        ?>
        <div class="no-next-post">
            <p>No more posts available for this category.</p>
        </div>
        <?php
    }
}
function display_next_post_link2($postslug = null)
{
    // Perform the query to get the next post
    $next_post_query = new WP_Query(
        array(
            'post_type' => 'editorial',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => '_editorial_status',
                    'value' => !empty($postslug) ? $postslug : array(),
                    'compare' => '='
                ),
            ),
            'orderby' => 'date',
            'order' => 'DESC',
            'posts_per_page' => 1,
        )
    );

    // Check if there is a post found
    if ($next_post_query->have_posts()) {
        while ($next_post_query->have_posts()) {
            $next_post_query->the_post();
            $next_post_id = get_the_ID();
            $next_post_url = get_permalink($next_post_id);
            $next_post_title = get_the_title($next_post_id);
            $next_post_excerpt = get_the_excerpt($next_post_id); // Prefer using excerpt instead of content for a brief preview
            $next_post_thumbnail = get_the_post_thumbnail($next_post_id, 'thumbnail');
            ?>
            <div class="next-post">
                <a href="<?php echo esc_url($next_post_url); ?>" title="<?php echo esc_attr($next_post_title); ?>">
                    <div class="infonext">
                        <h2><?php echo esc_html(wp_trim_words($next_post_title, 10)); ?></h2>
                        <h3><?php echo esc_html(wp_trim_words($next_post_excerpt, 30)); ?></h3>
                        <p>By <?php echo get_the_author_meta('display_name', get_post_field('post_author', $next_post_id)); ?></p>
                    </div>
                    <?php if ($next_post_thumbnail): ?>
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="nextimg">
                    <?php endif; ?>
                </a>
            </div>
            <?php
        }
        wp_reset_postdata(); // Reset the global post object to prevent conflicts
    } else {
        ?>
        <div class="no-next-post">
            <p>No more posts available for this category.</p>
        </div>
        <?php
    }
}
