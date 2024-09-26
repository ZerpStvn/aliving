<?php
class AlivingProductPostType
{
    public function __construct()
    {
        add_action('init', [$this, 'register_post_type']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_boxes']);
    }

    public function register_post_type()
    {
        $labels = [
            'name' => _x('Aliving Products', 'Post Type General Name', 'textdomain'),
            'singular_name' => _x('Aliving Product', 'Post Type Singular Name', 'textdomain'),
            'menu_name' => __('Aliving Products', 'textdomain'),
            'name_admin_bar' => __('Aliving Product', 'textdomain'),
        ];

        $args = [
            'label' => __('Aliving Product', 'textdomain'),
            'labels' => $labels,
            'supports' => ['title', 'editor', 'thumbnail'],
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-cart',
        ];

        register_post_type('alivingproduct', $args);
    }

    public function add_meta_boxes()
    {
        add_meta_box(
            'alivingproduct_pricing',
            __('Product Pricing', 'textdomain'),
            [$this, 'pricing_meta_box_callback'],
            'alivingproduct',
            'side',
            'high'
        );

        add_meta_box(
            'alivingproduct_ranking',
            __('Product Ranking', 'textdomain'),
            [$this, 'ranking_meta_box_callback'],
            'alivingproduct',
            'side',
            'high'
        );

        add_meta_box(
            'alivingproduct_link',
            __('Product Link', 'textdomain'),
            [$this, 'link_meta_box_callback'],
            'alivingproduct',
            'side',
            'high'
        );

        // Add meta box for Ratings
        add_meta_box(
            'alivingproduct_rating',
            __('Product Rating', 'textdomain'),
            [$this, 'rating_meta_box_callback'],
            'alivingproduct',
            'side',
            'high'
        );

        // Add meta box for Days of Shipping
        add_meta_box(
            'alivingproduct_shipping_days',
            __('Days of Shipping', 'textdomain'),
            [$this, 'shipping_days_meta_box_callback'],
            'alivingproduct',
            'side',
            'high'
        );

        // Add meta box for Free Shipping or Paid Shipping
        add_meta_box(
            'alivingproduct_shipping_type',
            __('Shipping Type', 'textdomain'),
            [$this, 'shipping_type_meta_box_callback'],
            'alivingproduct',
            'side',
            'high'
        );
    }

    public function pricing_meta_box_callback($post)
    {
        $value = get_post_meta($post->ID, '_alivingproduct_pricing', true);
        echo '<label for="alivingproduct_pricing">' . __('Pricing', 'textdomain') . '</label>';
        echo '<input type="text" id="alivingproduct_pricing" name="alivingproduct_pricing" value="' . esc_attr($value) . '" />';
    }

    public function ranking_meta_box_callback($post)
    {
        $value = get_post_meta($post->ID, '_alivingproduct_ranking', true);
        $custom_value = get_post_meta($post->ID, '_alivingproduct_custom_ranking', true);
        $choices = [
            'Best Overall' => 'Best Overall',
            'Runner Up' => 'Runner Up',
            'Best Deals' => 'Best Deals',
        ];

        echo '<label for="alivingproduct_ranking">' . __('Ranking', 'textdomain') . '</label>';
        echo '<select id="alivingproduct_ranking" name="alivingproduct_ranking">';
        foreach ($choices as $key => $label) {
            echo '<option value="' . esc_attr($key) . '" ' . selected($value, $key, false) . '>' . esc_html($label) . '</option>';
        }
        echo '</select>';

        echo '<p><label for="alivingproduct_custom_ranking">' . __('Or Add a Custom Ranking:', 'textdomain') . '</label>';
        echo '<input type="text" id="alivingproduct_custom_ranking" name="alivingproduct_custom_ranking" value="' . esc_attr($custom_value) . '" /></p>';
    }

    public function link_meta_box_callback($post)
    {
        $value = get_post_meta($post->ID, '_alivingproduct_link', true);
        echo '<label for="alivingproduct_link">' . __('Product Link', 'textdomain') . '</label>';
        echo '<input type="url" id="alivingproduct_link" name="alivingproduct_link" value="' . esc_attr($value) . '" />';
    }

    public function rating_meta_box_callback($post)
    {
        $value = get_post_meta($post->ID, '_alivingproduct_rating', true);
        echo '<label for="alivingproduct_rating">' . __('Product Rating (1-10)', 'textdomain') . '</label>';
        echo '<input type="number" id="alivingproduct_rating" name="alivingproduct_rating" value="' . esc_attr($value) . '" step="0.1" min="1" max="10" />';
    }

    public function shipping_days_meta_box_callback($post)
    {
        $value = get_post_meta($post->ID, '_alivingproduct_shipping_days', true);
        echo '<label for="alivingproduct_shipping_days">' . __('Days of Shipping', 'textdomain') . '</label>';
        echo '<input type="text" id="alivingproduct_shipping_days" name="alivingproduct_shipping_days" value="' . esc_attr($value) . '" />';
    }

    public function shipping_type_meta_box_callback($post)
    {
        $value = get_post_meta($post->ID, '_alivingproduct_shipping_type', true);
        echo '<label for="alivingproduct_shipping_type">' . __('Free Shipping or Paid Shipping', 'textdomain') . '</label>';
        echo '<select id="alivingproduct_shipping_type" name="alivingproduct_shipping_type">';
        echo '<option value="Free" ' . selected($value, 'Free', false) . '>' . __('Free', 'textdomain') . '</option>';
        echo '<option value="Paid" ' . selected($value, 'Paid', false) . '>' . __('Paid', 'textdomain') . '</option>';
        echo '</select>';
    }

    public function save_meta_boxes($post_id)
    {
        if (array_key_exists('alivingproduct_pricing', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_pricing', sanitize_text_field($_POST['alivingproduct_pricing']));
        }

        if (array_key_exists('alivingproduct_ranking', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_ranking', sanitize_text_field($_POST['alivingproduct_ranking']));
        }

        if (array_key_exists('alivingproduct_custom_ranking', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_custom_ranking', sanitize_text_field($_POST['alivingproduct_custom_ranking']));
        }

        if (array_key_exists('alivingproduct_link', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_link', esc_url_raw($_POST['alivingproduct_link']));
        }

        if (array_key_exists('alivingproduct_rating', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_rating', floatval($_POST['alivingproduct_rating']));
        }

        if (array_key_exists('alivingproduct_shipping_days', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_shipping_days', sanitize_text_field($_POST['alivingproduct_shipping_days']));
        }

        if (array_key_exists('alivingproduct_shipping_type', $_POST)) {
            update_post_meta($post_id, '_alivingproduct_shipping_type', sanitize_text_field($_POST['alivingproduct_shipping_type']));
        }
    }
}

new AlivingProductPostType();
