<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/10
 * Time: 10:18
 */
//设置画布
session_start();
header('Content-Type:image/png');
$im=imagecreatetruecolor(190,50);
$bg_color=imagecolorallocate($im,200,200,200);
imagefill($im,0,0,$bg_color);
$font_color1=imagecolorallocate($im,mt_rand(0,50),mt_rand(0,50),mt_rand(0,50));
$font_color2=imagecolorallocate($im,mt_rand(0,50),mt_rand(0,50),mt_rand(0,50));

$str='qwertyuiopasdfghjkl123456789';
$len=strlen($str);
$char1=substr($str,mt_rand(0,$len-1),1);
$char2=substr($str,mt_rand(0,$len-1),1);
$char3=substr($str,mt_rand(0,$len-1),1);
$char4=substr($str,mt_rand(0,$len-1),1);

$captcha=$char1.$char2.$char3.$char4;
$_SESSION['captcha']=$captcha;

$font='alph.ttf';
imagettftext($im,30,15,20,30,$font_color1,$font,$char1);
imagettftext($im,30,-15,70,30  ,$font_color2,$font,$char2);
imagettftext($im,30,15,130,30  ,$font_color1,$font,$char3);
imagettftext($im,30,-15,160,30  ,$font_color2,$font,$char4);
//设置干扰点
for($i=0;$i<30;$i++){
    $dot_color=imagecolorallocate($im,mt_rand(150,200),mt_rand(150,200),mt_rand(150,200));
    imagestring($im,mt_rand(1,5),mt_rand(0,200),mt_rand(0,50),'*',$dot_color);
}
$line_color=imagecolorallocate($im,mt_rand(100,150),mt_rand(0,150),mt_rand(0,150));
imageline($im,mt_rand(0,200),mt_rand(0,50),mt_rand(0,200),mt_rand(0,50),$line_color);
imagepng($im);
imagedestroy($im);