<?php

session_start();

$con=mysqli_connect('sql108.liveblog365.com','lblog_31659286','hyder1234','lblog_31659286_1');

$otp=$_POST['otp'];

$email=$_SESSION['EMAIL'];

$res=mysqli_query($con,"select * from sampledb where email='$email' and otp='$otp'");

$count=mysqli_num_rows($res);

if($count>0){

	mysqli_query($con,"update sampledb set otp='' where email='$email'");

	$_SESSION['IS_LOGIN']=$email;

	echo "yes";

}else{

	echo "not_exist";

}

?>