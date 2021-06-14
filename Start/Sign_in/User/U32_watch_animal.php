<!DOCTYPE html>
<html lang="en">

<head>
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
            margin-top: 20px;
            margin-left: 200px;
        }
        table {
            margin-top: 20px;
        }
        #animal {
            width: 410px;
            height: 410px;
        }
        
        #test{
            float: right;
            text-decoration:none;
        }
        select {
            font-size: 25px;
        }
        input[type="submit"] {
            font-size: 30px;
            width: 150px;
        }
    </style>
</head>

<body>
    <nav>
        <a href="../check_out.php" id="test">&nbsp;登出</a>
        <a href="U01_user_UI.html" id="test">回首頁</a>
        
        <script>
            var match = document.cookie.match(new RegExp("user"+"=([^;]*)"));
            var a = match[0].replace(/user=/g, '').replace(/;/g, '').split('%')[0];
            document.write('<a id="test">HI! '+a+'&nbsp;&nbsp;</a>');
        </script>
        <image src="U01_user_UI/title.png" alt="">
        <image src="U01_user_UI/U31.png" alt="">
    </nav>
    <main>
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
        ?>
        <table>
            <?php
                $A_ID = $_POST['A_ID'];
                $sql2 = "SELECT * FROM `animal` WHERE `id` = '$A_ID'";
                $result3 = mysqli_query($connect,$sql2);
                if(mysqli_num_rows($result3)==1){
                    $text = mysqli_fetch_row($result3);
                    $sql3 = "SELECT `time` FROM `contain` WHERE `a_id` = '$text[0]'";
                    $result4 = mysqli_query($connect,$sql3);
                    $time = mysqli_fetch_row($result4);

                    $shelter="SELECT * FROM `shelter` WHERE `id` = '$text[11]'";
                    $result=mysqli_query($connect,$shelter);
                    $shelter_data=mysqli_fetch_row($result);

                    echo "<form action='update_animal.php' method='POST'>";
                    echo "<table align='center' id='table1'>";
                    echo "<tr>";
                    echo "<th>入所日期:</th>";
                    if($time==""){
                        echo "<td></td>";
                    }
                    else{
                        echo "<td>$time[0]</td>";
                    }
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>是否開放領養:</th>";
                    echo "<td></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>來源行政區:</th>";
                    echo "<td>$text[7]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>動物別:</th>";
                    echo "<td>$text[1]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>動物品種:</th>";
                    echo "<td>$text[2]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>毛色:</th>";
                    echo "<td>$text[6]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>動物性別:</th>";
                    echo "<td>$text[3]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>動物名:</th>";
                    echo "<td></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>年齡:</th>";
                    echo "<td>$text[4]</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<table align='center' id='table2'>";
                    echo "<tr>";
                    echo "<th>圖片:</th>";
                    echo "<td><img src='".$text[5]."'style='height:200px;'></td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>公告收容所:</th>";
                    echo "<td>$shelter_data[1]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>收容所電話:</th>";
                    echo "<td>$shelter_data[4]</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<th>收容所地址:</th>";
                    echo "<td>$shelter_data[5]</td>";
                    echo "</tr>";
                    echo "</table>";
                    echo "<input type='hidden' name='id' value='$text[0]'>";
                    echo "<input type='submit' value='我要領養' style='margin-top:50px;'>";
                    echo "<form>";
                }
            ?>
        </table>
    </main>
</body>

</html>