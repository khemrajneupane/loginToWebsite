
<?php
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/class.smtp.php';
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/class.phpmailer.php';
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/PHPMailerAutoload.php';
	if(isset($_POST['submit'])){
include_once 'db.php';
$fname = mysqli_real_escape_string($connection,$_POST['fname']);
$lname = mysqli_real_escape_string($connection,$_POST['lname']);
$email = mysqli_real_escape_string($connection,$_POST['email']);
$username = mysqli_real_escape_string($connection,$_POST['username']);
$password = mysqli_real_escape_string($connection,$_POST['password']);
//$password = ($_POST['password']);
//$password = md5(stripcslashes($password));

	if(empty($fname) || empty($lname) || empty($email) || empty($username) || empty($password)){
		
		header("Location: fieldsempty.php");
		exit();
	}else{
		//first name last name validity check
		if(!preg_match("/^[a-zA-Z]*$/",$fname) || !preg_match("/^[a-zA-Z]*$/",$lname)){

		header("Location: nameserror.php");
		exit();

		}else{
		//email validity check
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

				header("Location: emailerror.php");
				exit();
			}else{
				// check if the userid is already taken or listed in the formlogin database...
					$sql = "SELECT * FROM users WHERE user_uid = '$username'";
					$sql1 = "SELECT * FROM users WHERE user_email = '$email'";
					$result = mysqli_query($connection, $sql);
					$result1 = mysqli_query($connection, $sql1);
					$usrnamerows = mysqli_num_rows($result);
					$emailrow = mysqli_num_rows($result1);

					if($usrnamerows > 0){

						header("Location:datataken.php");
						exit();
						}
					if($emailrow > 0){
						header("Location:emailtaken.php");
						exit();
							}else{
						//if username is free or not taken yet then let's hash the password.

								//$hashpwd = password_hash($password, PASSWORD_DEFAULT);
						//if everything is fine, let's insert form data into the database.
							$insert_value = "INSERT INTO users (`user_first`, `user_last`, `user_email`, `user_uid`, `user_pwd`) VALUES ('$fname','$lname','$email','$username','$password')";
							mysqli_query($connection, $insert_value);
$sql = "SELECT * FROM users WHERE user_uid = '$username'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
$mail = new PHPMailer;
$mail->setFrom($row['user_email']);//if not used, it sends from root user.
$mail->addAddress($row['user_email']);
$mail->Subject = "Thank you.";
$mail->isHTML(true);
$mail->Body = "Thank you "."<b>".ucfirst($row['user_first'])." ".ucfirst($row['user_last']).", </b>"." for joining our team! This is an automated message, please don't reply to it.";
$mail->AltBody = "";
$mail->IsSMTP();
$mail->SMTPSecure = 'tls';
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Port = 587;
$mail->Username = 'ghanashyam.neupane01@gmail.com';
$mail->Password = 'aambote1';
$mail->send();
 

							header('Location:emailsent.php');
							exit();
						}
					
			
				}
		}
	}




}else{
	header("Location: signup.php");
	exit();
}
?>
