<?php
/**
 * Created by PhpStorm.
 * User: Ye
 * Date: 2018/7/4
 * Time: 20:50
 */
session_start();
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    echo '当前用户：'.$username;
    echo "<br/>><a href='index.php'>返回主页</a><br/>";
    $id=$_GET['id'];
    include_once 'mysql.php';
    $sql="select * from list where id='$id'";
    $res=sql_query($sql);
    if(mysqli_num_rows($res)){
        $arr = array();
        while ($row = mysqli_fetch_assoc($res)) {
            $arr[] = $row;

        }
    }
    else{
        echo "<script>alert('该信息不存在');window.location.href='index.php';</script>";
    }

}
else{
    echo "<script>alert('请先登录');window.location.href='login.php';</script>";
}
?>
<html>
<body>
    <h3 align="center">修改信息</h3>
     <form style="text-align: center" method="post" action="alter_result.php">

         <input type="hidden" name="id" value="<?php echo $id ?>">

         Name<input type="text" name="name" value="<?php echo $arr[0]['name']?>"><br/>

         Phone<input type="text" name="phone"value="<?php echo $arr[0]['phone']?>"><br/>

         <input type="submit" name="submit" value="提交修改"><input type="reset" value="清空信息">
 </form>
</body>

</html>
