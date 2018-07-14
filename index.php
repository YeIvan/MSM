<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/3
 * Time: 15:06
 */
session_start();
if(isset($_SESSION['username'])){
    include_once 'mysql.php';
    echo 'welcome:'.$_SESSION['username'];
    $username=$_SESSION['username'];
    $sql="select * from list WHERE username='$username'";
    $res = sql_query($sql);
    if(mysqli_num_rows($res)) {
        $arr = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;
        }
        echo "<table border='1' align='center'>";
        echo "<tr><th>id</th><th>name</th><th>phone</th>";
        foreach ($arr as $value) {
            echo "<tr>";
            echo "<td>" . $value['id'] . "</td>";
            echo "<td>" . $value['name'] . "</td>";
            echo "<td>" . $value['phone'] . "</td>";
            echo "<td><a href='alter.php?id={$value['id']}'>修改</a></td>";
            echo "<td><a onclick='return confirm('确定要删除吗？？？')' href='delete.php?id={$value['id']}'>删除</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else{
        echo "<br/>联系人记录为空";
    }
echo "<br/><a href='create.php'>新增联系人</a>";
echo "<br/><a href='logout.php'>点此注销账户</a>";
}
else{
    echo '未登录状态';
    echo "<br/><a href='login.php'>点此登录</a>";
}
?>

