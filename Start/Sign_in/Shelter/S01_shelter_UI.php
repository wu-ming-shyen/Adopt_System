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
    
    $sql = "SELECT * FROM shelter WHERE email = '$email'";
    $result = mysqli_query($connect,$sql);
    $text = mysqli_fetch_row($result);
    $S_Name = $text[1];
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
            echo "<a id=test>HI $S_Name</a>";
        ?>
        <img class="title" src="S01_shelter_UI/title.png" alt="">
    </nav>
    <main>
        <br>
        <button type="button" onclick="location.href='S11_data_animal.php'"><img src="S01_shelter_UI/S11.png"></button><br>
        <button type="button" onclick="location.href='S21_data_shelter.php'"><img src="S01_shelter_UI/S21.png"></button>
    </main>
</body>

</html>