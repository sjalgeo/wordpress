<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Stephen
 * Date: 21/07/13
 * Time: 22:39
 * To change this template use File | Settings | File Templates.
 */

function precho( $item ){
    echo "<pre>";
    if (is_array($item)){
        print_r($item);
    } elseif ( is_object($item)){
        var_dump($item);
    } else {
        echo $item;
    }
    echo "</pre>";
}