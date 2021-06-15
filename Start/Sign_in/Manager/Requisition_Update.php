<?php
    header("Content-Type: text/html; charset=utf8");
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    
    $R_ID = $_POST['R_ID'];
    $R_Audit = $_POST['R_Audit'];
    echo "$R_Audit";
    $sql = "UPDATE `requisition` SET `audit` = '$R_Audit' WHERE `requisition`.`r_id` = '$R_ID';";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "<script>alert('ERROR');</script>";
        header("refresh:0;url=M51_list_adopt.php");
    }else{
        echo "<script>alert('修改成功');</script>";
        header("refresh:0;url=M51_list_adopt.php");
    }
?>