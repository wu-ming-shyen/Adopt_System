<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['submit'])){
        exit("錯誤執行");
    }

    $name = $_POST['U_Name'];
    $email = $_POST['U_Email'];
    $password1 = $_POST['U_Password1'];
    $password2 = $_POST['U_Password2'];
    if($password1 != $password2)
    {
        echo"<script>alert('密碼錯誤');</script>";
    }
    include('/../connect.php');

    $sql = "INSERT INTO member (`M_Name`,`M_Email`,`M_Password`) VALUES ('$name','$email','$password')";
    $reslut=mysqli_query($connect,$sql);
    
    if(!$reslut){
        echo "<script>alert('註冊失敗(可能帳號已有人使用)');</script>";
        header("refresh:0;url=I31_sign_up.html");
    }else{
        echo "<script>alert('註冊成功');</script>";
        header("refresh:0;url=../Sign_in/I21_sign_in.html");
    }
    
    mysqli_close($connect);
    
?>