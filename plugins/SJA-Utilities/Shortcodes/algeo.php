<?php

function algeo($atts){

    extract( shortcode_atts( array(
        'asin' => null,
        'product_id' => null,
        'size' => 150,
//        'description' => true,
        'align' => 'left'
    ), $atts ));

	return "Algeo!!!";
}

add_shortcode('algeo', 'algeo');

?>