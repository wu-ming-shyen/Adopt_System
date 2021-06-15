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
    $S_Phone = $text[4];
    $S_Address = $text[5];
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
            margin: 0 auto;
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
        
        button {
            margin-top: 50px;
            font-size: 30px;
        }
        
        #table1 {
            float: left;
            margin-left: 200px;
        }
        
        #animal {
            width: 410px;
            height: 410px;
        }
        
        #test{
            float: right;
            text-decoration:none;
        }
        input[type="submit"] {
            margin-top: 100px;
            font-size: 30px;
            width: 150px;
        }
        input[type="button"] {
            margin-top: 100px;
            font-size: 30px;
            width: 150px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../check_out.php" id="test">&nbsp;登出</a>
        <a href="S01_shelter_UI.php" id="test">回首頁</a>
        
        <?php
            echo "<a id=test>HI $S_Name</a>";
        ?>
        <image src="S01_shelter_UI/title.png" alt="">
        <image src="S01_shelter_UI/S11.png" alt="">
    </nav>
    <main>
        <form action="insert_animal.php" method="POST">
            <table align="center" id="table1">
                <tr>
                    <th>入所日期:</th>
                    <td><input type="date" name="time"></td>
                </tr>
                <tr>
                    <th>是否開放領養:</th>
                    <td><input type="text" name="open"></td>
                </tr>
                <tr>
                    <th>來源行政區:</th>
                    <td><input type="text" name="fromwhere"></td>
                </tr>
                <tr>
                    <th>動物別:</th>
                    <td><input type="text" name="genus"></td>
                </tr>
                <tr>
                    <th>動物品種:</th>
                    <td><input type="text" name="species"></td>
                </tr>
                <tr>
                    <th>毛色:</th>
                    <td><input type="text" name="color"></td>
                </tr>
                <tr>
                    <th>動物性別:</th>
                    <td><input type="text" name="sex"></td>
                </tr>
                <tr>
                    <th>領養狀態:</th>
                    <td><input type="text" name="status"></td>
                </tr>
            </table>
            <table align="center" id="table2">
                <tr>
                    <th>年齡:</th>
                    <td><input type="text" name="age"></td>
                </tr>
                <tr>
                    <th>圖片連結:</th>
                    <td><input type="text" name="img"></td>
                </tr>
                <tr>
                    <th>公告收容所:</th>
                    <?php echo "<td>$S_Name</td>";?>
                </tr>
                <tr>
                    <th>收容所電話:</th>
                    <?php echo "<td>$S_Phone</td>";?>
                </tr>
                <tr>
                    <th>收容所地址:</th>
                    <?php echo "<td>$S_Address</td>";?>
                </tr>
            </table>
            <input type="submit" value="新增">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="button" value="維護貓狗" onclick="location.href='S11_data_animal2.php?animal=請選擇'">
        </form>
    </main>
    
</body>

</html>