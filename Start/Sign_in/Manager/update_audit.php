<?php
header("Content-Type: text/html; charset=utf8");
include('../../connect.php');
mysqli_query($connect,"SET NAMES 'UTF8'");

$R_ID = $_POST['R_ID'];
$R_Audit = $_POST['R_Audit'];
$sql = "UPDATE `requisition` SET `audit` = '$R_Audit' WHERE `requisition`.`r_id` = '$R_ID';";
$result = mysqli_query($connect,$sql);
echo "
<form action='http://localhost/Start/email/M52_check_adopt.php' method='POST' id='myForm'>
    <input type='hidden' value='$R_ID' name='R_ID'>
    <h1>郵件寄送中，請稍候...</h1>
    <input type='hidden' value='$R_Audit' name='R_Audit'>
</form>
";
echo "
<script>
    document.getElementById('myForm').submit();
</script>
";
?>
