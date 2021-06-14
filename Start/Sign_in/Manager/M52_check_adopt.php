<?php
    header("Content-Type: text/html; charset=utf8");
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $U_ID = $_POST['U_ID'];
    $R_ID = $_POST['R_ID'];
    $U_Name = $_POST['U_Name'];
    
    $sql = "SELECT * FROM `user` WHERE `id`='$U_ID'";
    $result = mysqli_query($connect,$sql);
    $text = mysqli_fetch_row($result);
    $U_Name = $text[1];
    $U_Email = $text[2];
    $U_Password = $text[3];
    $U_Sex = $text[4];
    $U_ID_Number = $text[5];
    $U_Phone = $text[6];
    $U_Address = $text[7];
    $U_Birthday = $text[8];
    
    $sql2 = "SELECT * FROM `requisition` WHERE `r_id`='$R_ID'";
    $result2 = mysqli_query($connect,$sql2);
    $text2 = mysqli_fetch_row($result2);
    $R_Date = $text2[2];
    $R_Area = $text2[3];
    $R_Have = $text2[4];
    $R_Salary = $text2[5];
    $R_Address = $text2[6];
    $R_Aduit = $text2[7];
    

?>
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
            margin: 50px;
            font-size: 30px;
            height: 50px;
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
        <a href="M01_manager_UI.html" id="test">回首頁</a>
        <?php
            echo "<a id=test>HI $M_Name</a>";
        ?>
        <image src="M01_manager_UI/title.png" alt=""><br>
        <image src="M01_manager_UI/M51.png" alt="">
    </nav>
    <main>
        <table align="center">
            <tr>
                <th>申請人</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$U_Name"; ?>
                </td>
            </tr>
            <tr>
                <th>身分證字號</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$U_ID_Number"; ?>
                </td>
            </tr>
            <tr>
                <th>出生日期</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$U_Birthday"; ?>
                </td>
            </tr>
            <tr>
                <th>電話</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$U_Phone"; ?>
                </td>
            </tr>
            <tr>
                <th>電子郵件</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$U_Email"; ?>
                </td>
            </tr>
            <tr>
                <th>坪數</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$R_Area"; ?>
                </td>
            </tr>
            <tr>
                <th>現有動物隻數</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$R_Have"; ?>
                </td>
            </tr>
            <tr>
                <th>薪水</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$R_Salary"; ?>
                </td>
            </tr>
            <tr>
                <th>地址</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$R_Address"; ?>
                </td>
            </tr>
            <tr>
                <th>申請日期</th>
                <td style='background-color: lightyellow;'>
                    <?php echo "$R_Date"; ?>
                </td>
            </tr>
        </table>
        <form action='Requisition_Update.php' method='POST'>
            <?php echo "<input type='hidden' value='$R_ID' name='R_ID'>"; ?>
            <?php echo "<input type='Submit' value='Yes' name='R_Audit'>"; ?>
        </form>
        <form action='Requisition_Update.php' method='POST'>
            <?php echo "<input type='hidden' value='$R_ID' name='R_ID'>"; ?>
            <?php echo "<input type='Submit' value='No' name='R_Audit'>"; ?>
        </form>
    </main>
</body>

</html>