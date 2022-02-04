<?php
use PHPMailer\PHPMailer\PHPMailer;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

$mail = new PHPMailer(true);

$alert = '';

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $cno=$_POST["number"];
  $msg = $_POST['msg'];

  try{
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'project1.check@gmail.com'; //bpay1009@gmail.com
    $mail->Password = '12project@90'; //Basilpay1009#
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = '587';

    $mail->setFrom('project1.check@gmail.com'); //bpay1009@gmail.com
    $mail->addAddress('project1.check@gmail.com'); //bpay mail to recieve mails youremail@gmail.com

    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body = "<h3>Name : $name <br>Email: $email  <br>Contact Number: $cno <br>Message : $msg </h3>";

    $mail->send();
    $alert = '<script>alert("Message Sent! Thank you for contacting us.");</script>';
  } catch (Exception $e){
    $alert = '<script>alert(".$e->getMessage().");</script>';
  }
}
?>
      