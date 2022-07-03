<?php

function set_active($url, $output = 'active')
{
    if( is_array($url) ) {
        foreach ($url as $r) {
            if (Route::is($r)) {
                return $output;
            }
        }
    } else {
        if (Route::is($url)) {
            return $output;
        }
    }
}



?>