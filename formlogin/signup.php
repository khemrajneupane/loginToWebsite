<?php
	include_once 'header.php';
	
?>
<section>
	<div class = "main-rapper">
			<h2>Sign up here</h2>

		<form class = "signup" action = "signup.includes.php" method = "POST">
			<input type = "text" name = "fname" placeholder = "enter first name in letters">
			<input type = "text" name = "lname" placeholder = "enter last name in letters">
			<input type = "email" name = "email" placeholder = "enter email">
			<input type = "text" name = "username" placeholder = "enter username">
			<input type = "password" name = "password" placeholder = "enter password"><br>
		  <button class = "btn" type  = "submit" name = "submit">signup</button>
	</form>
</div>
</section>
<?php
	include_once 'footer.php';
?>

