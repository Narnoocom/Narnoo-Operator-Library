<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function time_dmy($var = '')
{
    $datetime = strtotime($var);
    $date = date("d-m-Y", $datetime);

    return $date;

}
function time_hm($var = '')
{
    $datetime = strtotime($var);
    $date = date("H:i", $datetime);

    return $date;

}
function time_words($var = '')
{
    $datetime = strtotime($var);
    $date = date("l, F d Y", $datetime);

    return $date;

}

function time_words_small($var = '')
{
    $datetime = strtotime($var);
    $date = date("F d Y", $datetime);

    return $date;

}

?>
