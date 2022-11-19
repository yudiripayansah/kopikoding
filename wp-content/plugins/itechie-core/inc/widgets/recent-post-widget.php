<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Recent widget
  //
  CSF::createWidget('itechie_recent_post_widget', array(
    'title'       => esc_html__('Itechie Recent Post Widget', 'itechie-core'),
    'classname'   => 'widget-recent-post',
    'description' => esc_html__('Recent Post Widget', 'itechie-core'),
    'fields'      => array(

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
        'id'          => 'category',
        'type'        => 'select',
        'placeholder' => esc_html__('Select a category', 'itechie-core'),
        'title'       => esc_html__('Category', 'itechie-core'),
        'options'     => 'categories',
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
  if (!function_exists('itechie_recent_post_widget')) {
    function itechie_recent_post_widget($args, $instance)
    {

      echo $args['before_widget'];

      if (!empty($instance['title'])) {
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
      } ?>
      <ul>
        <?php
        $arg = array(
          'post_type'             => 'post',
          'post_status'           => 'publish',
          'ignore_sticky_posts'   => 1,
          'posts_per_page'        => $instance['ppp'],
        );
        $arg['orderby'] = $instance['orderby'];
        $arg['order'] = $instance['order'];

        if (!empty($instance['category'])) {
          $arg['tax_query'][] = array(
            'taxonomy'           => 'category',
            'field' => 'id',
            'terms' => $instance['category']
          );
        }

        $blog = new \WP_Query($arg);
        if ($blog->have_posts()) :
          while ($blog->have_posts()) : $blog->the_post();
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
        <?php endwhile;
          wp_reset_postdata();
        endif; ?>
      </ul>
<?php
      echo $args['after_widget'];
    }
  }
}
