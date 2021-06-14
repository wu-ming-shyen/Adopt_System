<?php
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    header("content-type:text/html;charset=utf-8");
    $id = $_POST['id'];
    $genus = $_POST['genus'];
    $species = $_POST['species'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $img = $_POST['img'];
    $color = $_POST['color'];
    $fromwhere = $_POST['fromwhere'];

    $time = $_POST['time'];
    $adppt = $_POST['adopt'];
    
    $email = parseurl($_COOKIE['user']);

    function parseurl($url=""){
        $url = rawurlencode(mb_convert_encoding($url, 'gb2312', 'utf-8'));
        $a = array("%3A", "%2F", "%40");
        $b = array(":", "/", "@");
        $url = str_replace($a, $b, $url);
        return $url;
    }

    $sql = "UPDATE `animal` SET `genus`='$genus', `species`='$species', `sex`='$sex', `age`='$age', `img`='$img', `color`='$color', `fromwhere`='$fromwhere' WHERE `id` = '$id'";
    $result2 = mysqli_query($connect,$sql);

    if(!$result2){
        echo "<script>alert('ERROR');</script>";
        echo "<script>location.href='M21_data_animal.php?shelter=請選擇'</script>";
    }else{
        $sql2 = "UPDATE `contain` SET `time` = '$time' WHERE `a_id` = '$id'";
        $result4=mysqli_query($connect,$sql2);
        if(!$result4){
            echo "<script>alert('ERROR');</script>";
            echo "<script>location.href='M21_data_animal.php?shelter=請選擇'</script>";
        }
        else{
            echo "<script>alert('修改成功');</script>";
            echo "<script>location.href='M21_data_animal.php?shelter=請選擇'</script>";
        }
    }

    mysqli_close($connect);
?>