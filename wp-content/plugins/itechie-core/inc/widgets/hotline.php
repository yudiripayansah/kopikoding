<?php
// Control core classes for avoid errors
if (class_exists('CSF')) {

  //
  // Recent widget
  //
  CSF::createWidget('itechie_hotline_widget', array(
    'title'       => esc_html__('Itechie Hotline Widget', 'itechie-core'),
    'classname'   => 'widget widget_catagory',
    'description' => esc_html__('Add Hotline Widget', 'itechie-core'),
    'fields'      => array(
      array(
        'id'      => 'title', //title
        'type'    => 'text',
        'title'   => esc_html__('Title', 'itechie-core'),
        'default' => esc_html__('Hot Line', 'itechie-core')
      ),
      array(
        'id'      => 'phone_number', //title
        'type'    => 'text',
        'title'   => esc_html__('Phone Number', 'itechie-core'),
        'default' => esc_html__('000 - 9999 - 8888', 'itechie-core')
      ),
      array(
        'id'    => 'bg_img',
        'type'  => 'upload',
        'title' => esc_html__('Background Image', 'itechie-core'),
      ),

    )
  ));

  //
  // Front-end display of widget example 1
  // Attention: This function named considering above widget base id.
  //
  if (!function_exists('itechie_hotline_widget')) {
    function itechie_hotline_widget($args, $instance)
    {
      echo $args['before_widget'];
?>
      <div class="widget widget_call_to_action bg-overlay-base" style="background-image: url(<?php echo esc_url($instance['bg_img']); ?>);">
        <div class="widget-inner text-center">
          <i class="icomoon-client"></i>
          <h5><?php echo esc_html($instance['title']); ?></h5>
          <h3><?php echo esc_html($instance['phone_number']); ?></h3>
        </div>
      </div>
<?php
      echo $args['after_widget'];
    }
  }
}