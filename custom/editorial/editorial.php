<?php

class EditorialPostType
{

    public function __construct()
    {
        add_action('init', array($this, 'register_post_type'));
        add_action('add_meta_boxes', array($this, 'add_custom_meta_box'));
        add_action('save_post', array($this, 'save_custom_meta_box'));
    }

    public function register_post_type()
    {
        $labels = array(
            'name' => _x('Collections', 'Post type general name', 'textdomain'),
            'singular_name' => _x('Collections', 'Post type singular name', 'textdomain'),
            'menu_name' => _x('Collections', 'Admin Menu text', 'textdomain'),
            'name_admin_bar' => _x('Collections', 'Add New on Toolbar', 'textdomain'),
            'add_new' => __('Add New', 'textdomain'),
            'add_new_item' => __('Add New Collections', 'textdomain'),
            'new_item' => __('New Collections', 'textdomain'),
            'edit_item' => __('Edit Collections', 'textdomain'),
            'view_item' => __('View Collections', 'textdomain'),
            'all_items' => __('All Collections', 'textdomain'),
            'search_items' => __('Search Collections', 'textdomain'),
            'parent_item_colon' => __('Parent Collections:', 'textdomain'),
            'not_found' => __('No Collections found.', 'textdomain'),
            'not_found_in_trash' => __('No Collections found in Trash.', 'textdomain'),
            'featured_image' => _x('Collections Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives' => _x('Collections archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item' => _x('Insert into Collections', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this Collections', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list' => _x('Filter Collections list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/“Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x('Collections list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/“Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list' => _x('Collections list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/“Pages list”. Added in 4.4', 'textdomain'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'editorial'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
            'taxonomies' => array('category'),
            'menu_icon' => 'dashicons-admin-site',
        );

        register_post_type('editorial', $args);
    }

    public function add_custom_meta_box()
    {
        add_meta_box(
            'editorial_meta_box',
            'Collections Options',
            array($this, 'custom_meta_box_html'),
            'editorial',
            'side'
        );

        add_meta_box(
            'service_meta_box',
            'Service Options',
            array($this, 'service_meta_box_html'),
            'editorial',
            'side'
        );

        add_meta_box(
            'product_meta_box',
            'Product Options',
            array($this, 'product_meta_box_html'),
            'editorial',
            'normal'
        );

        add_meta_box(
            'gifts_meta_box',
            'Gifts',
            array($this, 'gifts_meta_box_html'),
            'editorial',
            'side'
        );

        add_meta_box(
            'store_front_meta_box',
            'Store Front Categories',
            array($this, 'store_front_meta_box_html'),
            'editorial',
            'side'
        );
    }

    public function custom_meta_box_html($post)
    {
        $editorial_type = get_post_meta($post->ID, '_editorial_type', true);
        $editorial_status = get_post_meta($post->ID, '_editorial_status', true);
        ?>
        <!-- <label for="editorial_type">Select Type:</label>
        <select name="editorial_type" id="editorial_type" class="postbox">
            <option value="" <?php selected($editorial_type, ''); ?>>None</option>
            <option value="editorial" <?php selected($editorial_type, 'editorial'); ?>>Editorial</option>
            <option value="article" <?php selected($editorial_type, 'article'); ?>>Article</option>
        </select> -->
        <br><br>
        <label for="editorial_status">Select Status:</label>
        <select name="editorial_status" id="editorial_status" class="postbox">
            <option value="" <?php selected($editorial_status, ''); ?>>None</option>
            <option value="hot_topic" <?php selected($editorial_status, 'hot_topic'); ?>>Hot Topic</option>
            <option value="trending" <?php selected($editorial_status, 'trending'); ?>>Trending</option>
            <option value="featured" <?php selected($editorial_status, 'featured'); ?>>Featured</option>
        </select>
        <?php
    }

    public function service_meta_box_html($post)
    {
        $service = get_post_meta($post->ID, '_service', true);
        ?>
        <label for="service">Select Service:</label>
        <select name="service" id="service" class="postbox">
            <option value="none" <?php selected($service, 'none'); ?>>none</option>
            <option value="decor" <?php selected($service, 'decor'); ?>>Decor</option>
            <option value="house_keeping" <?php selected($service, 'house_improvement'); ?>>House Keeping</option>
            <option value="home_improvement" <?php selected($service, 'home_decoration'); ?>>Home Improvement</option>
            <option value="garden" <?php selected($service, 'garden'); ?>>Garden</option>
            <option value="whattobuy" <?php selected($service, 'whattobuy'); ?>>What to buy</option>
        </select>
        <?php
    }



    public function product_meta_box_html($post)
    {
        $products = get_post_meta($post->ID, '_products', true);

        if (!is_array($products)) {
            $products = array(array('name' => '', 'ranking' => '', 'link' => '', 'image' => '', 'description' => '', 'price' => ''));
        }
        ?>

        <div id="products-wrapper">
            <?php foreach ($products as $index => $product): ?>
                <div class="product-item">
                    <label for="product_name_<?php echo $index; ?>">Product Name:</label>
                    <input type="text" name="products[<?php echo $index; ?>][name]" id="product_name_<?php echo $index; ?>"
                        value="<?php echo esc_attr($product['name'] ?? ''); ?>" class="widefat">

                    <label for="product_ranking_<?php echo $index; ?>">Ranking:</label>
                    <select name="products[<?php echo $index; ?>][ranking]" id="product_ranking_<?php echo $index; ?>"
                        class="widefat">
                        <option value="best_overall" <?php selected($product['ranking'] ?? '', 'best_overall'); ?>>Best Overall
                        </option>
                        <option value="runner_up" <?php selected($product['ranking'] ?? '', 'runner_up'); ?>>Runner Up</option>
                        <option value="best_deals" <?php selected($product['ranking'] ?? '', 'best_deals'); ?>>Best Deals</option>
                        <option value="other" <?php selected($product['ranking'] ?? '', 'other'); ?>>Other</option>
                    </select>

                    <label for="product_link_<?php echo $index; ?>">Product Link:</label>
                    <input type="url" name="products[<?php echo $index; ?>][link]" id="product_link_<?php echo $index; ?>"
                        value="<?php echo esc_attr($product['link'] ?? ''); ?>" class="widefat">

                    <label for="product_image_<?php echo $index; ?>">Product Image:</label>
                    <input type="text" name="products[<?php echo $index; ?>][image]" id="product_image_<?php echo $index; ?>"
                        value="<?php echo esc_attr($product['image'] ?? ''); ?>" class="widefat">
                    <button type="button" class="upload_image_button button">Upload Image</button>

                    <label for="product_description_<?php echo $index; ?>">Product Description:</label>
                    <textarea name="products[<?php echo $index; ?>][description]" id="product_description_<?php echo $index; ?>"
                        rows="4" class="widefat"><?php echo esc_textarea($product['description'] ?? ''); ?></textarea>

                    <label for="product_price_<?php echo $index; ?>">Product Price:</label>
                    <input type="text" name="products[<?php echo $index; ?>][price]" id="product_price_<?php echo $index; ?>"
                        value="<?php echo esc_attr($product['price'] ?? ''); ?>" class="widefat">

                    <button type="button" class="remove-product button">Remove</button>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" id="add-product" class="button">Add Another Product</button>

        <script>
            jQuery(document).ready(function ($) {
                var productIndex = <?php echo count($products); ?>;

                $('#add-product').on('click', function () {
                    var productHtml = '<div class="product-item">' +
                        '<label for="product_name_' + productIndex + '">Product Name:</label>' +
                        '<input type="text" name="products[' + productIndex + '][name]" id="product_name_' + productIndex + '" class="widefat">' +
                        '<label for="product_ranking_' + productIndex + '">Ranking:</label>' +
                        '<select name="products[' + productIndex + '][ranking]" id="product_ranking_' + productIndex + '" class="widefat">' +
                        '<option value="best_overall">Best Overall</option>' +
                        '<option value="runner_up">Runner Up</option>' +
                        '<option value="best_deals">Best Deals</option>' +
                        '<option value="other">Other</option>' +
                        '</select>' +
                        '<label for="product_link_' + productIndex + '">Product Link:</label>' +
                        '<input type="url" name="products[' + productIndex + '][link]" id="product_link_' + productIndex + '" class="widefat">' +
                        '<label for="product_image_' + productIndex + '">Product Image:</label>' +
                        '<input type="text" name="products[' + productIndex + '][image]" id="product_image_' + productIndex + '" class="widefat">' +
                        '<button type="button" class="upload_image_button button">Upload Image</button>' +
                        '<label for="product_description_' + productIndex + '">Product Description:</label>' +
                        '<textarea name="products[' + productIndex + '][description]" id="product_description_' + productIndex + '" rows="4" class="widefat"></textarea>' +
                        '<label for="product_price_' + productIndex + '">Product Price:</label>' +
                        '<input type="text" name="products[' + productIndex + '][price]" id="product_price_' + productIndex + '" class="widefat">' +
                        '<button type="button" class="remove-product button">Remove</button>' +
                        '</div>';
                    $('#products-wrapper').append(productHtml);
                    productIndex++;
                });

                $('#products-wrapper').on('click', '.remove-product', function () {
                    $(this).closest('.product-item').remove();
                });

                $('#products-wrapper').on('click', '.upload_image_button', function (e) {
                    e.preventDefault();
                    var button = $(this);
                    var input = button.prev('input');

                    var customUploader = wp.media({
                        title: 'Select Image',
                        button: {
                            text: 'Use this image'
                        },
                        multiple: false
                    }).on('select', function () {
                        var attachment = customUploader.state().get('selection').first().toJSON();
                        input.val(attachment.url);
                    }).open();
                });
            });
        </script>
        <?php
    }



    public function gifts_meta_box_html($post)
    {
        $gifts = get_post_meta($post->ID, '_gifts', true);
        ?>
        <label for="gifts">Gift Options:</label>
        <input type="checkbox" name="gifts" id="gifts" value="1" <?php checked($gifts, 1); ?>> Check if this is a gift.
        <?php
    }


    public function store_front_meta_box_html($post)
    {
        $store_front = get_post_meta($post->ID, '_store_front', true);
        ?>
        <label for="store_front">Store Front</label>
        <input type="text" name="store_front" id="store_front" value="<?php echo esc_attr($store_front); ?>" class="widefat">
        <p class="description">Enter store front(e.g., Akia, Walmart, etc..).</p>
        <?php
    }

    public function save_custom_meta_box($post_id)
    {
        if (array_key_exists('editorial_type', $_POST)) {
            update_post_meta(
                $post_id,
                '_editorial_type',
                $_POST['editorial_type']
            );
        }
        if (array_key_exists('editorial_status', $_POST)) {
            update_post_meta(
                $post_id,
                '_editorial_status',
                $_POST['editorial_status']
            );
        }
        if (array_key_exists('service', $_POST)) {
            update_post_meta(
                $post_id,
                '_service',
                $_POST['service']
            );
        }
        if (array_key_exists('products', $_POST)) {
            update_post_meta(
                $post_id,
                '_products',
                $_POST['products']
            );
        }
        if (array_key_exists('gifts', $_POST)) {
            update_post_meta(
                $post_id,
                '_gifts',
                $_POST['gifts']
            );
        } else {
            delete_post_meta($post_id, '_gifts');
        }
        if (array_key_exists('store_front', $_POST)) {
            update_post_meta(
                $post_id,
                '_store_front',
                $_POST['store_front']
            );
        }
    }

}

new EditorialPostType();