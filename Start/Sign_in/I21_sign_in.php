<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['submit'])){
        exit("錯誤執行");
    }

    $acount = $_POST['U_Account'];
    $password = $_POST['U_Password'];

    include('../connect.php');

    $sql = "SELECT `password` FROM `user` WHERE `email` = '$acount'";
    $reslut=mysqli_query($connect,$sql);
    $sql2 = "SELECT `password` FROM `manager` WHERE `email` = '$acount'";
    $reslut2=mysqli_query($connect,$sql2);
    $sql3 = "SELECT `password` FROM `shelter` WHERE `email` = '$acount'";
    $reslut3=mysqli_query($connect,$sql3);

    
    if($reslut==$password && $password!=""){
        echo "<script>alert('帳號或密碼錯誤!1')</script>";
    }
    else if($reslut2==$password && $password!=""){
        echo "<script>alert('帳號或密碼錯誤!2')</script>";
    }
    else if($reslut3==$password && $password!=""){
        echo "<script>alert('帳號或密碼錯誤!3')</script>";
    }
    else{
        echo "<script>alert('帳號或密碼錯誤!');</script>";
    }
    mysqli_close($connect);

?>