<?php
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $U_id = $_POST['U_ID'];
    $A_id = $_POST['A_ID'];
    $sql = "DELETE FROM `favorite` WHERE `favorite`.`u_id` = $U_id AND `favorite`.`a_id` = $A_id";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "<script>alert('ERROR');</script>";
        header("refresh:0;url=U31_favorite_user.php");
    }else{
        echo "<script>alert('刪除成功');</script>";
        header("refresh:0;url=U31_favorite_user.php");
    }
    mysqli_close($connect);
?>