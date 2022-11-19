<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package itechie
 */

get_header();
$itechie_404_title    = !empty(itechie_get_option('404_title')) ? itechie_get_option('404_title') : __('Oops!', 'itechie');
$itechie_404_subtitle = !empty(itechie_get_option('404_subtitle')) ? itechie_get_option('404_subtitle') : __('Sorry, This Page Doesn\'t Exist.', 'itechie');
$itechie_back_home    = !empty(itechie_get_option('404_button_text')) ? itechie_get_option('404_button_text') : __('Back To Homepage', 'itechie');
?>
<div class="blog-page-area">

    <!-- error-page area start -->
    <section class="error-page-area pd-top-100 pd-bottom-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="error-inner text-center">
                        <h2><?php echo esc_html($itechie_404_title); ?></h2>
                        <p><?php echo esc_html($itechie_404_subtitle); ?></p>
                        <a class="btn btn-base" href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($itechie_back_home); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- error-page area end -->
    <?php
    get_footer();
