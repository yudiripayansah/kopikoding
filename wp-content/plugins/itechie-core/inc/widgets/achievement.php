<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Recent widget
  //
  CSF::createWidget('itechie_achievement_widget', array(
    'title'       => esc_html__('Itechie Achievement Widget', 'itechie-core'),
    'classname'   => 'widget widget_catagory',
    'description' => esc_html__('Add Achievement Widget', 'itechie-core'),
    'fields'      => array(
      array(
        'id'      => 'title', //title
        'type'    => 'text',
        'title'   => esc_html__('Title', 'itechie-core'),
        'default' => esc_html__('Achievement', 'itechie-core')
      ),
      array(
        'id'         => 'achievement',
        'type'       => 'repeater',
        'title'      => esc_html__('Achievement Items', 'itechie-core'),
        'fields'     => array(
          array(
            'id'    => 'title',
            'type'  => 'text',
            'title' => esc_html__('Title', 'itechie-core'),
            'default' => esc_html__('January 2021', 'itechie-core')
          ),
          array(
            'id'    => 'url',
            'type'  => 'text',
            'title' => esc_html__('Url', 'itechie-core'),
            'default' => '#'
          ),

        ),
      ),
    )
  ));

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if (!function_exists('itechie_achievement_widget')) {
    function itechie_achievement_widget($args, $instance)
    {

      echo $args['before_widget'];

      if (!empty($instance['title'])) {
        echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
      }
?>
      <ul class="catagory-items">
        <?php foreach ($instance['achievement']  as $item) : ?>
          <li><a href="<?php esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a></li>
        <?php endforeach; ?>
      </ul>
<?php
      echo $args['after_widget'];
    }
  }
}
