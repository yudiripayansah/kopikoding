<?php
/*
 * Theme Metabox Options
 * @package itechie
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {


    /*-------------------------------------
	   Page Options
   -------------------------------------*/
    $itechie_group_meta = 'itechie_service_meta';
    CSF::createMetabox($itechie_group_meta, array(
        'title'     => esc_html__('Service Meta', 'itechie-core'),
        'post_type' => 'service',
    ));

    //
    // Create a section
    CSF::createSection($itechie_group_meta, array(
        'title'  => esc_html__('Service Info', 'itechie-core'),
        'fields' => array(
            array(
                'id'    => 'icon',
                'type'  => 'icon',
                'title' => esc_html__('Service Icon', 'itechie-core'),
            ),
            array(
                'id'         => 'features_section_title',
                'title'      => esc_html__('Features Section Title', 'itechie-core'),
                'type'       => 'text',
                'default'    => esc_html__('My Experiences', 'itechie-core'),
            ),
            array(
                'id'         => 'features',
                'type'       => 'repeater',
                'title'      => esc_html__('Features', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__('Icon', 'itechie-core'),
                    ),
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__('Title', 'itechie-core'),
                        'default' => esc_html__('Flexible Solutions', 'itechie-core')
                    ),
                    array(
                        'id'    => 'content',
                        'type'  => 'text',
                        'title' => esc_html__('Content', 'itechie-core'),
                        'default' => esc_html__('Maecenas tempus, tellus eget condime honcus sem quam semper', 'itechie-core')
                    ),
                ),
            ),

        )
    ));

    //
    // FAQ
    CSF::createSection($itechie_group_meta, array(
        'title'  => esc_html__('Faq', 'itechie-core'),
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__('FAQ', 'itechie-core'),
            ),
            array(
                'id'         => 'faq_header',
                'title'      => esc_html__(' FAQ Header', 'itechie-core'),
                'type'       => 'text',
                'default'    => esc_html__('More information', 'itechie-core'),
            ),
            array(
                'id'         => 'faq_item',
                'type'       => 'repeater',
                'title'      => esc_html__('FAQ', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'    => 'question',
                        'type'  => 'text',
                        'title' => esc_html__('Question', 'itechie-core'),
                        'default' => esc_html__('Default Title', 'itechie-core')
                    ),
                    array(
                        'id'    => 'answer',
                        'type'  => 'textarea',
                        'title' => esc_html__('Default Answer', 'itechie-core'),
                        'default' => esc_html__('Default Answer', 'itechie-core')
                    ),

                ),
            ),
            array(
                'id'    => 'image',
                'type'  => 'upload',
                'title' => esc_html__('Image', 'itechie-core'),
            ),

        )
    ));
}//endif