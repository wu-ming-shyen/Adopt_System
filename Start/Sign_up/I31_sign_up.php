<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['submit'])){
        exit("錯誤執行");
    }

    $name = $_POST['U_Name'];
    $email = $_POST['U_Email'];
    $password1 = $_POST['U_Password1'];
    $password2 = $_POST['U_Password2'];
    $sex=$_POST['U_sex'];
    $id_number=$_POST['U_id_number'];
    $phone=$_POST['U_phone'];
    $address=$_POST['U_address'];
    $birthday=$_POST['U_birthday'];
    if($name=="" || $email=="" || $password1=="" || $password2==""|| $sex=="" || $id_number==""|| $phone=="" || $address=="" || $birthday==""){
        echo"<script>alert('請輸入完整資料');</script>";
        header("refresh:0;url=I31_sign_up.html");
    }
    else if($password1 != $password2)
    {
        echo"<script>alert('密碼輸入不正確');</script>";
        header("refresh:0;url=I31_sign_up.html");
    }
    else{
        include('../connect.php');

        $sql2 = "SELECT * FROM `user` WHERE `email` = '$email'";
        $result2=mysqli_query($connect,$sql2);
        $sql3 = "SELECT * FROM `manager` WHERE `email` = '$email'";
        $result3=mysqli_query($connect,$sql3);
        $sql4 = "SELECT * FROM `shelter` WHERE `email` = '$email'";
        $result4=mysqli_query($connect,$sql4);
        if(mysqli_num_rows($result2)>0 || mysqli_num_rows($result3)>0 || mysqli_num_rows($result4)>0){
            echo "<script>alert('註冊失敗(可能帳號已有人使用)');</script>";
            header("refresh:0;url=I31_sign_up.html");
        }
        else{
            $sql = "INSERT INTO `user` (`name`,`email`,`password`,`sex`,`id_number`,`phone`,`address`,`birthday`) VALUES ('$name','$email','$password1','$sex','$id_number','$phone','$address','$birthday')";
            $reslut=mysqli_query($connect,$sql);
            if(!$reslut){
                echo "<script>alert('註冊失敗(可能帳號已有人使用)');</script>";
                header("refresh:0;url=I31_sign_up.html");
            }else{
                echo "<script>alert('註冊成功');</script>";
                header("refresh:0;url=../Sign_in/I21_sign_in.html");
            }
        }
        mysqli_close($connect);
    }
?>