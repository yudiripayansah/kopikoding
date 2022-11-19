<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package itechie
 */

?>

    <nav class="navbar navbar-area navbar-expand-lg default">
        <div class="container nav-container navbar-bg ">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#itech_main_menu" 
                aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <?php 
                    if ( has_custom_logo()){
                          the_custom_logo();
                    }else{
                        printf( '<div class="site-title"><a href="%1$s">%2$s</a></div>',esc_url( site_url('/')),esc_html( get_bloginfo('name') ) );
                    
                    } 
                ?>
            </div>
            <div class="nav-right-part nav-right-part-mobile">
                <a class="search-bar-btn" href="#">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="itech_main_menu">
                <?php
                    if ( has_nav_menu( 'main-menu' ) ){  
                                 wp_nav_menu( array(
                                'theme_location'  => 'main-menu',
                                'items_wrap'      => '<ul class="navbar-nav menu-open text-lg-end">%3$s</ul>',
                                'container'      =>'',
                                'container_class' => '',
                                'menu_class'      => 'menu',
                                ) ); 
                    }else{
                        wp_nav_menu( array(
                            'menu_id'        => 'primary-menu',
                            'menu_class'        => 'navbar-nav',
                            'container'        => false,
                        ) );
                    } 
                ?>
            </div>
        </div>
    </nav>
    <!-- navbar end -->

