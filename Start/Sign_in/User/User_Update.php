<?php
    $email = $_POST['email'];
    $U_Name = $_POST['U_Name'];
    $U_Password = $_POST['U_Password'];
    $U_Birthday = $_POST['U_Birthday'];
    $U_Phone = $_POST['U_Phone'];
    $U_Sex = $_POST['U_Sex'];
    $U_Address = $_POST['U_Address'];

    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");

    $sql = "UPDATE `user` SET `name` = '$U_Name', `password` = '$U_Password', `sex` = '$U_Sex', `phone` = '$U_Phone', `address` = '$U_Address', `birthday` = '$U_Birthday' WHERE `user`.`email` = '$email';";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "<script>alert('ERROR');</script>";
        header("refresh:0;url=U21_data_user.php");
    }else{
        echo "<script>alert('修改成功');</script>";
        header("refresh:0;url=U21_data_user.php");
    }

    mysqli_close($connect);
?>