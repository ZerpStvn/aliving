<?php
class TrendingOnSocialsPostType
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
            'name' => _x('Trending on Socials', 'Post type general name', 'textdomain'),
            'singular_name' => _x('Trending on Socials', 'Post type singular name', 'textdomain'),
            'menu_name' => _x('Trending on Socials', 'Admin Menu text', 'textdomain'),
            'name_admin_bar' => _x('Trending on Social', 'Add New on Toolbar', 'textdomain'),
            'add_new' => __('Add New', 'textdomain'),
            'add_new_item' => __('Add New Trending on Social', 'textdomain'),
            'new_item' => __('New Trending on Social', 'textdomain'),
            'edit_item' => __('Edit Trending on Social', 'textdomain'),
            'view_item' => __('View Trending on Social', 'textdomain'),
            'all_items' => __('All Trending on Socials', 'textdomain'),
            'search_items' => __('Search Trending on Socials', 'textdomain'),
            'parent_item_colon' => __('Parent Trending on Socials:', 'textdomain'),
            'not_found' => __('No Trending on Socials found.', 'textdomain'),
            'not_found_in_trash' => __('No Trending on Socials found in Trash.', 'textdomain'),
            'featured_image' => _x('Trending on Socials Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image' => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image' => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives' => _x('Trending on Socials archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item' => _x('Insert into Trending on Social', 'Overrides the “Insert into post”/“Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this Trending on Social', 'Overrides the “Uploaded to this post”/“Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list' => _x('Filter Trending on Socials list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/“Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x('Trending on Socials list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/“Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list' => _x('Trending on Socials list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/“Pages list”. Added in 4.4', 'textdomain'),
        );

        $args = array(
            'labels' => $labels,
            'public' => true,
            'publicly_queryable' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => array('slug' => 'trending-on-socials'),
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
            'menu_icon' => 'dashicons-share', // You can change this to another Dashicon
        );

        register_post_type('trending_on_socials', $args);
    }

    public function add_custom_meta_box()
    {
        add_meta_box(
            'trending_on_socials_meta_box',   // Unique ID
            'Social URL',                     // Box title
            array($this, 'custom_meta_box_html'),  // Content callback, must be of type callable
            'trending_on_socials',            // Post type
            'side'                            // Context
        );

        add_meta_box(
            'trending_on_socials_video_url',   // Unique ID
            'Social Video URL',                     // Box title
            array($this, 'custom_meta_box_video_html'),  // Content callback, must be of type callable
            'trending_on_socials',            // Post type
            'side'                            // Context
        );
    }


    public function custom_meta_box_html($post)
    {
        $url = get_post_meta($post->ID, '_trending_on_socials_url', true);

        ?>
        <label for="trending_on_socials_url">Enter Social Media URL:</label>
        <input type="text" name="trending_on_socials_url" id="trending_on_socials_url" value="<?php echo esc_attr($url); ?>"
            size="25" />

        <?php
    }
    public function custom_meta_box_video_html($post)
    {
        $video_url = get_post_meta($post->ID, '_trending_on_socials_video_url', true);

        ?>
        <label for="trending_on_socials_video_url">Enter Social Media Video URL:</label>
        <input type="text" name="trending_on_socials_video_url" id="trending_on_socials_video_url"
            value="<?php echo esc_attr($video_url); ?>" size="25" />
        <?php
    }

    public function save_custom_meta_box($post_id)
    {
        if (array_key_exists('trending_on_socials_url', $_POST)) {
            update_post_meta(
                $post_id,
                '_trending_on_socials_url',
                $_POST['trending_on_socials_url']
            );
        }

        if (array_key_exists('trending_on_socials_video_url', $_POST)) {
            update_post_meta(
                $post_id,
                '_trending_on_socials_video_url',
                $_POST['trending_on_socials_video_url']
            );
        }
    }
}

new TrendingOnSocialsPostType();
