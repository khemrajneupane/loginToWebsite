<?php
	
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/class.smtp.php';
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/class.phpmailer.php';
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submit'])){

include_once 'db.php';
$email = mysqli_real_escape_string($connection,$_POST['email']);


	if(empty($email)){

		header("Location: resetemailerror.php");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_email = '$email'";
		$result = mysqli_query($connection, $sql);
		$rowsNumbers = mysqli_num_rows($result);

		if($rowsNumbers < 1){

			header("Location: resetemailerror.php");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){

						if(($email != $row['user_email'])){
								header("Location: resetemailerror.php");
								exit();
							}elseif($email == $row['user_email']){


							$first = $row['user_first'];
							$last = $row['user_last'];;
							$email = $row['user_email'];
							$password = $row['user_pwd'];
							$userid = $row['user_uid'];
//sending thank you for joining us message...
$mail = new PHPMailer;
$mail->setFrom($row['user_email']);//if not used, it sends from root user.
$mail->addAddress($row['user_email']);
$mail->Subject = "Thank you.";
$mail->isHTML(true);
$mail->Body = "Dear "."<b>".ucfirst($first)." ".ucfirst($last).", </b>"." as you requested for your username and password, your username is: ".$userid." and your password is: ".$password;
$mail->AltBody = "";
$mail->IsSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = 'ghanashyam.neupane01@gmail.com';
$mail->Password = 'aambote1';
if(!$mail->send()) {
  echo 'Email is not sent.';
  echo 'Email error: ' . $mail->ErrorInfo;
} else {
  echo 'Email has been sent.';
}
//
							header("Location:afterreset.php");
						//}
				}
		}
	}
}
}else{
		header("Location: reset.php");	
}
















?>