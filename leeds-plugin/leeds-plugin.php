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

//        # If only a single result redirect to that post.
//        if ($wp_query->post_count == 1) {
//            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );
//        }

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