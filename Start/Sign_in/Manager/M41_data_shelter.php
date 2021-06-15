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
        
        select {
            width: 200px;
            height: 50px;
            font-size: 30px;
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
            width: 100px;
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
        <image src="M01_manager_UI/M41.png" alt="">
    </nav>
    <main>
        <form action="M41_data_shelter.php" method="POST">
            <select name="S_Area">
                <option value="">請選擇</option>
                <option value="北部">北部</option>
                <option value="中部">中部</option>
                <option value="南部">南部</option>
                <option value="東部">東部</option>
                <option value="離島">離島</option>
            </select>
            <input type="submit" value="查詢">
        </form>
        <?php
            header("Content-Type: text/html; charset=utf8");
            include('../../connect.php');
            mysqli_query($connect,"SET NAMES 'UTF8'");
            
            if(isset($_POST['S_Area'])){
                $S_Area = $_POST['S_Area'];
            }
            else{
                $S_Area="";
            }
            
            $sql = "SELECT * FROM `shelter` WHERE `area` = '$S_Area'";
            $result = mysqli_query($connect,$sql);
            for($i=1; $i <= mysqli_num_rows($result);$i++){
                $text = mysqli_fetch_row($result);
                $S_Name = $text[1];
                $S_Email = $text[2];
                $S_Password = $text[3];
                $S_Phone = $text[4];
                $S_Address = $text[5];
                $S_Area = $text[6];
                echo "
                <table align='center'>
                    <tr>
                        <th>收容所名稱:</th>
                        <td style='background-color: lightyellow;'>
                            $S_Name
                        </td>
                    </tr>
                    <tr>
                        <th>收容所電話:</th>
                        <td style='background-color: lightyellow;'>
                            $S_Phone
                        </td>
                    </tr>
                    <tr>
                        <th>收容所住址:</th>
                        <td style='background-color: lightyellow;'>
                            $S_Address
                        </td>
                    </tr>
                </table>
                ";
            }
        ?>
    </main>
</body>

</html>