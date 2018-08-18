<?php
	session_start();
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/class.smtp.php';
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/class.phpmailer.php';
require '/var/www/html/formlogin/phpmailer/libphp-phpmailer/PHPMailerAutoload.php';

if(isset($_POST['submit'])){

include_once 'db.php';
$username = mysqli_real_escape_string($connection,$_POST['uid']);
$password = mysqli_real_escape_string($connection,$_POST['pwd']);

	if(empty($username) || empty($password)){

		header("Location: headererror.php");
		exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_uid = '$username'";
		$result = mysqli_query($connection, $sql);
		$rowsNumbers = mysqli_num_rows($result);

		if($rowsNumbers < 1){

			header("Location: usrpwdempty.php");
			exit();
		}else{
			if($row = mysqli_fetch_assoc($result)){
					
					/********$hashedpwd = password_verify($password, $row['user_pwd']);
					if($hashedpwd == false){
echo "hashed pwd don't match";
						//header("Location: header.php");
						exit();
						}elseif($hashedpwd == true){
echo "hashed pwd match!";*/
						if(($password != $row['user_pwd'])){
								header("Location: usrpwdempty.php");
								exit();
							}elseif($password == $row['user_pwd']){
							$_SESSION['userid'] = $row['user_id'];
							$_SESSION['firstname'] = $row['user_first'];
							$_SESSION['lastname'] = $row['user_last'];;
							$_SESSION['email'] = $row['user_email'];
							$_SESSION['username'] = $row['user_uid'];

							header("Location:../finlandnepal/NepalAssignment/NepalWebsiteTemp/NepalWebsiteTemp.html");
						//}
				}
		}
	}
}
}else{
		header("Location: header.php");	
}
















?>