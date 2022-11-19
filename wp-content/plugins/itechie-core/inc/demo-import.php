<?php
/*
* @packge itechie core
* @since 1.0.0
 */
function itechie_demo_import()
{
  return array(
    array(
      'import_file_name'             => __('Demo', 'itechie-core'),
      'page_title'                   => __('Insert Demo', 'itechie-core'),
      'local_import_file'            => ITECHIE_CORE_ROOT_PATH . '/demo/demo-data.xml',
      'local_import_widget_file'     => ITECHIE_CORE_ROOT_PATH . '/demo/widget.wie',
      'local_import_customizer_file' =>  ITECHIE_CORE_ROOT_PATH . '/demo/itechie-customiser.dat',
      'local_import_json'           => array(
        array(
          'file_path'     =>  ITECHIE_CORE_ROOT_PATH . '/demo/theme-options.json',
          'option_name'   => 'itechie-theme-options',
        ),
      ),
      'import_notice'                => __('This import maybe finish on 5-10 minutes', 'itechie-core'),

    ),

  );
}
add_filter('pt-ocdi/import_files', 'itechie_demo_import');

add_action('pt-ocdi/after_import',  'itechie_after_import');
if (!function_exists('itechie_after_import')) :
  function itechie_after_import($selected_import)
  {
    if ('Demo' === $selected_import['import_file_name']) {

      $main_menu = get_term_by('slug', 'menu-1', 'nav_menu');

      set_theme_mod('nav_menu_locations', array(
        'main-menu' => $main_menu->term_id,
      ));


      //Set Front page
      $page = get_page_by_title('Home');
      if (isset($page->ID)) {
        update_option('page_on_front', $page->ID);
        update_option('show_on_front', 'page');
      }

      $blog = get_page_by_title('Blog');
      if (isset($page->ID)) {
        update_option('page_for_posts', $blog->ID);
        update_option('show_on_front', 'page');
      }
    }
  }
endif;


/**
 * Adding local_import_json and import_json param supports.
 */
if (!function_exists('itechie_after_content_import_execution')) {
  function itechie_after_content_import_execution($selected_import_files, $import_files, $selected_index)
  {

    $downloader = new OCDI\Downloader();

    if (!empty($import_files[$selected_index]['import_json'])) {

      foreach ($import_files[$selected_index]['import_json'] as $index => $import) {
        $file_path = $downloader->download_file($import['file_url'], 'demo-import-file-' . $index . '-' . date('Y-m-d__H-i-s') . '.json');
        $file_raw  = OCDI\Helpers::data_from_file($file_path);
        update_option($import['option_name'], json_decode($file_raw, true));
      }
    } else if (!empty($import_files[$selected_index]['local_import_json'])) {

      foreach ($import_files[$selected_index]['local_import_json'] as $index => $import) {
        $file_path = $import['file_path'];
        $file_raw  = OCDI\Helpers::data_from_file($file_path);
        update_option($import['option_name'], json_decode($file_raw, true));
      }
    }
  }
  add_action('pt-ocdi/after_content_import_execution', 'itechie_after_content_import_execution', 3, 99);
}
