<?php
namespace Selleradise_Widgets\Setup;

/**
 * Custom
 * use it to write your custom functions.
 */
class PostTypes
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action('init', array($this, 'custom_post_type'), 10, 4);
        add_action('after_switch_theme', array($this, 'rewrite_flush'));
    }

    /**
     * Create Custom Post Types
     * @return The registered post type object, or an error object
     */
    public function custom_post_type()
    {
        /**
         * Add the post types and their details
         */
        $custom_posts = array(
            array(
                'slug' => 'faq',
                'singular' => __('FAQ', 'selleradise-widgets'),
                'plural' => __('FAQs', 'selleradise-widgets'),
                'menu_icon' => 'dashicons-format-chat',
                'menu_position' => 20,
                'text_domain' => 'selleradise-widgets',
                'supports' => array('title', 'editor' /*, 'thumbnail' , 'excerpt', 'author', 'comments'*/),
                'description' => __('FAQ Post Type', 'selleradise-widgets'),
                'public' => false,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'capability_type' => 'post',
                'has_archive' => false,
                'hierarchical' => false,
                'show_in_rest' => true,
            ),
            array(
                'slug' => 'testimonial',
                'singular' => __('Testimonial', 'selleradise-widgets'),
                'plural' => __('Testimonials', 'selleradise-widgets'),
                'menu_icon' => 'dashicons-format-quote',
                'menu_position' => 25,
                'text_domain' => 'selleradise-widgets',
                'supports' => array('title',  /*, 'thumbnail' , 'editor', 'excerpt', 'author', 'comments'*/),
                'description' => __('Testimonial Post Type', 'selleradise-widgets'),
                'public' => false,
                'publicly_queryable' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'query_var' => true,
                'capability_type' => 'post',
                'has_archive' => false,
                'hierarchical' => false,
                'show_in_rest' => true,
            ),
        );

        foreach ($custom_posts as $custom_post) {
            $labels = array(
                'name' => $custom_post['plural'],
                'singular_name' => $custom_post['singular'],
                'menu_name' => $custom_post['plural'],
                'name_admin_bar' => $custom_post['singular'],
                'add_new' => sprintf(__('Add New %s', 'selleradise-widgets'), $custom_post['singular']),
                'add_new_item' => sprintf(__('Add New %s', 'selleradise-widgets'), $custom_post['singular']),
                'new_item' => sprintf(__('New %s', 'selleradise-widgets'), $custom_post['singular']),
                'edit_item' => sprintf(__('Edit %s', 'selleradise-widgets'), $custom_post['singular']),
                'view_item' => sprintf(__('View %s', 'selleradise-widgets'), $custom_post['singular']),
                'view_items' => sprintf(__('View %s', 'selleradise-widgets'), $custom_post['singular']),
                'all_items' => sprintf(__('All %s', 'selleradise-widgets'), $custom_post['singular']),
                'search_items' => sprintf(__('Search %s', 'selleradise-widgets'), $custom_post['singular']),
                'parent_item_colon' => sprintf(__('Parent %s', 'selleradise-widgets'), $custom_post['singular']),
                'not_found' => sprintf(__('No %s', 'selleradise-widgets'), $custom_post['plural']),
                'not_found_in_trash' => sprintf(__('No %s found in Trash', 'selleradise-widgets'), $custom_post['plural']),
            );
            $args = array(
                'labels' => $labels,
                'description' => $custom_post['description'],
                'public' => $custom_post['public'],
                'publicly_queryable' => $custom_post['publicly_queryable'],
                'show_ui' => $custom_post['show_ui'],
                'show_in_menu' => $custom_post['show_in_menu'],
                'menu_icon' => $custom_post['menu_icon'],
                'query_var' => $custom_post['query_var'],
                'rewrite' => array('slug' => $custom_post['slug']),
                'capability_type' => $custom_post['capability_type'],
                'has_archive' => $custom_post['has_archive'],
                'hierarchical' => $custom_post['hierarchical'],
                'menu_position' => $custom_post['menu_position'],
                'supports' => $custom_post['supports'],
                'show_in_rest' => $custom_post['show_in_rest'],
            );

            register_post_type($custom_post['slug'], $args);
        }
    }

    /**
     * Flush Rewrite on CPT activation
     * @return empty
     */
    public function rewrite_flush()
    {
        // Flush the rewrite rules only on theme activation
        flush_rewrite_rules();
    }
}
