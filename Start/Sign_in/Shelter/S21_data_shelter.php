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
    
    $sql = "SELECT * FROM `shelter` WHERE `email` = '$email'";
    $result = mysqli_query($connect,$sql);
    for($i=1; $i <= mysqli_num_rows($result);$i++){
        $text = mysqli_fetch_row($result);
        $S_Name = $text[1];
        $S_Email = $text[2];
        $S_Password = $text[3];
        $S_Phone = $text[4];
        $S_Address = $text[5];
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
        
        table,
        th,
        td {
            margin-top: 50px;
            font-size: 30px;
            text-align: left;
            border: 2px solid black;
            border-collapse: collapse;
        }
        
        th {
            width: 200px;
            height: 50px;
            font-size: 30px;
            background-color: burlywood;
        }
        
        td {
            width: 500px;
            height: 50px;
            font-size: 30px;
        }
        
        input {
            width: 99.25%;
            height: 95%;
            margin-left: -2px;
            font-size: 30px;
        }
        
        input[type="submit"] {
            margin-top: 50px;
            font-size: 30px;
            width: 250px;
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
        <a href="S01_shelter_UI.php" id="test">回首頁</a>
        <?php
            echo "<a id=test>HI $S_Name</a>";
        ?>
        <image src="S01_shelter_UI/title.png" alt=""><br>
        <image src="S01_shelter_UI/S21.png" alt="">
    </nav>
    <main>
        <form action="update.php" method="POST">
        <?php echo "<input type='hidden' value='$email' name='email'>"; ?>
        <table align="center">
            <tr>
                <th>收容所名稱:</th>
                <?php echo "<td><input type='text' value='$S_Name' name=S_Name></td>"; ?>
            </tr>
            <tr>
                <th>收容所Email</th>
                <td style="background-color: lightyellow;">
                    <?php echo "$S_Email"; ?>
                </td>
            </tr>
            <tr>
                <th>收容所密碼:</th>
                <?php echo "<td><input type='text' value='$S_Password' name=S_Password></td>"; ?>
            </tr>
            <tr>
                <th>收容所電話:</th>
                <?php echo "<td><input type='text' value='$S_Phone' name=S_Phone></td>"; ?>
            </tr>
            <tr>
                <th>收容所住址:</th>
                <?php echo "<td><input type='text' value='$S_Address' name=S_Address></td>"; ?>
            </tr>
        </table>
        <input type="submit" value="送出修改">
        </form>
    </main>
</body>

</html>