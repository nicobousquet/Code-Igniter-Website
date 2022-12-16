<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" , lang="en">
<head>
	<meta charset="UTF-8">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<style>
		input[type=text], input[type=email], input[type=password], select {
			padding: 6px 8px;
			margin: 15px 10px 0 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			width: 100%;
		}

		#submit {
			background-color: #abac87;
			color: white;
			padding: 14px 20px;
			margin: 50px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input:enabled[type=submit]:hover {
			background-color: rgb(25 24 24 / 16%)
		}

		.font {
			font-family: "Google Sans", Roboto, Arial, sans-serif;
			font-weight: 600;
			color: #b0b0b4;
		}

		.form {
			text-align: center;
			margin: 50px;
		}

		.title {
			height: 100px;
			width: 100%;
			font-size: 32px;
			margin-top: 75px;
		}

		.line {
			display: flex;
			flex-direction: row;
			justify-content: center;
		}

		.form_box {
			background-color: #f8f8f8;
			align-self: center;
			width: 500px;
			border-radius: 0 0 10px 10px;
			height: 100vh;
			margin: 0;
			position: absolute;
			top: 50%;
			-ms-transform: translateY(-50%);
			transform: translateY(-50%);;
			z-index: -1;
		}

		#message {
			font-size: small;
			margin-top: 20px;
			font-weight: normal;
		}

		/*
				div {
					border-radius: 5px;
					background-color: #f2f2f2;
					padding: 20px;
				}
		 */
	</style>
</head>

<body>
<script>
	var match_password = function () {
		if (document.getElementById('password').value == document.getElementById('confirm').value) {
			document.getElementById('message').style.color = 'green';
			document.getElementById('message').innerHTML = 'matching';
			document.getElementById('submit').disabled = false;
		} else {
			document.getElementById('message').style.color = 'red';
			document.getElementById('message').innerHTML = 'not matching';
			document.getElementById('submit').disabled = true;
		}
	}
</script>

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
			<span id='message'></span>
		</div>
		<div style="display: flex; flex-direction: column; color: red">
			<input id="submit" type="submit" value="Submit">
			<?php if (isset($email_used) && $email_used) {
				echo "Email used by another user";
			} ?>
		</div>
	</form>
</div>
</body>

</html>
