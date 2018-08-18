<!DOCTYPE html>
<html>
<head>
	<title>Contact form</title>
		<link type = "text/css" rel = "stylesheet" href = "/formlogin/login.css">
</head>
<body>

	<section>
	<div class = "main-rapper">
		<h2>Contact Form</h2>
		
		<form class = "signup" action = "phpmailer.php" method = "POST">
			<input type = "text" name = "name" placeholder = "your name">
			<input type = "email" name = "email" placeholder = "your email">
			<input type = "text" name = "subject" placeholder = "subject">
			<textarea rows = "4" cols = "20" name = "txtarea"placeholder = "your message..."></textarea><br />
			<button type  = "submit" name = "submit">Send</button>
		</form>
	</div>
</section>
</body>
</html>
