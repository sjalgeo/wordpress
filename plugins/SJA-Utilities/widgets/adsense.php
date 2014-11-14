<?php

class sjawp_adsense extends WP_Widget {

    /** constructor -- name this the same as the class above */
    function sjawp_1830_widget() {
        parent::WP_Widget(false, 'sjawp_1830_widget');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        echo $before_widget;
        echo '<h3 class="widget-title">Sponsors</h3>';
        echo '

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- scrape -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:600px"
     data-ad-client="ca-pub-9340225966707192"
     data-ad-slot="3437483467"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

        ';
        echo $after_widget;
    } # end function

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
//        $instance['cust_title'] = strip_tags($new_instance['cust_title']);

        return $instance;
    }

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

    }
} // end class bestsellers_widget

//add_action('widgets_init', create_function('', 'return register_widget("sjawp_adsense");'));

?>