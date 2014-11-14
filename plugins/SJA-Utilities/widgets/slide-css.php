<?php

class slide_css_widget extends WP_Widget {

    /** constructor -- name this the same as the class above */
    function slide_css_widget() {
        parent::WP_Widget(false, 'SJA CSS Slide Widget');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        echo $before_widget;
		?>
	<div class="sja-slider">
		<ul id="sjaslidebody">
			<input type="radio" name="radio-btn" id="img-1" checked />
			<li id="img-container">
				<div id="img-inner">
					<img src="http://farm9.staticflickr.com/8072/8346734966_f9cd7d0941_z.jpg">
				</div>
				<label for="img-6" class="sb-bignav" title="Previous">&#x2039;</label>
				<label for="img-2" class="sb-bignav" title="Next">&#x203a;</label>
			</li>

			<input type="radio" name="radio-btn" id="img-2" />
			<li id="img-container">
				<div id="img-inner">
					<img src="http://farm9.staticflickr.com/8504/8365873811_d32571df3d_z.jpg">
				</div>
				<label for="img-1" class="sb-bignav" title="Previous">&#x2039;</label>
				<label for="img-3" class="sb-bignav" title="Next">&#x203a;</label>
			</li>

			<input type="radio" name="radio-btn" id="img-3" />
			<li id="img-container">
				<div id="img-inner">
					<img src="http://farm9.staticflickr.com/8068/8250438572_d1a5917072_z.jpg">
				</div>
				<label for="img-2" class="sb-bignav" title="Previous">&#x2039;</label>
				<label for="img-4" class="sb-bignav" title="Next">&#x203a;</label>
			</li>

			<input type="radio" name="radio-btn" id="img-4" />
			<li id="img-container">
				<div id="img-inner">
					<img src="http://farm9.staticflickr.com/8061/8237246833_54d8fa37f0_z.jpg">
				</div>
				<label for="img-3" class="sb-bignav" title="Previous">&#x2039;</label>
				<label for="img-5" class="sb-bignav" title="Next">&#x203a;</label>
			</li>

			<input type="radio" name="radio-btn" id="img-5" />
			<li id="img-container">
				<div id="img-inner">
					<img src="http://farm9.staticflickr.com/8055/8098750623_66292a35c0_z.jpg">
				</div>
				<label for="img-4" class="sb-bignav" title="Previous">&#x2039;</label>
				<label for="img-6" class="sb-bignav" title="Next">&#x203a;</label>
			</li>

			<input type="radio" name="radio-btn" id="img-6" />
			<li id="img-container">
				<div id="img-inner">
					<img src="http://farm9.staticflickr.com/8195/8098750703_797e102da2_z.jpg">
				</div>
				<label for="img-5" class="sb-bignav" title="Previous">&#x2039;</label>
				<label for="img-1" class="sb-bignav" title="Next">&#x203a;</label>
			</li>
		</ul>	
	</div>
	
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
		
		<?php

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

add_action('widgets_init', create_function('', 'return register_widget("slide_css_widget");'));

?>