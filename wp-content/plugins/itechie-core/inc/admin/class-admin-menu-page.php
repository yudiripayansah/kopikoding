<?php
/*
 * @package itechie-core
 * @since 1.0.0
*/
if (!class_exists('Itechie_Core_Admin_Page')) {
  class Itechie_Core_Admin_Page
  {


    public function __construct()
    {

      add_action('admin_menu', array($this, 'itechie_menu_page'));
    }



    /*
    * add page in menu
	* @since 1.0.0
    */

    public function itechie_menu_page()
    {

      add_menu_page('Itechie Options', 'Itechie Options', 'manage_options', 'itechie-theme-option', '', ITECHIE_CORE_IMG . '/logo.png');
      add_submenu_page('itechie-theme-option', 'Header Builder', 'Header Builder', 'manage_options', 'edit.php?post_type=header-builder');
      add_submenu_page('itechie-theme-option', 'Footer Builder', 'Footer Builder', 'manage_options', 'edit.php?post_type=footer-builder');
      add_submenu_page('itechie-theme-option', 'Teams', 'Teams', 'manage_options', 'edit.php?post_type=team');
      add_submenu_page('itechie-theme-option', 'Service', 'Service', 'manage_options', 'edit.php?post_type=service');
      add_submenu_page('itechie-theme-option', 'Service Categories', 'Service Categories', 'manage_options', 'edit-tags.php?taxonomy=service_cat');
      add_submenu_page('itechie-theme-option', 'Project', 'Project', 'manage_options', 'edit.php?post_type=project');
      add_submenu_page('itechie-theme-option', 'Project Categories', 'Project Categories', 'manage_options', 'edit-tags.php?taxonomy=project_cat');
      add_submenu_page('itechie-theme-option', 'Pricing', 'Pricing', 'manage_options', 'edit.php?post_type=pricing');
    }
  } //end class


  new Itechie_Core_Admin_Page();
} //endif 