<?php
namespace Selleradise_Widgets\Setup;



class Taxonomies
{
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        add_action('init', array($this, 'custom_taxonomies'), 10, 4);
    }

    public function custom_taxonomies()
    {
        register_taxonomy('faq_category', array('faq'), array(
            'hierarchical' => true,
            'label' => 'FAQ Categories',
            'singular_label' => 'FAQ Category',
            'rewrite' => array('slug' => 'category', 'with_front' => false),
            )
        );

        register_taxonomy_for_object_type('categories', 'faq');

    }

}
