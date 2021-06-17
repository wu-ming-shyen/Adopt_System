<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include('..\connect.php');
mysqli_query($connect,"SET NAMES 'UTF8'");
header("content-type:text/html;charset=utf-8");
$email = $_POST['Email'];
$sql = "SELECT * FROM `user` WHERE `email` LIKE '$email'";
$result=mysqli_query($connect,$sql);
if(mysqli_num_rows($result)>0){
    $text = mysqli_fetch_row($result);
    $Password = $text[3];
}

$sql2 = "SELECT * FROM `manager` WHERE `email` LIKE '$email'";
$result2=mysqli_query($connect,$sql2);
if(mysqli_num_rows($result2)>0){
    $text = mysqli_fetch_row($result2);
    $Password = $text[3];
}

$sql3 = "SELECT * FROM `shelter` WHERE `email` LIKE '$email'";
$result3=mysqli_query($connect,$sql3);
if(mysqli_num_rows($result3)>0){
    $text = mysqli_fetch_row($result3);
    $Password = $text[3];
}

if($Password){
    require 'vendor/autoload.php';
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'michell891012@gmail.com';                     //SMTP username
        $mail->Password   = 'eomzqrovzkjnhhnb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('michell891012@gmail.com', 'Shyen');
        $mail->addAddress($email);
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'NPUST animal shelter system';
        $mail->Body    = 'Your Password is:' . $Password;
    
        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
    echo "<script>alert('請至信箱收取密碼');</script>";
    header("refresh:0;url=https://b10856055.ddns.net/Start/Sign_in/I21_sign_in.html");
}
else{
    echo "<script>alert('查無此帳號');</script>";
    header("refresh:0;url=https://b10856055.ddns.net/Start/Sign_in/I21_sign_in.html");
}

?>