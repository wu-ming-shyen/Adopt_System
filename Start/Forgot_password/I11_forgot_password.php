<?php
    header("Content-Type: text/html; charset=utf8");
    if(!isset($_POST['submit'])){
        exit("錯誤執行");
    }

    $email = $_POST['U_Email'];

    include('/../connect.php');

    $sql = "INSERT INTO `member` (`M_Name`, `M_Gender`, `M_Phone`, `M_Email`, `M_Address`, `M_Account`, `M_Password`) VALUES ('$name', '$gender', '$phone', '$email', '$address', '$acount', '$password')";
    $reslut=mysqli_query($connect,$sql);
    
    if(!$reslut){
        echo "<script>alert('註冊失敗(可能帳號已有人使用)');</script>";
        header("refresh:0;url=signup.html");
    }else{
        echo "<script>alert('註冊成功');</script>";
        header("refresh:0;url=login.html");
    }
    
    mysqli_close($connect);
    
?>
