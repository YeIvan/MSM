<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/3
 * Time: 15:52
 */
if(isset($_POST['submit'])&&$_POST['submit']=='注册'){
    $username=$_POST['username'];
    $password=$_POST['password'];
    include_once 'mysql.php';
    mysqli_select_db($con,'msm');
    $sql="select username,password from USER WHERE username='$username'";
    $res=sql_query($sql);
    $num=mysqli_num_rows($res);
    if($num){
        echo "<script>alert('用户名已存在'); history.go(-1);</script>";
    }
    else{
        $sql_insert="insert into user VALUES ('$username','$password')";
        $res_insert=sql_query($sql_insert);
        if($res_insert){
            echo "<script>alert('注册成功!返回登录页面');window.open('login.php');</script>";
        }
        else
        {
            echo "<script>alert('系统繁忙，请稍候！'); history.go(-1);</script>";
        }
    }
}
else
{
    echo "<script>alert('未提交成功！'); history.go(-1);</script>";
}