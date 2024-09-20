<?php

function shareicon()
{
    ?>
    <div class="shar-bar">
        <h1>Share: </h1>
        <div class="socialicons">
            <a href="#" class="share-icon copy-link"><img src="<?php echo aliving_image . "/icon/social/icontik.svg" ?>"
                    alt="clipboard" loading="lazy"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/social/iconfb.svg" ?>" alt="fb"
                    loading="lazy"></a>

            <a id="isntagram" href="https://instagram.com/share?url=<?php echo urlencode(get_permalink()); ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/social/iconinsta.svg" ?>" alt="twitter"
                    loading="lazy"></a>
            <a href="" target="_blank"><img src="<?php echo aliving_image . "/icon/social/iconpen.svg" ?>" alt="email"
                    loading="lazy"></a>
            <a class="savebookmark" href=""><img src="<?php echo aliving_image . "/icon/social/bookmark-fill.svg" ?>"
                    alt="bookmark" loading="lazy"> <span>Save</span></a>
        </div>
    </div>
    <?php
}