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
    
    $sql = "SELECT * FROM `manager` WHERE `email` = '$email'";
    $result = mysqli_query($connect,$sql);
    for($i=1; $i <= mysqli_num_rows($result);$i++){
        $text = mysqli_fetch_row($result);
        $M_Name = $text[1];
        $M_Email = $text[2];
        $M_Password = $text[3];
        $M_Birthday = $text[4];
        $M_Phone = $text[5];
        $M_ID_Number = $text[6];
        $M_Sex = $text[7];
        $M_Address = $text[8];
    }

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
        input[type="submit"] {
            margin-top: 50px;
            font-size: 30px;
            height: 150px;
            width: 500px;
        }
        
        #test{
            float: right;
            text-decoration:none;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../check_out.php" id="test" style="text-decoration:none;">&nbsp;登出</a>
        <a href="M01_manager_UI.php" id="test">回首頁</a>
        <?php
            echo "<a id=test>HI $M_Name</a>";
        ?>
        <image src="M01_manager_UI/title.png" alt=""><br>
        <image src="M01_manager_UI/M51.png" alt="">
    </nav>
    <main>
        <?php
            header("Content-Type: text/html; charset=utf8");
            include('../../connect.php');
            mysqli_query($connect,"SET NAMES 'UTF8'");
            $sql = "SELECT * FROM `requisition` WHERE `audit`=''";
            $result = mysqli_query($connect,$sql);
            
            for($i=1; $i <= mysqli_num_rows($result);$i++){
                $text = mysqli_fetch_row($result);
                $R_ID = $text[0];
                $U_ID = $text[1];
                $sql2 = "SELECT `name` FROM `user` WHERE `id`='$U_ID'";
                $result2 = mysqli_query($connect,$sql2);
                $text2 = mysqli_fetch_row($result2);
                $U_Name = $text2[0];
                echo "
                <form action='M52_check_adopt.php' method='POST'>
                    <input type='hidden' value='$U_ID' name='U_ID'>
                    <input type='submit' value='$R_ID' name='R_ID'>
                    <input type='hidden' value='$U_Name' name='U_Name'><br>
                </form>
                ";
            }
        ?>
    </main>
</body>

</html>