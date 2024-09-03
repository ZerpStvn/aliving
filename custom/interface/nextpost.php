<?php
function display_next_post_link()
{
    // Get the next post object, optionally excluding certain categories
    $next_post = get_adjacent_post(true, '', true); // false for both arguments means no restrictions

    if (!empty($next_post)) {
        $next_post_url = get_permalink($next_post->ID);
        $next_post_title = get_the_title($next_post->ID);
        $next_post_excerpt = get_the_content($next_post->ID);
        $next_post_thumbnail = get_the_post_thumbnail($next_post->ID, 'thumbnail');
        ?>
        <div class="next-post">
            <a href="<?php echo esc_url($next_post_url); ?>" title="<?php echo esc_attr($next_post_title); ?>">
                <div class="infonext">
                    <h2><?php echo esc_html(wp_trim_words($next_post_title, 10)); ?></h2>
                    <h3><?php echo esc_html(wp_trim_words($next_post_excerpt, 30)); ?></h3>
                    <p>By <?php echo get_the_author_meta('display_name', $next_post->post_author); ?></p>
                </div>
                <?php if ($next_post_thumbnail): ?>
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" loading="lazy" alt="thumb">
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
