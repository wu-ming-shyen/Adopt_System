<?php
    $email = $_POST['email'];
    $S_Name = $_POST['S_Name'];
    $S_Password = $_POST['S_Password'];
    $S_Phone = $_POST['S_Phone'];
    $S_Address = $_POST['S_Address'];

    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");

    $sql = "UPDATE `shelter` SET `name` = '$S_Name', `password` = '$S_Password', `phone` = '$S_Phone', `address` = '$S_Address' WHERE `shelter`.`email` = '$email';";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "<script>alert('ERROR');</script>";
        header("refresh:0;url=S21_data_shelter.php");
    }else{
        echo "<script>alert('修改成功');</script>";
        header("refresh:0;url=S21_data_shelter.php");
    }

    mysqli_close($connect);
?>