<?php
include('smtp/PHPMailerAutoload.php');
//$html='Msg';
//echo smtp_mailer('project1.check@gmail.com','subject',$html);
function smtp_mailer($email,$otp,$pwd){ //$to,$subject, $msg
	$mail = new PHPMailer(); 
	// $mail->SMTPDebug  = 3;
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "project1.check@gmail.com";
	$mail->Password = "12project@90";
	$mail->SetFrom("project1.check@gmail.com");
	$mail->Subject = "Verification Code";
    $msg="Your one time password is : ".$otp."<br> It is only valid for 10 minutes.<br>Your B-pay password is : ".$pwd;
	$mail->Body =$msg;
	$mail->AddAddress($email);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
    $result=$mail->Send();
    if(!$result){
        echo "Mailer error: ".$mail->ErrorInfo;
    }else{
        return $result;
    }
	// if(!$mail->Send()){
	// 	echo $mail->ErrorInfo;
	// }else{
	// 	return 'Sent';
	// }
}
?>