<?php
/*
 * @package itechie-core
 * @since 1.0.0
*/
if (!class_exists('Itechie_Post_Type_Pricing')) {
    class Itechie_Post_Type_Pricing
    {

        private static $instance;

        /**
         * @var string
         *
         * Set post type params
         */
        private $type               = 'pricing';
        private $slug               = 'pricing';
        private $name               = 'Pricing';
        private $singular_name      = 'Pricing';
        private $icon               = 'dashicons-carrot';

        function __construct()
        {

            add_action('init', array($this, 'create_post_type'));
        }

        /**
         * getInstance();
         * @since 1.0.0
         * */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        function create_post_type()
        {

            $slug = $this->slug;
            $labels = array(
                'name'                  => esc_html_x('Pricing', 'Post Type General Name', 'itechie-core'),
                'singular_name'         => esc_html_x('Pricing', 'Post Type Singular Name', 'itechie-core'),
                'add_new'               => esc_html__('Add New', 'itechie-core'),
                'add_new_item'          => esc_html__('Add New ', 'itechie-core') . $this->singular_name,
                'edit_item'             => esc_html__('Edit ', 'itechie-core') . $this->singular_name,
                'new_item'              => esc_html__('New ', 'itechie-core') . $this->singular_name,
                'all_items'             => esc_html__('All ', 'itechie-core')  . $this->name,
                'view_item'             => esc_html__('View ', 'itechie-core') . $this->singular_name,
                'view_items'            => esc_html__('View ', 'itechie-core') . $this->name,
                'search_items'          => esc_html__('Search ', 'itechie-core') . $this->name,
                'not_found'             => esc_html__('No ', 'itechie-core') . strtolower($this->name) . esc_html__(' found', 'itechie-core'),
                'not_found_in_trash'    => esc_html__('No ', 'itechie-core') . strtolower($this->name) .  esc_html__(' found in Trash', 'itechie-core'),
                'parent_item_colon'     => '',
                'menu_name'             => $this->name,
            );

            $args = array(
                'labels'                => $labels,
                'public'                => true,
                'publicly_queryable'    => true,
                'show_ui'               => true,
                'show_in_menu'          => false,
                'query_var'             => true,
                'rewrite'               => array('slug' => $slug),
                'capability_type'       => 'post',
                'has_archive'           => false,
                'hierarchical'          => true,
                'menu_position'         => 8,
                'supports'              => array('title'),
                'yarpp_support'         => true,
                'show_in_admin_bar' => true,
                'menu_icon'             => $this->icon
            );

            register_post_type($this->type, $args);
        }
    } // end class

    Itechie_Post_Type_Pricing::getInstance();
} //endif 