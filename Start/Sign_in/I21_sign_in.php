<?php
    session_start();
    $_SESSION["admin"] = null;
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['submit'])){
        exit("錯誤執行");
    }

    $account = $_POST['U_Account'];
    $password = $_POST['U_Password'];

    include('../connect.php');

    $sql = "SELECT `password` FROM `user` WHERE `email` = '$account'";
    $result=mysqli_query($connect,$sql);
    $sql2 = "SELECT `password` FROM `manager` WHERE `email` = '$account'";
    $result2=mysqli_query($connect,$sql2);
    $sql3 = "SELECT `password` FROM `shelter` WHERE `email` = '$account'";
    $result3=mysqli_query($connect,$sql3);
    
    if($text = mysqli_fetch_row($result)){
        if($text[0]==$password && $password!=""){
            $_SESSION["admin"] = true;
            $_SESSION["acount"] = $account;
            header("refresh:0;url=check.php");
        }
    }
    else if($text = mysqli_fetch_row($result2)){
        if($text[0]==$password && $password!=""){
            session_destroy();
            header("refresh:0;url=Manager/M01_manager_UI.html");
        }
    }
    else if($text = mysqli_fetch_row($result3)){
        if($text[0]==$password && $password!=""){
            header("refresh:0;url=Shelter/S01_shelter_UI.html");
        }
    }
    else{
        echo "<script>alert('帳號或密碼錯誤!');</script>";
        header("refresh:0;url=I21_sign_in.html");
    }
    mysqli_close($connect);

?>