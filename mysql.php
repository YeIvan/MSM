<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/3
 * Time: 15:12
 */
$con=mysqli_connect('localhost','user','88005239','msm');
mysqli_query($con,'set names utf8');
function sql_query($sql){
    global $con;
    $res=mysqli_query($con,$sql);
    if(!$res){
        echo mysqli_error($con);
        exit();
    }
    else return $res;

}