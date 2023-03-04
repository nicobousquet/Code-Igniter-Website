<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
	<meta charset="UTF-8">
	<title>My account</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/myaccount.css");?>">

</head>

<body>
<!-- This file allows the user to create a new account -->

<!-- The form is used to collect user information and create a new account -->
<script>
	<!-- The JavaScript function match_password() is called when the user types in the password or confirm password fields -->
	let match_password = function () {
		if (document.getElementById('password').value === document.getElementById('confirm').value) {
			// Check if the password and confirm password fields match
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'matching';
			document.getElementById('submit').disabled = false;
		} else {
			// If the fields do not match, display a message and disable the submit button
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'not matching';
			document.getElementById('submit').disabled = true;
		}
	}
</script>
<!-- The form fields collect the user's first and last name, email, and password -->
<div class="form_box">
	<form method="post" class="font form" action="<?php echo site_url('MyAccount/add_new_user'); ?>">
		<div class="title">
			Create your account
		</div>
		<div class="line">
			<input type="text" id="fname" name="fname" placeholder="First name" pattern="[A-Za-z]+" required><br>
			<input type="text" id="lname" name="lname" placeholder="Last name" pattern="[A-Za-z]+" required><br>
		</div>
		<div class="line">
			<input type="email" id="email" name="email" placeholder="Email address"
				   pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required><br><br>
		</div>
		<div class="line">
			<input type="password" id="password" name="password" placeholder="Password" onkeyup='match_password();'
				   pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8, 16}" required><br>
			<input type="password" id="confirm" name="confirm" placeholder="Confirm password"
				   onkeyup='match_password();' pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8, 16}" required><br>
			<!-- The message span displays a message indicating whether the password and confirm password fields match -->
			<span id='message'></span>
		</div>
		<div style="display: flex; flex-direction: column; color: red">
			<!-- The submit button is disabled if the password and confirm password fields do not match -->
			<input id="submit" type="submit" value="Submit">
			<!-- If the email is already being used by another user, display an error message -->
			<?php if (isset($email_used) && $email_used) {
				echo "Email used by another user";
			} ?>
		</div>
	</form>
</div>
</body>

</html>
