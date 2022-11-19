<?php if ('layout_three' == $settings['layout_type']) : ?>
    <!-- navbar start -->
    <div class="navbar-top style-3">
        <div class="container">
            <div class="row">
                <?php if (is_array($settings['topbar_left_list'])) : ?>
                    <div class="col-lg-6 col-md-8 align-self-center">
                        <ul class="topbar-right text-md-start text-center">
                            <?php foreach ($settings['topbar_left_list'] as $item) : ?>
                                <li>
                                    <p><i class="<?php echo esc_attr($item['icon']['value']); ?>"></i><?php echo esc_html($item['text']); ?></p>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="col-lg-6 col-md-4 d-none d-md-block">
                    <ul class="topbar-right text-md-end text-center">
                        <?php if (!empty($settings['topbar_right_text'])) : ?>
                            <li class="d-none d-lg-inline-block">
                                <p><?php echo wp_kses($settings['topbar_right_text'], 'itechie_core_allowed_tags'); ?></p>
                            </li>
                        <?php endif; ?>
                        <?php if (!empty($settings['button_label'])) : ?>
                            <li>
                                <a class="btn btn-base" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area navbar-area-3 navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#itech_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo">
                <a class="d-none d-lg-inline-block" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ('image' == $settings['logo_type']) : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php else : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['icon_logo']['value']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php endif; ?>
                </a>
                <a class="d-lg-none d-inline-block" href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ('image' == $settings['logo_type']) : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['mobile_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    <?php else : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['mobile_icon_logo']['value']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
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
                    <a class="search-bar-btn" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16.087" height="16.087" viewBox="0 0 16.087 16.087">
                            <g id="Search" transform="translate(-991 -113)">
                                <path id="Vector" d="M11.806,10.4a6.535,6.535,0,1,0-1.4,1.406h0a1.163,1.163,0,0,0,.1.116l3.871,3.871a1.006,1.006,0,0,0,1.423-1.422L11.922,10.5a1.02,1.02,0,0,0-.116-.1Zm.259-3.865a5.53,5.53,0,1,1-1.62-3.911A5.531,5.531,0,0,1,12.066,6.534Z" transform="translate(991 113)" fill="#fff" />
                            </g>
                        </svg>
                    </a>
                <?php endif; ?>
                <?php if (is_array($settings['social_icons'])) : ?>
                    <span class="social-area mx-3">
                        <?php foreach ($settings['social_icons'] as $item) : ?>
                            <a href="<?php echo esc_url($item['social_url']['url']); ?>"><i class="<?php echo esc_attr($item['social_icon']['value']); ?>" aria-hidden="true"></i></a>
                        <?php endforeach; ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
<?php endif; ?>