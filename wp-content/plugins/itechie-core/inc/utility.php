<?php


class Itechie_Utility
{
    public function __construct()
    {
        $this->register_image_size();
        //widget init
        add_action('widgets_init', array($this, 'widgets_init'));
        add_action('init', array($this, 'elementor_cpt_support'));
        add_filter('single_template', [$this, 'team_details_Page']);
        add_filter('single_template', [$this, 'project_details_page']);
        add_filter('single_template', [$this, 'service_details_page']);
    }
    public function register_image_size()
    {
        add_image_size('itechie_team_524X462', 524, 462, true); // in use
        add_image_size('itechie_team_794X320', 794, 320, true); // in use
        add_image_size('itechie_service_750X390', 750, 390, true); // in use
        add_image_size('itechie_blog_80X80', 80, 80, true); // in use
        add_image_size('itechie_blog__378X324', 378, 324, true);
        add_image_size('itechie_blog__360X308', 360, 308, true);
        add_image_size('itechie_blog__360X254', 360, 254, true);
        add_image_size('itechie_blog__80X80', 80, 80, true);
        add_image_size('itechie_team__269X286', 269, 286, true);
        add_image_size('itechie_team__86X86', 86, 86, true);
        add_image_size('itechie_project__357X472', 357, 472, true);
        add_image_size('itechie_project__362X410', 362, 410, true);
        add_image_size('itechie_project__360X554', 360, 554, true);
        add_image_size('itechie_project__362X262', 362, 262, true);
        add_image_size('itechie_project_details__756X305', 756, 305, true);
    }

    /**
     * widgets_init
     * @since 1.0.0
     * */
    public function widgets_init()
    {
        register_sidebar(array(
            'name'          => esc_html__('Service Sidebar', 'itechie'),
            'id'            => 'service',
            'description'   => esc_html__('Add Service Sidebar widgets here.', 'itechie'),
            'before_widget' => '<div id="%1$s" class="widget %2$s widget-border">',
            'after_widget'  => '</div>',
            'before_title'  => '<h4 class="widget-title">',
            'after_title'   => '</h4>',
        ));
    }

    /**
     *cpt in elementor
     * @since 1.0.0
     * */
    public function elementor_cpt_support()
    {

        //if exists, assign to $cpt_support var
        $cpt_support = get_option('elementor_cpt_support');

        //check if option DOESN'T exist in db
        if (!$cpt_support) {
            $cpt_support = ['page', 'post', 'footer-builder', 'header-builder']; //create array of our default supported post types
            update_option('elementor_cpt_support', $cpt_support); //write it to the database
        }

        //if it DOES exist, but footer is NOT defined
        else if (!in_array('footer-builder', $cpt_support)) {
            $cpt_support[] = 'footer-builder'; //append to array
            update_option('elementor_cpt_support', $cpt_support); //update database
        }

        //if it DOES exist, but header is NOT defined
        else if (!in_array('header-builder', $cpt_support)) {
            $cpt_support[] = 'header-builder'; //append to array
            update_option('elementor_cpt_support', $cpt_support); //update database
        }
    }


    public function team_details_Page($template)
    {
        global $post;

        if ('team' === $post->post_type && locate_template(array('single-team.php')) !== $template) {
            /*
            * This is a 'team' post
            * AND a 'single team template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return ITECHIE_CORE_ROOT_PATH . '/post-templates/single-team.php';
        }

        return $template;
    }

    public function project_details_page($template)
    {
        global $post;

        if ('project' === $post->post_type && locate_template(array('single-project.php')) !== $template) {
            /*
            * This is a 'project' post
            * AND a 'single project template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return ITECHIE_CORE_ROOT_PATH . '/post-templates/single-project.php';
        }

        return $template;
    }


    public function service_details_page($template)
    {
        global $post;

        if ('service' === $post->post_type && locate_template(array('single-service.php')) !== $template) {
            /*
            * This is a 'service' post
            * AND a 'single service template' is not found on
            * theme or child theme directories, so load it
            * from our plugin directory.
            */
            return ITECHIE_CORE_ROOT_PATH . '/post-templates/single-service.php';
        }

        return $template;
    }
}

new Itechie_Utility();
