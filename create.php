<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/4
 * Time: 20:52
 */
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    echo '当前用户：'.$username;
     echo "<br/>><a href='index.php'>返回主页</a><br/>";
}
else{
    echo "<script>alert('请先登录');window.location.href='index.php';</script>";;
}
?>
<html>
<body>

<table align="center">
    <h2 align="center">新增联系人</h2>
    <form method="post" action="create_result.php">
    <tr>
        <th>name</th>
        <td>
            <input type="text" name="name">
        </td>
        <tr>
        <th>phone</th>
            <td>
                <input type="text" name="phone">
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="submit" value="新增信息">
            </td>
            <td>
                <input type="reset" value="清空">
            </td>
        </tr>
    </form>
</table>

</body>
</html>

