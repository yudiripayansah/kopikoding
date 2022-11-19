<?php if ('layout_one' == $settings['layout_type']) : ?>
    <!-- navbar start -->
    <div class="navbar-top">
        <div class="container">
            <div class="row">
                <?php if (is_array($settings['topbar_left_list'])) : ?>
                    <div class="col-sm-6">
                        <ul class="topbar-right text-md-start text-center">
                            <?php foreach ($settings['topbar_left_list'] as $item) : ?>
                                <li class="d-none d-none d-lg-inline-block">
                                    <p><i class="<?php echo esc_attr($item['icon']['value']); ?>"></i><?php echo wp_kses($item['text'], 'itechie_core_allowed_tags');  ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="col-sm-6">
                    <ul class="topbar-right text-md-end text-center">
                        <?php if (!empty($settings['topbar_right_text'])) : ?>
                            <li class="d-none d-none d-lg-inline-block">
                                <p><?php echo wp_kses($settings['topbar_right_text'], 'itechie_core_allowed_tags'); ?></p>
                            </li>
                        <?php endif; ?>
                        <?php if (is_array($settings['social_icons'])) : ?>
                            <li class="social-area">
                                <?php if (!empty($settings['social_network_title'])) : ?>
                                    <p class="d-inline-block"><?php echo wp_kses($settings['social_network_title'], 'itechie_core_allowed_tags'); ?></p>
                                <?php endif; ?>
                                <?php foreach ($settings['social_icons'] as $item) : ?>
                                    <a href="<?php echo esc_url($item['social_url']['url']); ?>"><i class="<?php echo esc_attr($item['social_icon']['value']); ?>" aria-hidden="true"></i></a>
                                <?php endforeach; ?>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area navbar-area-1 navbar-expand-lg">
        <div class="container nav-container navbar-bg">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#itech_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo itechie-logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ('image' == $settings['logo_type']) : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php else : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['icon_logo']['value']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php endif; ?>
                </a>
            </div>
            <?php if ('yes' == $settings['search_status']) : ?>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search-bar-btn" href="#">
                        <i class="fa fa-search"></i>
                    </a>
                </div>
            <?php endif; ?>
            <div class="collapse navbar-collapse" id="itech_main_menu">
                <?php
                wp_nav_menu(
                    array(
                        'menu' => $settings['nav_menu'],
                        'menu_class' => 'navbar-nav menu-open text-lg-end',
                        'container' => ''
                    )
                );
                ?>
            </div>
            <div class="nav-right-part nav-right-part-desktop align-self-center">
                <?php if ('yes' == $settings['search_status']) : ?>
                    <a class="search-bar-btn bl-gray-1 mx-0" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="19.5" height="19.5" viewBox="0 0 19.5 19.5">
                            <path id="Vector" d="M14.311,12.606a7.921,7.921,0,1,0-1.7,1.7h0a1.41,1.41,0,0,0,.119.14l4.692,4.693a1.219,1.219,0,0,0,1.724-1.723l-4.692-4.693a1.236,1.236,0,0,0-.14-.122Zm.314-4.685a6.7,6.7,0,1,1-1.963-4.74A6.7,6.7,0,0,1,14.626,7.92Z" fill="#141d38" />
                        </svg>

                    </a>
                <?php endif; ?>
                <?php if (!empty($settings['button_label'])) : ?>
                    <a class="btn btn-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

<?php endif; ?>