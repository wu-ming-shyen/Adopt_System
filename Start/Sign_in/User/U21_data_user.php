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
    
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = mysqli_query($connect,$sql);
    for($i=1; $i <= mysqli_num_rows($result);$i++){
        $text = mysqli_fetch_row($result);
        $U_Name = $text[1];
        $U_Email = $text[2];
        $U_Password = $text[3];
        $U_Sex = $text[4];
        $U_ID_Number = $text[5];
        $U_Phone = $text[6];
        $U_Address = $text[7];
        $U_Birthday = $text[8];
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
        <a href="U01_user_UI.php" id="test">回首頁</a>
        <?php
            echo "<a id=test>HI $U_Name</a>";
        ?>
        <image class="title" src="U01_user_UI/title.png" alt=""><br>
        <image src="U01_user_UI/U21.png" alt=""></image>
    </nav>
    <main>
        <form action="User_Update.php" method="POST">
        <?php echo "<input type='hidden' value='$email' name='email'>"; ?>
        <table align="center">
            <tr>
                <th>會員名稱</th>
                <?php echo "<td><input type='text' value='$U_Name' name=U_Name></td>"; ?>
            </tr>
            <tr>
                <th>電子郵件</th>
                <td style="background-color: lightyellow;">
                    <?php echo "$U_Email"; ?>
                </td>
            </tr>
            <tr>
                <th>密碼</th>
                <?php echo "<td><input type='text' value='$U_Password' name=U_Password></td>"; ?>
            </tr>
            <tr>
                <th>生日</th>
                <?php echo "<td><input type='date' value='$U_Birthday' name=U_Birthday></td>"; ?>
            </tr>
            <tr>
                <th>電話</th>
                <?php echo "<td><input type='text' value='$U_Phone' name=U_Phone></td>"; ?>
            </tr>
            <tr>
                <th>性別</th>
                <?php echo "<td><input type='text' value='$U_Sex' name=U_Sex></td>"; ?>
            </tr>
            <tr>
                <th>戶籍</th>
                <?php echo "<td><input type='text' value='$U_Address' name=U_Address></td>"; ?>
            </tr>
            <tr>
                <th>身份證字號</th>
                <td style="background-color: lightyellow;">
                    <?php echo "$U_ID_Number"; ?>
                </td>
            </tr>
        </table>
        <input type="submit" value="送出修改">
        </form>
    </main>
</body>

</html>