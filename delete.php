<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/4
 * Time: 20:50
 */
session_start();
if(isset($_SESSION['username'])) {
    include_once 'mysql.php';
    $id = $_GET['id'];
    $sql="select * from list where id=$id";
    $res=sql_query($sql);
    if(mysqli_num_rows($res)) {
        $sql = "delete from list where id=$id";
        sql_query($sql);
        echo "<script>alert('删除成功');window.location.href='index.php';</script>";
    }
    else{
        echo "<script>alert('该条记录不存在');window.location.href='index.php';</script>";
    }

}