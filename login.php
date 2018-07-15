<?php
session_start();
if(isset($_SESSION['username'])){
    echo "<script>alert('您已登录');window.open('index.php');</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="jquery-3.3.1.slim.min.js"></script>

    <style type="text/css">
        *{
            margin: 0px;
            padding: 0px;
        }
        body{
            margin: 0 auto;
            width: 300px;
            background-image: url(images/back.jpg);
            background-repeat: no-repeat;
            background-attachment:fixed;
            background-position: 50% 0;
        }
        button{
            background-color: 	#FFD700;
            border: none;
            color: 		#FAFAD2;
            text-align: center;
            height: 50px;
            width: 150px;
            font-size: 15px;
            border-radius: 10px;
            margin-top: 15px;
            margin-left: 20px;
        }
        button:hover{
            box-shadow: 1px 2px 6px #D3D3D3;
        }
        .bor{
            position: relative;
            width: 150px;
        }
        #uicon{
            position: absolute;
            left: 0;
            z-index: 5;
            background-image: url(images/user.png);
            background-repeat: no-repeat;
            background-position: 2px 2px;
            width: 32px;
            height: 32px;
        }
        #input1{
            outline: none;
            padding-left: 36px;
            border: 1px;
            width: 150px;
            height: 38px;
            background:rgba(105,105,105,0.8);
            color: #fff;

        }
        #picon{
            position: absolute;
            left: 0;
            z-index: 5;
            background-image: url(images/pass.png);
            background-repeat: no-repeat;
            background-position: 2px 8px;
            width: 32px;
            height: 32px;
        }
        #input2{
            outline: none;
            margin-top: 5px;
            padding-left: 36px;
            border: 1px;
            width: 150px;
            height: 38px;
            background:rgba(105,105,105,0.8);
            color: #fff;

        }
        form{
            margin-top: 230px;
            margin-left: 70px;
        }
        #signup{
            margin-top: 100px;
        }
        #signup p{
            margin-top: 15px;
            text-align: center;

        }
        #signup a{
            text-decoration: none;
            color: 	#F5F5F5;
            font-size: 20px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $("#change").click(function(){

                $("#btn1").text('Sign up');
                $("#change").text('Sign in');

                $("#change").click(function(){
                    window.location.href = "Login.html";
                });

            });

        });

    </script>
</head>
<body>
<form action="logcheck.php" method="post" accept-charset="utf-8">
    <div>
        <div class="bor">
            <i id="uicon"></i>
            <input type="text" id="input1" name="username">
        </div>
        <div class="bor">
            <i id="picon"></i>
            <input type="password" id="input2"  name="password">
        </div>
        <div class="bor">
            <input name="captcha" type="text" placeholder="请输入图片中的验证码"><br/>
            <img src="captcha.php" onclick="this.src='captcha.php?captcha='+Math.random()"/><br/>
        </div>
        <button type="submit" id="btn1" name="submit" value="登录">登录</button>
    </div>

</form>
<div id="signup">
    <hr>
    <p id="pid"><a href="register.html" id="change">New here? Sign up</a></p>

</div>
</body>
</html>