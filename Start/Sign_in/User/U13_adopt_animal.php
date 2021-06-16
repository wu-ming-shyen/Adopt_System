<?php
    header("Content-Type: text/html; charset=utf8");
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $email = parseurl($_COOKIE['user']);
    $A_ID =  $_POST['a_id'];
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
        $U_ID = $text[0];
        $U_Name = $text[1];
    }
    $U_Area = "";
    $U_Have = "";
    $U_Salary = "";
    $U_Address = "";
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
        <a href="U01_user_UI.html" id="test">回首頁</a>
        <?php
            echo "<a id=test>HI $U_Name</a>";
        ?>
        <image class="title" src="U01_user_UI/title.png" alt=""><br>
        <img src="U13_adopt_animal/U13.png" alt="">
    </nav>
    <main>
        <form action="Resquisition_Insert.php" method="POST">
        <?php echo "<input type='hidden' value='$U_ID' name='U_ID'>"; ?>
        <?php echo "<input type='hidden' value='$A_ID' name='A_ID'>"; ?>
        <table align="center">
            <tr>
                <th>坪數</th>
                <?php echo "<td><input type='text' value='$U_Area' name=U_Area></td>"; ?>
            </tr>
            <tr>
                <th>現有動物隻數</th>
                <?php echo "<td><input type='text' value='$U_Have' name=U_Have></td>"; ?>
            </tr>
            <tr>
                <th>薪水(月薪)</th>
                <?php echo "<td><input type='text' value='$U_Salary' name=U_Salary></td>"; ?>
            </tr>
            <tr>
                <th>通訊地址</th>
                <?php echo "<td><input type='text' value='$U_Address' name=U_Address></td>"; ?>
            </tr>
        </table>
        <input type="submit" value="送出申請">
        </form>
    </main>
</body>

</html>