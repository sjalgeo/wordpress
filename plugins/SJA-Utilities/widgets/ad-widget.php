<?php

class sjawp_ad_widget extends WP_Widget {

    /** constructor -- name this the same as the class above */
    function sjawp_ad_widget() {
        parent::WP_Widget(false, 'SJA: Ad Randomiser');

        $this->default_ad_fields = array(   0 =>'ad',1 =>'ad',2=>'ad',3=>'ad',4=>'ad');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        precho( $instance );

        echo $before_widget . 'Ad Widget' . $after_widget;
    } # end function

    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
//        $instance['cust_title'] = strip_tags($new_instance['cust_title']);
        $instance['ads'] = sja_get_from_array($new_instance, 'ads', $this->default_ad_fields);
        return $instance;
    }

    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {

    $array_of_adverts = sja_get_from_array($instance,'ads',$this->default_ad_fields);
    if($array_of_adverts != false){
        $the_form = '';
        foreach( $array_of_adverts as $key => $advert ){
            $the_form .=
                '<p>
                    <label for="'.$this->get_field_id('ad_item_1').'">Ad Item:</label>
                    <input class="widefat" id="'. $this->get_field_id('ad_item_'.$key).'" name="'. $this->get_field_id('ad_item_'.$key).'" type="text" value="'. $advert .'" />
                </p>';
        }
        echo $the_form;
    }

    }
} // end class bestsellers_widget

add_action('widgets_init', create_function('', 'return register_widget("sjawp_ad_widget");'));

























?>