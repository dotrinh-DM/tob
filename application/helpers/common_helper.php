<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getPhotoThumbSrc($image_path='', $width, $height) {
    $query = '';
    if ($width != '') {
        $query .= '&w='.$width;
    }
    if ($height != '' ) {
        $query .= '&h='.$height;
    }
    return base_url('timthumb.php').'?src='.$image_path.'&q=100'.$query;
}

function getUserAvatarSrc ($filename='') {
    if ($filename) {
        return getPhotoThumbSrc(base_url().'uploads/avatars/'.$filename, 110, 110);
    }
    return base_url().'uploads/avatars/default.png';
}