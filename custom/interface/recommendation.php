<?php
function signleproduct_recommendation()
{
    ?>
    <div>

        <div class="productrecommendation collections">
            <div class="collectiontile global_width">
                <h1>Best Deals At Mart</h1>
            </div>
            <div class="wrapproductreco global_width">
                <div class="upperreco">
                    <div class="wrapauthorname">
                        <h1>By <?php echo get_author_name() ?></h1>
                        <div>
                            <?php shareicon() ?>
                        </div>
                    </div>
                </div>
                <div class="elementorwrapcontainer">
                    <?php

                    if (have_posts()):
                        while (have_posts()):
                            the_post();
                            the_content();
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}