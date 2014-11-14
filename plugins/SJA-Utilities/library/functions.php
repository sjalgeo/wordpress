<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stephen
 * Date: 21/07/13
 * Time: 22:36
 * To change this template use File | Settings | File Templates.
 */

function sja_get_from_array( $array , $element, $returniffalse = false){

    if ( !is_array($array) OR !isset( $array[$element] ) OR $array[$element] == "" ){
        return $returniffalse;
    }else{
        return $array[$element];
    }
}

function sja_get_post_image($postID){
    if (has_post_thumbnail( $postID )) {
        $output = wp_get_attachment_image_src( get_post_thumbnail_id( $postID ), 'single-post-thumbnail' ) ;

        return ( sja_get_from_array($output, '0', false));
    }
}
function get_random_from_array(){

}





function precho( $item , $title = 'precho', $before = '****** precho ******<br><br>', $after = '<br><br>********************<br><br>'){
    $max_width=25;
    $title = ' ' . $title.' ';
    $title_length = strlen($title);
    $stars = round( ($max_width - $title_length)/2 );

    for ($i=1; $i<= $stars; $i++ ){
        $title = '*' . $title . '*';
    }

    $footer = '<br><br>';
    $stars_btm = $title_length + ( $stars * 2 );
    for ($i=1; $i<= $stars_btm; $i++ ){
        $footer .= '*';
    }

    echo "<pre>";

    echo $title.'<br><br>';

    if ( is_null( $item ) ){
        echo $item;
        echo '[SJA: item is null]';
    }
    elseif( is_bool($item) ){
        if ($item == true){
            echo $item.'<br><br>';
            echo "[SJA: true]";
        } else {
            echo $item;
            echo "[SJA: false]";
        }
    }
    elseif(is_numeric($item)){
        echo $item . '<br><br>' . '[SJA: is numeric]';
    }
    elseif (is_array($item)){
        print_r($item);
    } elseif ( is_object($item)){
        echo '[SJA: object]<br><br>';
        var_dump($item);
    } elseif( $item == '' ){
        echo '[SJA: is  empty string]';
    }else{
        echo $item;
    }
    echo $footer."</pre>";
}


function my_the_content_filter($content) {






    if ($GLOBALS['post']->post_name=='home'){
$ad = '
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- ldboard -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-9340225966707192"
     data-ad-slot="5333019062"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
';
    }
    else if ($GLOBALS['post']->post_name=='cart'){
        return $content;
    }
    else {
        $ad = '

<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 468x60 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-9340225966707192"
     data-ad-slot="7867683061"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>

';
    }

    $ad = '<div style="display:block;clear:both;margin:0 auto;"><p style="text-align:center;">'.$ad.'</p> </div>';

    return $ad.$content.$ad;
}

add_filter( 'the_content', 'my_the_content_filter' );