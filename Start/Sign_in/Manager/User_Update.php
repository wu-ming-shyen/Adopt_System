<?php
    $U_Name = $_POST['U_Name'];
    $U_Email = $_POST['U_Email'];
    $U_Password = $_POST['U_Password'];

    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");

    $sql = "UPDATE `user` SET `name` = '$U_Name', `password` = '$U_Password' WHERE `user`.`email` = '$U_Email';";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "<script>alert('ERROR');</script>";
        header("refresh:0;url=M31_data_user.php");
    }else{
        echo "<script>alert('修改成功');</script>";
        header("refresh:0;url=M31_data_user.php");
    }

    mysqli_close($connect);
?>