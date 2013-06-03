<?php

/*
 * String's size check. { Eddited 22/04/2012, 20:05}
 * If the size oh the string is bigger than the maximum wanted size, 'false' is return.
 * Else the return value is 'true'.
 * @param string. The string, which size should be checked. 
 * @param max_size. The maximum size, which string should have.
 * @return False if string's size is bigger than limit. Otherwise true. 
 */

function string_size_check( $string, $max_size ) {
    if( strlen( $string ) > $max_size ) {
        return false;
    }
    return true;
}

?>