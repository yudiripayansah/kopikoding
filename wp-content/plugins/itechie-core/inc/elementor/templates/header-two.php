<?php if ('layout_two' == $settings['layout_type']) : ?>
    <!-- navbar start -->
    <div class="navbar-top style-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-lg-inline-block d-none">
                    <div class="logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if ('image' == $settings['logo_type']) : ?>
                                <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php else : ?>
                                <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_url($settings['icon_logo']['value']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                            <?php endif; ?>
                        </a>
                    </div>
                </div>
                <?php if (is_array($settings['topbar_items'])) : ?>
                    <?php foreach ($settings['topbar_items'] as $item) : ?>
                        <div class="col-lg-3 col-md-5 align-self-center">
                            <div class="media">
                                <div class="media-left">
                                    <i class="<?php echo esc_attr($item['icon']['value']); ?>"></i>
                                </div>
                                <div class="media-body">
                                    <h6><?php echo esc_html($item['title']); ?></h6>
                                    <p><?php echo esc_html($item['text']); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if (is_array($settings['social_icons'])) : ?>
                    <div class="col-lg-3 d-lg-block d-none align-self-center">
                        <div class="social-media-light text-md-end text-center">
                            <?php foreach ($settings['social_icons'] as $item) : ?>
                                <a href="<?php echo esc_url($item['social_url']['url']); ?>"><i class="<?php echo esc_attr($item['social_icon']['value']); ?>" aria-hidden="true"></i></a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-area navbar-area-2 navbar-expand-lg">
        <div class="container nav-container">
            <div class="responsive-mobile-menu">
                <button class="menu toggle-btn d-block d-lg-none" data-target="#itech_main_menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-left"></span>
                    <span class="icon-right"></span>
                </button>
            </div>
            <div class="logo d-inline-block d-lg-none">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <?php if ('image' == $settings['logo_type']) : ?>
                        <img width="<?php echo esc_attr($settings['logo_dimension']['width']); ?>" height="<?php echo esc_attr($settings['logo_dimension']['height']); ?>" src="<?php echo esc_attr($settings['mobile_logo']['url']); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
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
                        'menu_class' => 'navbar-nav menu-open text-lg-start',
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
                <?php if (!empty($settings['button_label'])) : ?>
                    <a class="btn btn-black" href="<?php echo esc_url($settings['button_url']['url']); ?>"><?php echo esc_html($settings['button_label']); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
<?php endif; ?>