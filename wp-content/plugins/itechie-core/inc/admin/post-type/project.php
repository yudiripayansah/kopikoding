<?php
/*
 * @package itechie-core
 * @since 1.0.0
*/
if (!class_exists('Itechie_Post_Type_Project')) {
    class Itechie_Post_Type_Project
    {

        private static $instance;

        /**
         * @var string
         *
         * Set post type params
         */
        private $type               = 'project';
        private $slug               = 'project';
        private $name               = 'Project';
        private $singular_name      = 'Project';
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
                'name'                  => esc_html_x('Project', 'Post Type General Name', 'itechie-core'),
                'singular_name'         => esc_html_x('Project', 'Post Type Singular Name', 'itechie-core'),
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
                'show_in_admin_bar' => true,
                'menu_position'         => 8,
                'supports'              => array('title', 'editor', 'thumbnail'),
                'yarpp_support'         => true,
                'menu_icon'             => $this->icon
            );

            register_post_type($this->type, $args);

            register_taxonomy($this->type . '_cat', $this->type, array(
                'public'                => true,
                'hierarchical'          => true,
                'show_admin_column'     => true,
                'show_in_nav_menus'     => false,
                'labels'                => array(
                    'name'  => $this->singular_name . esc_html__(' Categories', 'itechie-core'),
                )
            ));
        }
    } // end class

    Itechie_Post_Type_Project::getInstance();
} //endif 