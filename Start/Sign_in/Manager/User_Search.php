<?php
    header("Content-Type: text/html; charset=utf8");
    include('../../connect.php');
    mysqli_query($connect,"SET NAMES 'UTF8'");
    $email = $_POST['email'];
    $sql = "SELECT * FROM `user` WHERE `email` = '$email'";
    $result = mysqli_query($connect,$sql);
    if(mysqli_num_rows($result)>0){
        for($i=1; $i <= mysqli_num_rows($result);$i++){
            $text = mysqli_fetch_row($result);
            $U_Name = $text[1];
            $U_Email = $text[2];
            $U_Password = $text[3];
            $U_Sex = $text[4];
            $U_ID_Number = $text[5];
            $U_Phone = $text[6];
            $U_Address = $text[7];
            $U_Birthday = $text[8];
        }
        if(!$U_Email){
            echo "<script>alert('ERROR');</script>";
            header("refresh:0;url=M31_data_user.php");
        }else{
            echo "
            <body>
            <div style='margin-top:-500px'>
            <form action='M31_data_user.php' method='post' id='UserData'>
                <input name='U_Name' type='hidden' value='$U_Name'>
                <input name='U_Email' type='hidden' value='$U_Email'>
                <input name='U_Password' type='hidden' value='$U_Password'>
                <input type='submit'>
            </form>
            </div>
            </body>
            ";
            echo "
            <script type='text/javascript'>
                document.getElementById('UserData').submit(); // SUBMIT FORM
            </script>
            ";
        }
    }
    else{
        echo "<script>alert('查無資料');</script>";
        header("refresh:0;url=M31_data_user.php");
    }
?>
