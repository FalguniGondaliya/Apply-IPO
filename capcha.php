<?php
  session_start();
  $rand_num = rand(11111,99999);
  $_SESSION['CODE']=$rand_num;
  $layer = imagecreatetruecolor(70, 30);
  $captcha_bg = imagecolorallocate($layer, 204, 128, 255);
  imagefill($layer, 0, 0, $captcha_bg);
  $captcha_text_color = imagecolorallocate($layer, 51, 0, 51);
  imagestring($layer, 5, 5, 5,$rand_num, $captcha_text_color);
  header('Content-type: image/jpeg');
  imagejpeg($layer);
?>