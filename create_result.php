<?php
/**
 * Created by PhpStorm.
 * User: My
 * Date: 2018/7/5
 * Time: 17:19
 */
session_start();
if(isset($_SESSION['username'])) {
    $username=$_SESSION['username'];
    echo '当前登录用户：'.$username.'<br/>';
    if (isset($_POST['submit']) && $_POST['submit'] == '新增信息') {
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        include_once 'mysql.php';
        $sql="select phone,username from list where phone='$phone' and name='$name'";
        $res=sql_query($sql);
        if(!mysqli_num_rows($res)){
            $sql="insert into list(name,phone,username) values ('$name','$phone','$username')";
            sql_query($sql);
            echo "<script>alert('新增成功');window.open('index.php');</script>";
        }
        else{
            echo "<script>alert('该号码已存在，请重试！'); history.go(-1);</script>";
        }

    }
    else{
        echo "<script>alert('新增失败，请重试！'); history.go(-1);</script>";
    }
}