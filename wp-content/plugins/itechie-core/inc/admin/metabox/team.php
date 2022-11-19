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
    $itechie_group_meta = 'itechie_team_meta';
    CSF::createMetabox($itechie_group_meta, array(
        'title'     => esc_html__('Team Meta', 'itechie-core'),
        'post_type' => 'team',
    ));

    //
    // Create a section
    CSF::createSection($itechie_group_meta, array(
        'title'  => esc_html__('Team Member Info', 'itechie-core'),
        'fields' => array(
            array(
                'id'         => 'designation',
                'title'      => esc_html__('Designation', 'itechie-core'),
                'type'       => 'text',
                'default'    => false,
            ),
            array(
                'id'         => 'about',
                'title'      => esc_html__(' About', 'itechie-core'),
                'type'       => 'textarea',
                'default'    => false,
            ),
            array(
                'id'         => 'more_info',
                'type'       => 'repeater',
                'title'      => esc_html__('More Info', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'    => 'title',
                        'type'  => 'text',
                        'title' => esc_html__('Info Title', 'itechie-core'),
                        'default' => esc_html__('Phone :', 'itechie-core')
                    ),
                    array(
                        'id'    => 'content',
                        'type'  => 'text',
                        'title' => esc_html__('Info Content', 'itechie-core'),
                        'default' => esc_html__('123 - 456 - 789 ', 'itechie-core')
                    ),
                ),
            ),
            array(
                'id'         => 'social_profile',
                'type'       => 'repeater',
                'title'      => esc_html__('Social Profile', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'    => 'icon',
                        'type'  => 'icon',
                        'title' => esc_html__('Pick Up Your Icon', 'itechie-core'),
                    ),
                    array(
                        'id'    => 'link',
                        'type'  => 'text',
                        'title' => esc_html__('Enter Social Url', 'itechie-core'),
                    ),
                    array(
                        'id'    => 'color',
                        'type'  => 'color',
                        'title' => esc_html__('Color', 'itechie-core'),
                    ),
                ),
            ),
        )
    ));

    //
    // Experience
    CSF::createSection($itechie_group_meta, array(
        'title'  => esc_html__('Experience', 'itechie-core'),
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Experience', 'itechie-core'),
            ),
            array(
                'id'         => 'experience_header',
                'title'      => esc_html__('Experience Header', 'itechie-core'),
                'type'       => 'text',
                'default'    => esc_html__('My Experiences', 'itechie-core'),
            ),
            array(
                'id'         => 'experience_content',
                'type'       => 'repeater',
                'title'      => esc_html__('Experience Content', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'         => 'title',
                        'title'      => esc_html__('Experience Title', 'itechie-core'),
                        'type'       => 'text',
                        'default'    => esc_html__('IT Expert', 'itechie-core'),
                    ),
                    array(
                        'id'         => 'year',
                        'title'      => esc_html__('Experience Year', 'itechie-core'),
                        'type'       => 'text',
                        'default'    => esc_html__('Softten (2015 - 2018)', 'itechie-core'),
                    ),
                    array(
                        'id'         => 'content',
                        'title'      => esc_html__('Experience Content', 'itechie-core'),
                        'type'       => 'textarea',
                    ),

                ),
            )
        )
    ));

    //
    // skill
    CSF::createSection($itechie_group_meta, array(
        'title'  => esc_html__('Skill', 'itechie-core'),
        'fields' => array(
            array(
                'type'    => 'subheading',
                'content' => esc_html__('Skill', 'itechie-core'),
            ),
            array(
                'id'         => 'skill_title',
                'title'      => esc_html__('Skill Title', 'itechie-core'),
                'type'       => 'text',
                'default'    => esc_html__('My Professional', 'itechie-core'),
            ),
            array(
                'id'         => 'skill_item',
                'type'       => 'repeater',
                'title'      => esc_html__('Add Skill Item', 'itechie-core'),
                'fields'     => array(
                    array(
                        'id'         => 'title',
                        'title'      => esc_html__('Skill Title', 'itechie-core'),
                        'type'       => 'text',
                        'default'    => esc_html__('Web development', 'itechie-core'),
                    ),
                    array(
                        'id'      => 'percentage',
                        'type'    => 'slider',
                        'title'   => esc_html__('Percentage', 'itechie-core'),
                        'min'     => 0,
                        'max'     => 100,
                        'step'    => 1,
                        'default' => 70,
                    ),

                ),
            )

        )

    ));
}//endif