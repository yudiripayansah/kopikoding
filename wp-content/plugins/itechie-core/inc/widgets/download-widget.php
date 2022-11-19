<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Recent widget
  //
  CSF::createWidget('download_widget', array(
    'title'       => esc_html__('Download Widget', 'itechie-core'),
    'classname'   => 'widget_catagory',
    'description' => esc_html__('Add Download List', 'itechie-core'),
    'fields'      => array(
      array(
        'id'      => 'title', //title
        'type'    => 'text',
        'title'   => esc_html__('Download', 'itechie-core'),
        'default' => esc_html__('Recent News ', 'itechie-core')
      ),
      array(
        'id'         => 'download_item',
        'type'       => 'repeater',
        'title'      => esc_html__('Add Download Item', 'itechie-core'),
        'fields'     => array(
          array(
            'id'         => 'title',
            'title'      => esc_html__(' Title', 'itechie-core'),
            'type'       => 'text',
            'default'    => esc_html__('Download PDF', 'itechie-core'),
          ),
          array(
            'id'         => 'url',
            'title'      => esc_html__('Download Url', 'itechie-core'),
            'type'       => 'text',
            'default'    => '#',
          ),

        ),
      )
    )
  ));

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if (!function_exists('download_widget')) {
    function download_widget($args, $instance)
    {

      echo $args['before_widget'];

      if (!empty($instance['title'])) {
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
      } ?>
      <ul class="catagory-items">
        <?php
        if (is_array($instance['download_item'])) :
          foreach ($instance['download_item'] as $item) : ?>
            <li><a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a></li>
        <?php endforeach;
        endif; ?>
      </ul>
<?php
      echo $args['after_widget'];
    }
  }
}
