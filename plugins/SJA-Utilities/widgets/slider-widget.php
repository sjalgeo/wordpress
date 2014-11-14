<?php

class Slider_Widget extends WP_Widget {

    /** constructor -- name this the same as the class above */
    function slider_widget() {
        parent::WP_Widget(false, 'SJAWP Slider Widget');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        $wide_banner = new SJA_Banner_Wide('Kavos Paint Party','Very Colourful','Every Tuesday','Book Now','Seriously Book Now!');

        $output = $wide_banner->get_html();

        echo $before_widget . $output . $after_widget;

    } # end function

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
        return $instance;
    }

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

    }
} // end class bestsellers_widget

add_action('widgets_init', create_function('', 'return register_widget("slider_widget");'));

?>