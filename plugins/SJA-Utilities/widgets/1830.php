<?php

class sjawp_1830_widget extends WP_Widget {

    /** constructor -- name this the same as the class above */
    function sjawp_1830_widget() {
        parent::WP_Widget(false, '1830');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        echo $before_widget;
        echo "
            <div class='sja-ad'>
				<!-- BEGIN PARTNER PROGRAM - DO NOT CHANGE THE PARAMETERS OF THE HYPERLINK -->
				<a href='http://being.successfultogether.co.uk/click.asp?ref=606741&site=11787&type=b5&bnb=5' target='_blank'>
				<img src='http://become.successfultogether.co.uk/view.asp?ref=606741&site=11787&b=5' border='0' title='Club 18-30' alt='Club 18-30' width='300' height='250' /></a>
				<!-- END PARTNER PROGRAM -->
		    </div>";
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

add_action('widgets_init', create_function('', 'return register_widget("sjawp_1830_widget");'));

?>