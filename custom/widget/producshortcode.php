<?php
function alivingproduct_by_ranking_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'ranking' => 'Best Overall',
            'product_name' => '',
        ),
        $atts,
        'single_alivingproduct'
    );

    $args = array(
        'post_type' => 'alivingproduct',
        'posts_per_page' => 1,
    );

    if (!empty($atts['product_name'])) {
        $args['s'] = $atts['product_name'];
    } else {
        $args['meta_query'] = array(
            array(
                'key' => '_alivingproduct_ranking',
                'value' => $atts['ranking'],
                'compare' => '='
            )
        );
    }

    $query = new WP_Query($args);

    ob_start();
    ?>
    <div class="alivingproduct-list">
        <?php if ($query->have_posts()): ?>
            <?php while ($query->have_posts()):
                $query->the_post();
                $pricing = get_post_meta(get_the_ID(), '_alivingproduct_pricing', true);
                $productlink = get_post_meta(get_the_ID(), '_alivingproduct_link', true);
                $productranking = get_post_meta(get_the_ID(), '_alivingproduct_ranking', true);
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                <div class="alivingproduct-item">
                    <div class="productranking">
                        <h1><?php echo esc_html($productranking) ?></h1>
                    </div>
                    <div class="alivingproduct-cover">
                        <img src="<?php echo esc_url($thumbnail); ?>" alt="">
                    </div>
                    <div class="productinfo">
                        <h2><?php echo truncate_title(40); ?></h2>
                        <p>$<?php echo esc_html(number_format($pricing)); ?></p>
                        <h3><?php echo truncate_excerpt(110) ?></h3>
                        <a href="<?php echo esc_html($productlink) ?>">Buy Now<span class="material-symbols-outlined">
                                arrow_forward
                            </span></a>
                    </div>

                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>No products
                found<?php echo !empty($atts['product_name']) ? ' with the name "' . esc_html($atts['product_name']) . '"' : ' with the ranking of "' . esc_html($atts['ranking']) . '"'; ?>.
            </p>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('single_alivingproduct', 'alivingproduct_by_ranking_shortcode');


function full_alivingproduct_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'ranking' => 'Best Overall',
            'product_name' => '',
        ),
        $atts,
        'single_alivingproduct'
    );

    $args = array(
        'post_type' => 'alivingproduct',
        'posts_per_page' => 1,
    );

    if (!empty($atts['product_name'])) {
        $args['s'] = $atts['product_name'];
    } else {
        $args['meta_query'] = array(
            array(
                'key' => '_alivingproduct_ranking',
                'value' => $atts['ranking'],
                'compare' => '='
            )
        );
    }

    $query = new WP_Query($args);

    ob_start();
    ?>
    <div class="fullwidth_alivingproduct">
        <?php if ($query->have_posts()): ?>
            <?php while ($query->have_posts()):
                $query->the_post();
                $pricing = get_post_meta(get_the_ID(), '_alivingproduct_pricing', true);
                $productlink = get_post_meta(get_the_ID(), '_alivingproduct_link', true);
                $productranking = get_post_meta(get_the_ID(), '_alivingproduct_ranking', true);
                $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                ?>
                <div class="alivingproduct-item">

                    <div class="alivingproduct-cover">
                        <img src="<?php echo esc_url($thumbnail); ?>" alt="">
                    </div>
                    <div class="productinfo">
                        <div class="wraprank">
                            <h2><?php echo truncate_title(40); ?></h2>
                            <div class="productranking">
                                <h1><?php echo esc_html($productranking) ?></h1>
                            </div>
                        </div>
                        <p>$<?php echo esc_html(number_format($pricing)); ?></p>
                        <h3><?php echo truncate_excerpt(110) ?></h3>
                        <a href="<?php echo esc_html($productlink) ?>">Buy Now<span class="material-symbols-outlined">
                                arrow_forward
                            </span></a>
                    </div>


                </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else: ?>
            <p>No products
                found<?php echo !empty($atts['product_name']) ? ' with the name "' . esc_html($atts['product_name']) . '"' : ' with the ranking of "' . esc_html($atts['ranking']) . '"'; ?>.
            </p>
        <?php endif; ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('full_alivingproduct', 'full_alivingproduct_shortcode');


