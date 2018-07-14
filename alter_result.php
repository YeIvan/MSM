<?php
/**
 * Created by PhpStorm.
 * User: My
 * Date: 2018/7/6
 * Time: 16:19
 */
if(isset($_POST['submit'])&&$_POST['submit']=="提交修改") {
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $id=$_POST['id'];
    session_start();
    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        include_once 'mysql.php';
        $sql="update list set name='$name',phone='$phone' where id='$id'";
        sql_query($sql);
        echo "<script>alert('修改成功！');window.location.href='index.php';</script>";

    } else {
        echo "<script>alert('请先登录');window.location.href='login.php';</script>";
    }
}
else{
      echo "<script>alert('提交失败');window.location.href='index.php';</script>";
}