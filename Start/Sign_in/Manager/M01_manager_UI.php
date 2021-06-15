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
    
    $sql = "SELECT * FROM manager WHERE email = '$email'";
    $result = mysqli_query($connect,$sql);
    $text = mysqli_fetch_row($result);
    $M_Name = $text[1];
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
        #in {
            width: 100px;
            height: 50px;
            float: right;
            margin: 50px;
            font-size: 25px;
        }
        
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
            border: 3px black solid;
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
            echo "<a id=test>HI $M_Name</a>";
        ?>
        <img class="title" src="M01_manager_UI/title.png" alt="">
    </nav>
    <main>
        <br>
        <button type="button" onclick="location.href='M11_data_manager.php'"><img src="M01_manager_UI/M11.png"></button>
        <button type="button" onclick="location.href='M21_data_animal.php?shelter=請選擇'"><img src="M01_manager_UI/M21.png"></button>
        <br>
        <button type="button" onclick="location.href='M31_data_user.php'"><img src="M01_manager_UI/M31.png"></button>
        <button type="button" onclick="location.href='M41_data_shelter.php'"><img src="M01_manager_UI/M41.png"></button>
        <br>
        <button type="button" onclick="location.href='M51_list_adopt.php'"><img src="M01_manager_UI/M51.png"></button>
    </main>
</body>

</html>