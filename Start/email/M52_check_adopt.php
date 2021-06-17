<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

header("Content-Type: text/html; charset=utf8");
include('../connect.php');
mysqli_query($connect,"SET NAMES 'UTF8'");

$R_ID = $_POST['R_ID'];
$R_Audit = $_POST['R_Audit'];

$sql = "SELECT * FROM `requisition` Where `r_id`='$R_ID';";
$result = mysqli_query($connect,$sql);
$text = mysqli_fetch_row($result);
$R_ID = $text[0];
$U_ID = $text[1];
$A_ID = $text[2];

$sql = "SELECT * FROM `user` Where `id`='$U_ID';";
$result = mysqli_query($connect,$sql);
$text = mysqli_fetch_row($result);
$email = $text[2];

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
    $mail->Body    = 'Your requsition ID: '.$R_ID.'<br>animal ID: '.$A_ID.'<br>result is:' . $R_Audit;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
echo "<script>alert('審核郵件已寄出!');</script>";
header("refresh:0;url=https://b10856055.ddns.net/Start/Sign_in/Manager/M51_list_adopt.php");
?>