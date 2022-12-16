<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
	<meta charset="UTF-8">
	<style>
		input[type=text], input[type=email], input[type=password], select {
			padding: 6px 8px;
			margin: 15px 20px 0 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			width: 100%;
		}

		input[type=submit], button {
			background-color: #abac87;
			color: white;
			padding: 7px 20px;
			margin: 10px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input:enabled[type=submit]:hover {
			background-color: rgb(25 24 24 / 16%)
		}

		ul.navbar {
			box-shadow: 0 2px 10px 0 rgb(0 0 0 / 15%);
			list-style-type: none;
			margin: 0;
			padding: 0;
			background-color: #fff;
			display: block;
			text-align: center;
			position: -webkit-sticky; /* Safari */
			position: sticky;
			top: 0;
		}

		li.nav_right {
			float: right;
		}

		body {
			margin: 0;
			font-family: "Google Sans Display", Roboto, Arial, sans-serif;
			display: flex;
			flex-direction: column;
		}

		li span {
			display: block;
			color: rgb(95, 99, 104);
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
			font-size: 16px;
			float: left;
		}

		li span:hover {
			color: #1967d2;
		}

		ul li div.showme {
			display: none;
		}

		.showme {
			position: absolute;
			background-color: #ffffff;
			margin-top: 46px;
			width: 110px;
			padding: 6px;
			border-radius: 0 0 5px 5px;
			box-shadow: 2px 5px 10px 0 rgb(0 0 0 / 15%);
		}

		.showhim:hover .showme {
			display: flex;
		}

		.button_div {
			width: 80%;
			margin: 5px 10px 0;
		}
	</style>
</head>

<body>
<ul class="navbar">
	<li><a href="<?php echo site_url('Home'); ?>"><span>Home</span></a></li>
	<li><a href="<?php echo site_url('GetPoster/index/Europe'); ?>"><span>Europe</span></a></li>
	<li><a href="<?php echo site_url('GetPoster/index/Asia'); ?>"><span>Asia</span></a></li>
	<li><a href="<?php echo site_url('GetPoster/index/America'); ?>"><span>America</span></a></li>
	<li><a href="<?php echo site_url('GetPoster/index/Africa'); ?>"><span>Africa</span></a></li>
	<li><a href="<?php echo site_url('GetPoster/index/Oceania'); ?>"><span>Oceania</span></a></li>
	<li class="nav_right"><a href="<?php echo site_url('MyKart'); ?>"><span>My kart</span></a></li>
	<?php if (!$_SESSION['login']) { ?>
		<li class="showhim nav_right"><span>My account</span>
			<div class="showme">
				<div>
					<form method="post" action="<?php echo site_url('Navbar/login'); ?>">
						<div>
							<input type="email" id="email_login" name="email_login" placeholder="Email" required><br>
							<input type="password" id="password_login" name="password_login" placeholder="Password"
								   required><br>
						</div>
						<div class="button_div">
							<input type="submit" style="width: 100%" value="Submit">
							<div style="color:red">
								<?php
								if (!$_SESSION['password']) {
									echo "Wrong email or password";
								}
								?>
							</div>
							<a href="<?php echo site_url('MyAccount'); ?>" style="font-size: small">No account ?</a>
						</div>
					</form>
				</div>
			</div>
		</li>
	<?php } else { ?>
		<li class="showhim nav_right"><span><?php echo $_SESSION['login']; ?></span>
			<div class="showme">
				<div>
					<form method="post" action="<?php echo site_url('Navbar/disconnect_user'); ?>">
						<div class="button_div" style="margin: 2px">
							<input type="submit" name="disconnect" value="Disconnect">
						</div>
					</form>
				</div>
			</div>
		</li>
	<?php } ?>
</ul>
</body>
</html>
