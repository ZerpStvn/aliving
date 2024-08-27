<?php

function shareicon()
{
    ?>
    <div class="shar-bar">
        <h1>Share: </h1>
        <div class="socialicons">
            <a href="#" class="share-icon copy-link"><img src="<?php echo aliving_image . "/icon/Link.png" ?>"
                    alt="clipboard" loading="lazy"></a>
            <a href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>" target="_blank"><img
                    src="<?php echo aliving_image . "/icon/Twitter.png" ?>" alt="twitter" loading="lazy"></a>
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/fb.png" ?>" alt="fb" loading="lazy"></a>
            <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this site <?php echo urlencode(get_permalink()); ?>"
                target="_blank"><img src="<?php echo aliving_image . "/icon/Email.png" ?>" alt="email" loading="lazy"></a>
            <a class="savebookmark" href=""><img src="<?php echo aliving_image . "/icon/Bookmark.png" ?>" alt="bookmark"
                    loading="lazy"> <span>Save</span></a>
        </div>
    </div>
    <?php
}