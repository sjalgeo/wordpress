<?php
/*
Plugin Name: Leeds Uni Polls Plugin
Plugin URI: na
Description: na
Version: 1.0.0
Author: Stephen J. Algeo
Author URI: http://www.stephenalgeo.com
License: GPLv2 or later
Text Domain: algeo
*/

add_action('template_redirect', 'algeo_one_match_redirect');

function algeo_one_match_redirect() {
    if (is_search()) {
        global $wp_query;

//        $wp_query->
        # If there is only a single search term,
        # and that matched one of the post ids
        # redirect to that post
        if (array_lookup($wp_query->query_vars, 'search_terms_count')==1){
            $term = array_lookup($wp_query->query_vars, 'search_terms')[0];

            foreach($wp_query->posts as $key => $post)
            {
                if ($post->post_name == $term) wp_redirect( get_permalink( $wp_query->posts[$key]->ID ) );
            }
        }
    }
}

if (!function_exists('array_lookup')){      // version of get_from_array we're pushing forward with :)
    function array_lookup( $array , $element, $returniffalse = false, $returniftrue = null){

        if ( !is_array($array) OR !isset( $array[$element] ) OR $array[$element] == "" ){
            return $returniffalse;          # Custom Item to Return if any of the tests fails
        }else{
            if ( $returniftrue == null ){
                return $array[$element];        # Return item from element in array
            } else {
                return $returniftrue;           # Custom Item to return instead of item if set
            }
        }
    }
}


function ajax_debug($item){

        echo '<div style="background:ghostwhite;z-index:99999;margin-left:20px;">';
        echo '<pre>debug:<br>';
        if (is_array($item)){

            print_r($item);

        } elseif (is_object($item)){

            var_dump($item);

        }elseif(is_numeric($item)){

            echo '[numeric: '.$item.']';

        }elseif($item === ''){
            echo '[is empty string]';
        }elseif(is_string($item)){

            echo '[string: '.$item.']';

        }elseif($item === true){

            echo '[item is true]';

        }elseif($item === false){

            echo '[item is false]';

        }else {

            echo '[unknown]';
            echo $item;
            print_r($item);
            var_dump($item);

        }
        echo '<br>------</pre></div>';
}