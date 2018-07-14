<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/3
 * Time: 20:05
 */
session_start();
if(isset($_SESSION)){
    $username=$_SESSION['username'];
    unset($_SESSION['username']);
    session_destroy();
    echo "<script>alert('注销成功!');window.open('index.php');</script>";
}
else{
    echo "<script>alert('你还未登录!');window.open('index.php');</script>";
}