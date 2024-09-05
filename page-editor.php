<?php
get_header();

?>
<div>
    <div class="editorialpage">
        <div class="imgvieweditorial"
            style="background-image:url(<?php echo aliving_image . '/imghero.png' ?>); repeat:no-repeat;">
            <div class="title">
                <h1>Aliquam tincidunt mauris eu risus</h1>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.
                    Nullam malesuada erat ut turpis. Suspendisse urna nibh viverra non semper suscipit posuere a pede.
                </p>
            </div>
        </div>
        <div class="global_width">

            <div class="archivepage">
                <h2 class="title">
                    Archives
                </h2>
                <p class="cotenttitle">Praesent dapibus neque id cursus faucibus tortor neque egestas auguae eu
                    vulputate.
                </p>

                <div class="editorwraplist">
                    <?php edtoriallink('editorial') ?>
                </div>
            </div>
            <div class="editorcontent">

                <div class="collectionwraplist global_width">
                    <?php collectionsfront('decor') ?>
                </div>
            </div>

        </div>
        <div class="nextpostwrap">
            <div class="containernextpost ">
                <?php display_next_post_link2() ?>
            </div>

        </div>
    </div>
</div>
<?php
get_footer();
?>