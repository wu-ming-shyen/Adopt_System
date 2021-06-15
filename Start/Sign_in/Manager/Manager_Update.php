<?php
    $email = $_POST['email'];
    $M_Name = $_POST['M_Name'];
    $M_Password = $_POST['M_Password'];
    $M_Birthday = $_POST['M_Birthday'];
    $M_Phone = $_POST['M_Phone'];
    $M_Sex = $_POST['M_Sex'];
    $M_Address = $_POST['M_Address'];

    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");

    $sql = "UPDATE `manager` SET `name` = '$M_Name', `password` = '$M_Password', `birthday` = '$M_Birthday', `Phone` = '$M_Phone', `sex` = '$M_Sex', `address` = '$M_Address' WHERE `manager`.`email` = '$email';";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "<script>alert('ERROR');</script>";
        header("refresh:0;url=M11_data_manager.php");
    }else{
        echo "<script>alert('修改成功');</script>";
        header("refresh:0;url=M11_data_manager.php");
    }

    mysqli_close($connect);
?>