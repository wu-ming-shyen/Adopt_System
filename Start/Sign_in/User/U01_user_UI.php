<?php
    header("Content-Type: text/html; charset=utf8");
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $email = parseurl($_COOKIE['user']);

    function parseurl($url=""){
        $url = rawurlencode(mb_convert_encoding($url, 'gb2312', 'utf-8'));
        $a = array("%3A", "%2F", "%40");
        $b = array(":", "/", "@");
        $url = str_replace($a, $b, $url);
        return $url;
    }
    
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($connect,$sql);
    $text = mysqli_fetch_row($result);
    $U_Name = $text[1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        if($email == ""){
            echo "<meta http-equiv='refresh' content='0; url=../check_in.php'>";
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>貓狗領養系統</title>
    <style>
        body {
            background-color: papayawhip;
        }
        
        nav {
            text-align: center;
        }
        
        main {
            text-align: center;
        }
        
        button {
            border: 0px;
            opacity: 0.8;
            margin: 30px;
            background-color: papayawhip;
        }
        
        button:hover {
            border: 2px black solid;
            opacity: 1.0;
        }

        #test{
            float: right;
            text-decoration:none;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../check_out.php" id="test">&nbsp;登出</a>
        <a href="../../index.html" id="test">回首頁</a>
        
        <?php
            echo "<a id=test>HI $U_Name</a>";
        ?>
        <img class="title" src="U01_user_UI/title.png" alt="">
    </nav>
    <main>
        <br>
        <button type="button" onclick="location.href='U11_search_animal.php?animal=請選擇&shelter=請選擇'"><img src="U01_user_UI/U11.png"></button>
        <br>
        <button type="button" onclick="location.href='U21_data_user.php'"><img src="U01_user_UI/U21.png"></button>
        <br>
        <button type="button" onclick="location.href='U31_favorite_user.php'"><img src="U01_user_UI/U31.png"></button>
    </main>
</body>

</html>