<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
 * ham in mang
 */

function get_array($array_name = '')
{
    echo "<pre>";
    print_r($array_name);
    echo "</pre>";
}

/*
 * hàm encode string
 */

function encodeStr($str = '')
{
    return htmlspecialchars(addslashes(trim($str)));
}

/*
 * hàm decode string
 */

function decodeStr($str = '')
{
    return htmlspecialchars_decode(stripslashes($str));
}
?>
