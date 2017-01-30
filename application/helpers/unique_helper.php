<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


function titleFormater($input){

    return $input;
}

function urlFormater($input){

    return $input;
}


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}


function generate_serial() {
    static $max = 60466175;
    return strtoupper(sprintf(
        "%05s-%05s-%05s-%05s-%05s",
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36),
        base_convert(mt_rand(0, $max), 10, 36)
    ));
}


?>
