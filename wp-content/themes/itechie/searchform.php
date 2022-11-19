<?php
/*
* @packge itechie
* @since 1.0.0
*/
?>
<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <div class="widget-search">
        <div class="single-search-inner">
            <input type="text" placeholder="<?php echo esc_attr__('Search here', 'itechie'); ?>" name="s" value="<?php get_search_query() ?>">
            <button><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>