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
        
        #search {
            width: 400px;
        }
        
        input[type="submit"] {
            margin-top: 50px;
            font-size: 30px;
            width: 200px;
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
        <image src="M01_manager_UI/M31.png" alt="">
    </nav>
    <main>
        <form action="User_Search.php" method="POST">
            <input type="text" name="email" style="width: 400px;">
            <input type="submit" value="查詢" style="margin-left: 30px;">
        </form>

        <?php
            if(isset($_POST['U_Email'])){
                $U_Name = $_POST['U_Name'];
                $U_Email = $_POST['U_Email'];
                $U_Password = $_POST['U_Password'];
            }
            else{
                $U_Name = "";
                $U_Email = "";
                $U_Password = "";
            }
        ?>

        <form action="User_Update.php" method="POST">
        <?php echo "<input type='hidden' value='$U_Email' name='U_Email'>"; ?>
        <table align="center">
            <tr>
                <th>會員名稱</th>
                <?php echo "<td><input type='text' value='$U_Name' name=U_Name></td>"; ?>
            </tr>
            <tr>
                <th>會員帳號</th>
                <td style="background-color: lightyellow;">
                    <?php echo "$U_Email"; ?>
                </td>
            </tr>
            <tr>
                <th>會員密碼</th>
                <?php echo "<td><input type='text' value='$U_Password' name=U_Password></td>"; ?>
            </tr>
        </table>
        <input type="submit" value="送出修改">
        </form>
    </main>
</body>

</html>