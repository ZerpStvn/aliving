<?php
get_header();

?>
<div>
    <div class="editorialpage prodrecom">
        <div class="imgvieweditorial"
            style="background-image:url(<?php echo aliving_image . '/Hero1.png' ?>); repeat:no-repeat;">
            <div class="title">
                <h1>Gifts</h1>
                <!-- <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                    Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a pede.
                </p> -->
            </div>
        </div>
        <div class="global_width">

            <div class="archivepage">
                <h2 class="title">
                    Winter Gifts
                </h2>
                <p class="cotenttitle">Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu
                    vulputate.
                </p>

                <div class="editorwraplist">
                    <?php edtoriallink('giftsidea') ?>
                </div>
            </div>
            <!-- <div class="editorcontent">

                <div class="collectionwraplist global_width">
                    <?php //collectionsfront('decor') ?>
                </div>-->
        </div>

    </div>
    <div class="giftscollectionwrap">
        <div class="giftscontent global_width">
            <h1 class="giftstitle">Gift Ideas for 2024</h1>
            <?php ourlastestpost('giftsidea') ?>
        </div>
    </div>
</div>
</div>
<?php
get_footer();
?>