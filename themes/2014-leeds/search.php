<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <section id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <?php

            global $wp_query;

            $matched = $wp_query->query_vars['s']==$wp_query->posts[0]->post_title;

            if (sizeof($wp_query->posts)==1 AND $matched){
                $wp_query->posts = array();
            }
            else{
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );
            }

            ?>

        </div><!-- #content -->
    </section><!-- #primary -->

<?php
get_sidebar( 'content' );
get_sidebar();
get_footer();
