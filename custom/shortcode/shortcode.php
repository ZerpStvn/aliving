<?php
function more_like_this_shortcode($atts)
{
    $atts = shortcode_atts(
        array(
            'service' => '',
        ),
        $atts,
        'more_like_this'
    );

    ob_start();
    ?>
    <div class="morelikethis">
        <h1>More Like This</h1>
        <?php morelikethisfront($atts['service']); ?>
    </div>
    <?php
    return ob_get_clean();
}

add_shortcode('more_like_this', 'more_like_this_shortcode');
