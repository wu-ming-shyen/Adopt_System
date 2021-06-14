<?php
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $U_ID = $_POST['U_ID'];
    $U_Area = $_POST['U_Area'];
    $U_Have = $_POST['U_Have'];
    $U_Salary = $_POST['U_Salary'];
    $U_Address = $_POST['U_Address'];
    $sql = "INSERT INTO `requisition` (`r_id`, `u_id`, `date`, `squaremeters`, `havinganimals`, `salary`, `address`, `audit`) VALUES (NULL, '$U_ID', 'current_timestamp()', '$U_Area', '$U_Have', '$U_Salary', '$U_Address', '');";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "script>alert('ERROR');</script>";
        //header("refresh:0;url=U13_adopt_animal.php");
    }else{
        echo "<script>alert('申請成功');</script>";
        //header("refresh:0;url=U13_adopt_animal.php");
    }

    mysqli_close($connect);
?>