<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Recent widget
  //
  CSF::createWidget('itechie_recent_service_widget', array(
    'title'       => esc_html__('Itechie Recent Service Widget', 'itechie-core'),
    'classname'   => 'widget-recent-post widget_catagory',
    'description' => esc_html__('Recent Serive Widget', 'itechie-core'),
    'fields'      => array(
      array(
        'id'          => 'style',
        'type'        => 'select',
        'title'       => esc_html__('Select Style', 'itechie-core'),
        'options'     => array(
          'style-1'  => esc_html__('Style 01', 'itechie-core'),
          'style-2'  => esc_html__('Style 02', 'itechie-core'),
        ),
        'default'     => 'style-1'
      ),
      array(
        'id'      => 'title', //title
        'type'    => 'text',
        'title'   => esc_html__('Title', 'itechie-core'),
        'default' => esc_html__('Recent News ', 'itechie-core')
      ),
      array(
        'id'      => 'ppp', //post per page
        'type'    => 'text',
        'title'   => esc_html__('How Many Post Display ?', 'itechie-core'),
        'default' => '3'
      ),
      array(
        'id'      => 'orderby',
        'type'    => 'select',
        'title'   => esc_html__('Order By', 'itechie-core'),
        'options' => array(
          'author' => esc_html__('Author', 'itechie-core'),
          'title' => esc_html__('Title', 'itechie-core'),
          'date' => esc_html__('Date', 'itechie-core'),
          'rand' => esc_html__('Random', 'itechie-core'),
        ),
        'default' => 'date'
      ),
      array(
        'id'      => 'order',
        'type'    => 'select',
        'title'   =>  esc_html__('Order', 'itechie-core'),
        'options' => array(
          'desc' => esc_html__('DESC', 'itechie-core'),
          'asc' => esc_html__('ASC', 'itechie-core'),
        ),
      ),
    )
  ));

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if (!function_exists('itechie_recent_service_widget')) {
    function itechie_recent_service_widget($args, $instance)
    {

      echo $args['before_widget'];

      if (!empty($instance['title'])) {
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
      } ?>
      <ul>
        <?php
        $arg = array(
          'post_type'             => 'service',
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => 1,
          'posts_per_page'        => $instance['ppp'],
        );
        $arg['orderby'] = $instance['orderby'];
        $arg['order'] = $instance['order'];

        $service = new \WP_Query($arg);
        if ($service->have_posts()) :
          while ($service->have_posts()) : $service->the_post();
            if ('style-1' == $instance['style']) :
        ?>
              <li>
                <div class="media">
                  <?php if (has_post_thumbnail()) : ?>
                    <div class="media-left">
                      <?php the_post_thumbnail('itechie_blog_80X80'); ?>
                    </div>
                  <?php endif; ?>
                  <div class="media-body align-self-center">
                    <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    <div class="post-info"><i class="far fa-calendar-alt"></i><span><?php the_time('d F'); ?></span></div>
                  </div>
                </div>
              </li>
            <?php

            else : ?>
              <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php endif;

          endwhile;
          wp_reset_postdata();
        endif; ?>
      </ul>


<?php
      echo $args['after_widget'];
    }
  }
}
