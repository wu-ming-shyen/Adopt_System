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

    $sql = "SELECT * FROM user WHERE email = '$email'";
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
            text-align: center;
            background-color: papayawhip;
        }
        
        nav {
            text-align: center;
        }
        
        select {
            font-size: 25px;
        }
        
        input[type="button"] {
            width: 100px;
            height: 50px;
            float: right;
            margin: 50px;
            font-size: 25px;
        }
        .t1,
        .t2,
        .t3 {
            font-size: 30px;
            text-align: left;
            border: 1px solid black;
            border-collapse: collapse;
        }
        
        .t4 {
            text-align:center;
            width: 100px;
            height: 50px;
            font-size: 30px;
            background-color: burlywood;
        }
        
        .t3 {
            text-align:center;
            width: 200px;
            height: 50px;
            font-size: 30px;
        }
        .t5{
            width: 500px;
            height: 50px;
            font-size: 30px;
        }
        #test{
            float: right;
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
        <img src="U01_user_UI/title.png">
        <img src="U01_user_UI/U11.png" alt="">
    </nav>
    <h1>請輸入查詢資料</h2>
    <table align="center">
        <td><input type="checkbox" id="checkbox1" name="vehicle2" onclick="dog()" value="dog" style="width:25px;height:25px;"></td>
        <td><img src="U11_search_animal/shelter_animal-dog.png" style="width:200px;"></td>
        <td><input type="checkbox" id="checkbox2" name="vehicle3" onclick="cat()" value="cat" style="width:25px;height:25px;"></td>
        <td><img src="U11_search_animal/shelter_animal-cat.png" style="width:200px;"></td>
    </table>
    <table align="center">
        <tr>
            <td><img src="U11_search_animal/shelter_animal-foota.png" style="width: 50%;"></td>
            <td>
                <select style="float: left;margin-left: -300px;" id="option">
                    <option id="one">請選擇 </option>
                    <script type="text/javascript">
                        function dog() {
                            var checkBox1 = document.getElementById("checkbox1");
                            var d1 = document.getElementById('one');
                            var dog = document.querySelector(".dog");
                            if (checkBox1.checked == true){
                                <?php
                                    header("Content-Type: text/html; charset=utf8");
                                    include('../../connect.php');
                                    mysqli_query($connect,"SET NAMES 'UTF8'");
                                    $sql = "SELECT `species` FROM `animal` WHERE `genus` = '犬'";
                                    $result = mysqli_query($connect,$sql);
                                    for($i=1; $i <= mysqli_num_rows($result);$i++){
                                        $text = mysqli_fetch_row($result);
                                        $text2=$text[0];
                                        echo "d1.insertAdjacentHTML('afterend', '<option class=dog>$text2</option>');";
                                    }
                                    mysqli_close($connect);
                                ?>
                            }
                            else {
                                var dog = document.querySelectorAll('.dog');
                                for(var i = 0; i < dog.length; i++) {
                                    dog[i].remove();
                                }
                            }
                        }
                        function cat() {
                            var checkBox2 = document.getElementById("checkbox2");
                            var d1 = document.getElementById('one');
                            var cat = document.querySelector(".cat");
                            if (checkBox2.checked == true){
                                <?php
                                    header("Content-Type: text/html; charset=utf8");
                                    include('../../connect.php');
                                    mysqli_query($connect,"SET NAMES 'UTF8'");
                                    $sql = "SELECT `species` FROM `animal` WHERE `genus` = '貓'";
                                    $result = mysqli_query($connect,$sql);
                                    for($i=1; $i <= mysqli_num_rows($result);$i++){
                                        $text = mysqli_fetch_row($result);
                                        $text2=$text[0];
                                        echo "d1.insertAdjacentHTML('afterend', '<option class=cat>$text2</option>');";
                                    }
                                ?>
                            }
                            else{
                                var cat = document.querySelectorAll('.cat');
                                for(var i = 0; i < cat.length; i++) {
                                    cat[i].remove();
                                }
                            }
                        }
                    </script>
                </select>
            </td>
        </tr>
        <tr>
            <td><img src="U11_search_animal/shelter_animal-footb.png" style="width: 50%;"></td>
            <td>
                <select style="float: left;margin-left: -300px;" id="option2">
                    <option>請選擇 </option>
                    <?php
                        include('../../connect.php');
                        mysqli_query($connect,"SET NAMES 'UTF8'");
                        $sql = "SELECT `name` FROM `shelter`";
                        $result = mysqli_query($connect,$sql);
                        for($i=1; $i <= mysqli_num_rows($result);$i++){
                            $text = mysqli_fetch_row($result);
                            echo "<option>$text[0]</option>";
                        }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="查詢" style="font-size: 25px;margin-bottom: 50px;" onclick="test()">
            </td>
        </tr>
    </table>
    <script type="text/javascript">
        function test(){
            var animal = document.getElementById("option").value;
            var shelter = document.getElementById("option2").value;
            location.href="U11_search_animal.php?animal="+animal+"&shelter="+shelter;
        }
    </script>
    <?php
        include('../../connect.php');
        mysqli_query($connect,"SET NAMES 'UTF8'");
        $animal="請選擇";
        $shelter="請選擇";
        if($_GET['animal'] || $_GET['shelter']){
            $animal = $_GET['animal'];
            $shelter = $_GET['shelter'];
        }
        if($shelter != "請選擇" && $animal != "請選擇"){
            $sql = "SELECT `id` FROM `shelter` WHERE `name` = '$shelter'";
            $result = mysqli_query($connect,$sql);
            if(mysqli_num_rows($result)>0){
                $text = mysqli_fetch_row($result);
                $sql2 = "SELECT * FROM `animal` WHERE `s_id` = '$text[0]' AND `species` = '$animal'";
                $result2 = mysqli_query($connect,$sql2);
                if(mysqli_num_rows($result2)>0){
                    echo "<table border='1' class='t1' align='center'>";
                    echo "<tr class='t4'><th>照片</th><th>類別</th><th>品種</th><th>性別</th><th>年齡</th><th>來自</th><th>詳細資料</th></tr>";
                    if(mysqli_num_rows($result2)==1){
                        $text = mysqli_fetch_row($result2);
                        echo "<tr class='t2'>";
                        echo "<td><img src='".$text[5]."'style='width:400px;'></td>";
                        echo "<td class='t3'>$text[1]</td>";
                        echo "<td class='t3'>$text[2]</td>";
                        echo "<td class='t3'>$text[3]</td>";
                        echo "<td class='t3'>$text[4]</td>";
                        echo "<td class='t5'>$shelter</td>";
                        echo "<td class='t3'><form action='U12_detail_animal.php' method='post'><input type='hidden' name='a_id' value='$row[0]'><input type='submit' name='submit' value='查看'></form></td>";
                        echo "</tr>";
                    }
                    while ($row = mysqli_fetch_array($result2)){
                        echo "<tr class='t2'>";
                        echo "<td><img src='".$row[5]."'style='width:400px;'></td>";
                        echo "<td class='t3'>$row[1]</td>";
                        echo "<td class='t3'>$row[2]</td>";
                        echo "<td class='t3'>$row[3]</td>";
                        echo "<td class='t3'>$row[4]</td>";
                        echo "<td class='t5'>$shelter</td>";
                        echo "<td class='t3'><form action='U12_detail_animal.php' method='post'><input type='hidden' name='a_id' value='$row[0]'><input type='submit' name='submit' value='查看'></form></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<script>alert('查無資料')</script>";
                }
            }
        }
        else if ($shelter != "請選擇" ){
            $sql = "SELECT `id` FROM `shelter` WHERE `name` = '$shelter'";
            $result = mysqli_query($connect,$sql);
            if(mysqli_num_rows($result)>0){
                $text = mysqli_fetch_row($result);
                $sql2 = "SELECT * FROM `animal` WHERE `s_id` = '$text[0]'";
                $result2 = mysqli_query($connect,$sql2);
                if(mysqli_num_rows($result2)>0){
                    echo "<table border='1' class='t1' align='center'>";
                    echo "<tr class='t4'><th>照片</th><th>類別</th><th>品種</th><th>性別</th><th>年齡</th><th>來自</th><th>詳細資料</th></tr>";
                    if(mysqli_num_rows($result2)==1){
                        $text = mysqli_fetch_row($result2);
                        echo "<tr class='t2'>";
                        echo "<td><img src='".$text[5]."'style='width:400px;'></td>";
                        echo "<td class='t3'>$text[1]</td>";
                        echo "<td class='t3'>$text[2]</td>";
                        echo "<td class='t3'>$text[3]</td>";
                        echo "<td class='t3'>$text[4]</td>";
                        echo "<td class='t5'>$shelter</td>";
                        echo "<td class='t3'><form action='U12_detail_animal.php' method='post'><input type='hidden' name='a_id' value='$text[0]'><input type='submit' name='submit' value='查看'></form></td>";
                        echo "</tr>";
                    }
                    while ($row = mysqli_fetch_array($result2)){
                        echo "<tr class='t2'>";
                        echo "<td><img src='".$row[5]."'style='width:400px;'></td>";
                        echo "<td class='t3'>$row[1]</td>";
                        echo "<td class='t3'>$row[2]</td>";
                        echo "<td class='t3'>$row[3]</td>";
                        echo "<td class='t3'>$row[4]</td>";
                        echo "<td class='t5'>$shelter</td>";
                        echo "<td class='t3'><form action='U12_detail_animal.php' method='post'><input type='hidden' name='a_id' value='$row[0]'><input type='submit' name='submit' value='查看'></form></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }
                else{
                    echo "<script>alert('查無資料')</script>";
                }
            }       
        }
        else if ($animal != "請選擇" ){
            $sql = "SELECT * FROM `animal` WHERE `species` = '$animal'";
            $result = mysqli_query($connect,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<table border='1' class='t1' align='center'>";
                echo "<tr class='t4'><th>照片</th><th>類別</th><th>品種</th><th>性別</th><th>年齡</th><th>來自</th><th>詳細資料</th></tr>";
                if(mysqli_num_rows($result)==1){
                    $text = mysqli_fetch_row($result);
                    $sql2 = "SELECT `name` FROM `shelter` WHERE `id` = '$text[11]'";
                    $result2 = mysqli_query($connect,$sql2);
                    $text2 = mysqli_fetch_row($result2);
                    echo "<tr class='t2'>";
                    echo "<td><img src='".$text[5]."'style='width:400px;'></td>";
                    echo "<td class='t3'>$text[1]</td>";
                    echo "<td class='t3'>$text[2]</td>";
                    echo "<td class='t3'>$text[3]</td>";
                    echo "<td class='t3'>$text[4]</td>";
                    echo "<td class='t5'>$text2[0]</td>";
                    echo "<td class='t3'><form action='U12_detail_animal.php' method='post'><input type='hidden' name='a_id' value='$text[0]'><input type='submit' name='submit' value='查看'></form></td>";
                    echo "</tr>";
                }
                while ($row = mysqli_fetch_array($result)){
                    $sql2 = "SELECT `name` FROM `shelter` WHERE `id` = '$text[11]'";
                    $result2 = mysqli_query($connect,$sql2);
                    $text2 = mysqli_fetch_row($result2);
                    echo "<tr class='t2'>";
                    echo "<td><img src='".$row[5]."'></td>";
                    echo "<td class='t3'>$row[1]</td>";
                    echo "<td class='t3'>$row[2]</td>";
                    echo "<td class='t3'>$row[3]</td>";
                    echo "<td class='t3'>$row[4]</td>";
                    echo "<td class='t5'>$text2[0]</td>";
                    echo "<td class='t3'><form action='U12_detail_animal.php' method='post'><input type='hidden' name='a_id' value='$row[0]'><input type='submit' name='submit' value='查看'></form></td>";
                    echo "</tr>";
                }
                echo "</table>";
            }
            else{
                echo "<script>alert('查無資料')</script>";
            }     
        }
    ?>
</body>

</html>