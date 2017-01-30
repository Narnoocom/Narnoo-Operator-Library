<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('cdn_url'))
{
    function cdn_url($var = '')
    {
            $cdn_url = "http://localhost:8888/operatorlibrary/"; // base url for content distribution network.
            return $cdn_url.$var;

    }

}



?>
