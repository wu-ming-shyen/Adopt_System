<!DOCTYPE html>
<html lang="en">

<head>
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
    </style>
</head>

<body>
    <nav>
        <img src="U01_user_UI/title.png">
        <input type="button" value="回首頁" onclick="self.location.href='../../index.html'" id="in"><br>
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
                    <select style="float: left;margin-left: -300px;" id="option1">
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
                            header("Content-Type: text/html; charset=utf8");
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
                    <input type="submit" value="查詢" style="font-size: 25px;margin-bottom: 50px;" onclick="print()">
                </td>
            </tr>
        </table>
    <script>
        function print(){
            alert(document.getElementById("option").value);
        }
    </script>
    <a href="U12_detail_animal.html"><img src="U11_search_animal/shelter_animal-1.png" style="width: 17%;"> </a>
    <a href="U12_detail_animal.html"><img src="U11_search_animal/shelter_animal-2.png" style="width: 17%;"> </a>
    <a href="U12_detail_animal.html"><img src="U11_search_animal/shelter_animal-3.png" style="width: 17%;"> </a>
    <a href="U12_detail_animal.html"><img src="U11_search_animal/shelter_animal-4.png" style="width: 17%;"> </a>
    <a href="U12_detail_animal.html"><img src="U11_search_animal/shelter_animal-5.png" style="width: 17%;"> </a>
</body>

</html>