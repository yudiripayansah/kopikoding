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
    $itechie_group_meta = 'itechie_project_meta';
    CSF::createMetabox($itechie_group_meta, array(
        'title'     => esc_html__('Project Meta', 'itechie-core'),
        'post_type' => 'project',
    ));

    //
    // Create a section
    CSF::createSection($itechie_group_meta, array(
        'fields' => array(
            array(
                'id'         => 'project_info',
                'type'       => 'repeater',
                'title'      => esc_html__('Project Info', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__('Info Title', 'itechie-core'),
                        'default' => esc_html__('Project', 'itechie-core')
                    ),
                    array(
                        'id'    => 'content',
                        'type'  => 'text',
                        'title' => esc_html__('Info Content', 'itechie-core'),
                        'default' => esc_html__('It Solution Service', 'itechie-core')
                    ),
                ),
            ),
        )
    ));
}//endif