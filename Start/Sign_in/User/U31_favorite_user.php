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
        $U_ID = $text[0];
        $U_Name = $text[1];
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
            font-size: 20px;
            text-align: left;
            border: 2px solid black;
            border-collapse: collapse;
        }
        
        th {
            width: 150px;
            height: 50px;
            font-size: 20px;
            text-align: center;
            background-color: burlywood;
        }
        
        td {
            height: 50px;
            font-size: 20px;
        }
        
        input[type="submit"] {
            font-size: 20px;
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
        <image src="U01_user_UI/U31.png" alt=""></image>
    </nav>
    <main>
        <table align="center">
            <tr>
                <th style="width: 100px;">收容編號</th>
                <th style="width: 80px;">類別</th>
                <th style="width: 80px;">性別</th>
                <th style="width: 280px;">收容所名稱</th>
                <th style="width: 280px;">收容所地址</th>
                <th>收容所電話</th>
                <th>查看詳細資料</th>
                <th>刪除</th>
            </tr>
            <?php
                header("Content-Type: text/html; charset=utf8");
                include('../../connect.php');
                mysqli_query($connect,"SET NAMES 'UTF8'");
                $sql = "SELECT * FROM `favorite` WHERE `u_id` = '$U_ID'";
                $result = mysqli_query($connect,$sql);
                for($i=1; $i <= mysqli_num_rows($result);$i++){
                    $text = mysqli_fetch_row($result);
                    $U_ID = $text[0];
                    $A_ID = $text[1];
                    $sql2 = "SELECT * FROM `animal` WHERE `id` = '$A_ID'";
                    $result2 = mysqli_query($connect,$sql2);
                    $text2 = mysqli_fetch_row($result2);
                    $A_Species = $text2[2];
                    $A_Sex = $text2[3];
                    $S_ID = $text2[11];
                    $sql3 = "SELECT * FROM `shelter` WHERE `id` = '$S_ID'";
                    $result3 = mysqli_query($connect,$sql3);
                    $text3 = mysqli_fetch_row($result3);
                    $S_Name = $text3[1];
                    $S_Phone = $text3[4];
                    $S_Address = $text3[5];
                    echo "
                    <tr>
                        <td style='text-align: center;'>$A_ID</td>
                        <td style='text-align: center;'>$A_Species</td>
                        <td style='text-align: center;'>$A_Sex</td>
                        <td>$S_Name</td>
                        <td>$S_Address</td>
                        <td>$S_Phone</td>
                        <td style='text-align: center;'>
                            <form action='U32_watch_animal.php' method='POST'>
                                <input type='hidden' value='$U_ID' name='U_ID'>
                                <input type='hidden' value='$A_ID' name='A_ID'>
                                <input type='submit' value='查看' name='U_Name'><br>
                            </form>
                        </td>
                        <td style='text-align: center;'>
                            <form action='delete_favorite.php' method='POST'>
                                <input type='hidden' value='$U_ID' name='U_ID'>
                                <input type='hidden' value='$A_ID' name='A_ID'>
                                <input type='submit' value='刪除' name='U_Name'><br>
                            </form>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </main>
</body>

</html>