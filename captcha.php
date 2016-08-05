<?php session_start();
    $captcha_arr = array("0","1","2","3","4","5","6","7","8","9",
                         "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
                         "a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z");
    $captcha_index = array_rand($captcha_arr,6);
    $captcha = $captcha_arr[$captcha_index[0]].$captcha_arr[$captcha_index[1]].$captcha_arr[$captcha_index[2]].
               $captcha_arr[$captcha_index[3]].$captcha_arr[$captcha_index[4]].$captcha_arr[$captcha_index[5]];

    $_SESSION["captcha"] = $captcha;
    $image = imagecreatefromjpeg("public/home/img/captcha.jpg");
    $color = imagecolorallocate($image,0,60,0);
    imagestring($image, 70, 38, 6, $captcha, $color);
    header("Content-type:image/jpeg");
    imagejpeg($image);
?>
