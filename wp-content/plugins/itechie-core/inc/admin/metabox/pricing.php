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
	   price Options
   -------------------------------------*/
    $itechie_group_meta = 'itechie_pricing_meta';
    CSF::createMetabox($itechie_group_meta, array(
        'title'     => esc_html__('Pricing Meta', 'itechie-core'),
        'post_type' => 'pricing',
    ));

    //
    // Create a section
    CSF::createSection($itechie_group_meta, array(
        'title'  => esc_html__('Pricing Info', 'itechie-core'),
        'fields' => array(
            array(
                'id'          => 'select_style',
                'type'        => 'select',
                'title'       => esc_html__('Style', 'itechie-core'),
                'options'     => array(
                    'style-one'  => 'Style One',
                    'style-two'  => 'Style Two',
                ),
                'default'     => 'style-one'
            ),
            array(
                'id'         => 'renewal_fee',
                'title'      => esc_html__('Renewal Fee ', 'itechie-core'),
                'type'       => 'text',
                'default'    => 40,
            ),
            array(
                'id'         => 'currency',
                'title'      => esc_html__(' Currency', 'itechie-core'),
                'type'       => 'text',
                'default'    => '$'
            ),
            array(
                'id'         => 'price_plan',
                'title'      => esc_html__(' Price Plan', 'itechie-core'),
                'type'       => 'text',
                'default'    => esc_html__('/ Mo', 'itechie-core'),
                'dependency' => array('select_style', '==', 'style-two'),
            ),
            array(
                'id'    => 'price_icon',
                'type'  => 'icon',
                'title' => esc_html__('Price Icon', 'itechie-core'),
            ),
            array(
                'id'         => 'tag_line',
                'title'      => esc_html__('Tag Line', 'itechie-core'),
                'type'       => 'text',
                'default'    => false,
                'default'    => esc_html__('per month billed annually', 'itechie-core'),
                'dependency' => array('select_style', '==', 'style-one'),
            ),
            array(
                'id'         => 'features',
                'type'       => 'repeater',
                'title'      => esc_html__('Features', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'    => 'features',
                        'type'  => 'text',
                        'title' => esc_html__('Add Features', 'itechie-core'),
                        'default' => esc_html__('30 Days Trial Features', 'itechie-core')
                    ),
                    array(
                        'id'    => 'activity',
                        'type'  => 'switcher',
                        'title' => esc_html__('Availability', 'itechie-core'),
                        'default' => true
                    ),

                ),
            ),
            array(
                'id'         => 'button_label',
                'title'      => esc_html__('Button Label', 'itechie-core'),
                'type'       => 'text',
                'default'    => false,
                'default'    => esc_html__('Get Started', 'itechie-core')
            ),
            array(
                'id'         => 'button_url',
                'title'      => esc_html__('Button Url', 'itechie-core'),
                'type'       => 'text',
                'default'    => false,
                'default'    => '#'
            ),
        )
    ));
}//endif