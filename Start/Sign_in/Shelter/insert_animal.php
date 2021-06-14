<?php
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $genus = $_POST['genus'];
    $species = $_POST['species'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $img = $_POST['img'];
    $color = $_POST['color'];
    $fromwhere = $_POST['fromwhere'];
    $open = $_POST['open'];
    $status = $_POST['status'];
    $time = $_POST['time'];
    
    $email = parseurl($_COOKIE['user']);

    function parseurl($url=""){
        $url = rawurlencode(mb_convert_encoding($url, 'gb2312', 'utf-8'));
        $a = array("%3A", "%2F", "%40");
        $b = array(":", "/", "@");
        $url = str_replace($a, $b, $url);
        return $url;
    }

    $shelter="SELECT `id` FROM `shelter` WHERE `email` = '$email'";
    $result=mysqli_query($connect,$shelter);
    $shelter_data=mysqli_fetch_row($result);

    $sql = "INSERT INTO `animal` (`id`, `genus`, `species`, `sex`, `age`, `img`, `color`, `fromwhere`, `open`, `status`, `s_id`) VALUES (NULL, '$genus', '$species', '$sex', '$age', '$img', '$color', '$fromwhere', '$open', '$status', '$shelter_data[0]');";
    $result2 = mysqli_query($connect,$sql);

    if(!$result2){
        echo "<script>alert('ERROR1');</script>";
        header("refresh:0;url=S11_data_animal.php");
    }else{
        $animal="SELECT `id` FROM `animal` WHERE `species` = '$species'";
        $result3=mysqli_query($connect,$animal);
        $animal_data=mysqli_fetch_row($result3);
        $sql2 = "INSERT INTO `contain` (`s_id`, `a_id`) VALUES ('$shelter_data[0]', '$animal_data[0]');";
        $result4=mysqli_query($connect,$sql2);
        $sql3 = "UPDATE `contain` SET `time` = '$time' WHERE `a_id` = '$animal_data[0]';";
        $result5=mysqli_query($connect,$sql3);
        if(!$result4){
            echo "<script>alert('ERROR');</script>";
            header("refresh:0;url=S11_data_animal.php");
        }
        else{
            echo "<script>alert('新增成功');</script>";
            header("refresh:0;url=S11_data_animal.php");
        }
    }

    mysqli_close($connect);
?>