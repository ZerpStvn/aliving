<?php

function shareicon()
{
    ?>
    <div class="shar-bar">
        <h1>Share: </h1>
        <div class="socialicons">
            <!-- <a href="#" class="share-icon copy-link"><img src="<?php //echo aliving_image . "/icon/social/icontik.svg" ?>"
                    alt="clipboard" loading="lazy"></a> -->
            <a target="_blank" href="https://www.tiktok.com/sharer?u=<?php echo urlencode(get_permalink()); ?>"
                class="share-icon"><img src="<?php echo aliving_image . "/icon/social/icontik.svg" ?>" alt="clipboard"
                    loading="lazy"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/social/iconfb.svg" ?>" alt="fb"
                    loading="lazy"></a>

            <a id="isntagram" href="https://instagram.com/share?url=<?php echo urlencode(get_permalink()); ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/social/iconinsta.svg" ?>" alt="twitter"
                    loading="lazy"></a>
            <a href="https://pinterest.com/pin/create/button/?url=<?php echo get_permalink() ?>&media=<?php echo get_the_post_thumbnail_url() ?>&description=<?php echo truncate_title(20) ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/social/iconpen.svg" ?>" alt="pinterest"
                    loading="lazy"></a>
            <a class="savebookmark" href=""><img src="<?php echo aliving_image . "/icon/social/bookmark-fill.svg" ?>"
                    alt="bookmark" loading="lazy"> <span>Save</span></a>
        </div>
    </div>
    <?php
}