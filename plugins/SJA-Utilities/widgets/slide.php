<?php

class slide_widget extends WP_Widget {

    /** constructor -- name this the same as the class above */
    function slide_widget() {
        parent::WP_Widget(false, 'fhesshtSJA Slide Widget');
    }

    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {
        extract( $args );

        echo $before_widget;
?>

		<div id="slider">
<div class="flexslider">
	<ul class="slides">
	    <?php 	//$count = of_get_option('w2f_slide_number');
				$count = 2;
				$slidecat = 'Uncategorized'; // of_get_option('w2f_slide_categories');
				$query = new WP_Query( array( 'cat' =>$slidecat,'posts_per_page' =>$count ) );
	           	if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();	?>
	 	
		 		<li>
		 			
				<?php
					$thumb = get_post_thumbnail_id();
					$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
					$image = aq_resize( $img_url, 600, 400, true ); //resize & crop the image
				?>
				
				<?php if($image) : ?>
					<a href="<?php the_permalink(); ?>"><img class="slide-image" src="<?php echo $image ?>"/></a>
				<?php endif; ?>
		 			
		 			
				<div class="flex-caption">
				<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				</div>
				
		<?php endwhile; endif; ?>

    		
	  </li>
	</ul>
</div>	
</div>	
		
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

add_action('widgets_init', create_function('', 'return register_widget("slide_widget");'));

?>