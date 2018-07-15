<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/10
 * Time: 10:18
 */
//设置画布
//session_start();
//header('Content-Type:image/png');
//$im=imagecreatetruecolor(190,50);
//$bg_color=imagecolorallocate($im,200,200,200);
//imagefill($im,0,0,$bg_color);
//$font_color1=imagecolorallocate($im,mt_rand(0,50),mt_rand(0,50),mt_rand(0,50));
//$font_color2=imagecolorallocate($im,mt_rand(0,50),mt_rand(0,50),mt_rand(0,50));
//
//$str='qwertyuiopasdfghjkl123456789';
//$len=strlen($str);
//$char1=substr($str,mt_rand(0,$len-1),1);
//$char2=substr($str,mt_rand(0,$len-1),1);
//$char3=substr($str,mt_rand(0,$len-1),1);
//$char4=substr($str,mt_rand(0,$len-1),1);
//
//$captcha=$char1.$char2.$char3.$char4;
//$_SESSION['captcha']=$captcha;
//
//$font='alph.ttf';
//imagettftext($im,30,15,20,30,$font_color1,$font,$char1);
//imagettftext($im,30,-15,70,30  ,$font_color2,$font,$char2);
//imagettftext($im,30,15,130,30  ,$font_color1,$font,$char3);
//imagettftext($im,30,-15,160,30  ,$font_color2,$font,$char4);
////设置干扰点
//for($i=0;$i<30;$i++){
//    $dot_color=imagecolorallocate($im,mt_rand(150,200),mt_rand(150,200),mt_rand(150,200));
//    imagestring($im,mt_rand(1,5),mt_rand(0,200),mt_rand(0,50),'*',$dot_color);
//}
//$line_color=imagecolorallocate($im,mt_rand(100,150),mt_rand(0,150),mt_rand(0,150));
//imageline($im,mt_rand(0,200),mt_rand(0,50),mt_rand(0,200),mt_rand(0,50),$line_color);
//imagepng($im);
//imagedestroy($im);
/**
 * 字母+数字的验证码生成
 */
// 开启session
session_start();
//1.创建黑色画布
$image = imagecreatetruecolor(100, 30);

//2.为画布定义(背景)颜色
$bgcolor = imagecolorallocate($image, 255, 255, 255);

//3.填充颜色
imagefill($image, 0, 0, $bgcolor);

// 4.设置验证码内容

//4.1 定义验证码的内容
$content = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

//4.1 创建一个变量存储产生的验证码数据，便于用户提交核对
$captcha = "";
for ($i = 0; $i < 4; $i++) {
    // 字体大小
    $fontsize = 10;
    // 字体颜色
    $fontcolor = imagecolorallocate($image, mt_rand(0, 120), mt_rand(0, 120), mt_rand(0, 120));
    // 设置字体内容
    $fontcontent = substr($content, mt_rand(0, strlen($content)), 1);
    $captcha .= $fontcontent;
    // 显示的坐标
    $x = ($i * 100 / 4) + mt_rand(5, 10);
    $y = mt_rand(5, 10);
    // 填充内容到画布中
    imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
}
$_SESSION["captcha"] = $captcha;

//4.3 设置背景干扰元素
for ($$i = 0; $i < 200; $i++) {
    $pointcolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imagesetpixel($image, mt_rand(1, 99), mt_rand(1, 29), $pointcolor);
}

//4.4 设置干扰线
for ($i = 0; $i < 3; $i++) {
    $linecolor = imagecolorallocate($image, mt_rand(50, 200), mt_rand(50, 200), mt_rand(50, 200));
    imageline($image, mt_rand(1, 99), mt_rand(1, 29), mt_rand(1, 99), mt_rand(1, 29), $linecolor);
}

//5.向浏览器输出图片头信息
header('content-type:image/png');

//6.输出图片到浏览器
imagepng($image);

//7.销毁图片
imagedestroy($image);