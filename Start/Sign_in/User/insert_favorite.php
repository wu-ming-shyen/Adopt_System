<?php
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $U_id = $_POST['u_id'];
    $A_id = $_POST['a_id'];
    $sql = "INSERT INTO `favorite` (`u_id`, `a_id`) VALUES ('$U_id', '$A_id');";
    $result = mysqli_query($connect,$sql);

    if(!$result){
        echo "script>alert('ERROR');</script>";
        header("refresh:0;url=U11_search_animal?animal=請選擇&shelter=請選擇.php");
    }else{
        echo "<script>alert('加入成功');</script>";
        header("refresh:0;url=U11_search_animal?animal=請選擇&shelter=請選擇.php");
    }
    mysqli_close($connect);
?>