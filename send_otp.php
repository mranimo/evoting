<?php

session_start();

$con=mysqli_connect('sql108.liveblog365.com','lblog_31659286','hyder1234','lblog_31659286_1');

$email=$_POST['email'];

$res=mysqli_query($con,"select * from sampledb where email='$email'");

$count=mysqli_num_rows($res);

if($count>0){

	$otp=rand(100000,999999);

	mysqli_query($con,"update sampledb set otp='$otp' where email='$email'");

	$html="Your otp verification code is ".$otp;

	$_SESSION['EMAIL']=$email;

	smtp_mailer($email,'OTP Verification',$html);

	echo "yes";

}else{

	echo "not_exist";

}



function smtp_mailer($to,$subject,$msg){

	require_once("smtp/class.phpmailer.php");

	$mail = new PHPMailer(); 

	$mail->IsSMTP(); 

	$mail->SMTPDebug = 0; 

	$mail->SMTPAuth = true; 

	$mail->SMTPSecure = 'tls'; 

	$mail->Host = "smtp.gmail.com";

	$mail->Port = 587; 

	$mail->IsHTML(true);

	$mail->CharSet = 'UTF-8';

	$mail->Username = "ggsprt10@gmail.com";

	$mail->Password = "hyder123";

	$mail->SetFrom("onlinevotinggec@gmail.com");

	$mail->Subject = $subject;

	$mail->Body =$msg;

	$mail->AddAddress($to);

	if(!$mail->Send()){

		return 0;

	}else{

		return 1;

	}

}

?>