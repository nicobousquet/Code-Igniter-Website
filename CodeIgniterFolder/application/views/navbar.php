<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="<?= base_url("favicon.ico") ?>" type="image/gif">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url("css/navbar.css");?>">
</head>

<body>

<!-- The navigation bar at the top of the page -->
<div class="navbar">
	<!-- Home page -->
	<a class="navbar_button" href="<?= site_url('Home'); ?>">Home</a>

	<!-- Pages for each continent -->
	<a class="navbar_button" href="<?= site_url('GetPoster/index/Europe'); ?>">Europe</a>
	<a class="navbar_button" href="<?= site_url('GetPoster/index/Asia'); ?>">Asia</a>
	<a class="navbar_button" href="<?= site_url('GetPoster/index/America'); ?>">America</a>
	<a class="navbar_button" href="<?= site_url('GetPoster/index/Africa'); ?>">Africa</a>
	<a class="navbar_button" href="<?= site_url('GetPoster/index/Oceania'); ?>">Oceania</a>

	<!-- Link to the user's cart -->
	<a class="navbar_button" href="<?= site_url('MyCart'); ?>">My cart</a>

	<!-- If the user is not logged in, show a login form -->
	<?php if (!$_SESSION['login']) { ?>
		<div class="navbar_button showhim nav_right">
			My account
			<!-- Form to login -->
			<form class="showme" method="post" action="<?= site_url('Navbar/login'); ?>">
				<!-- Inputs for email and password -->
				<input type="email" id="email_login" name="email_login" placeholder="Email" required><br>
				<input type="password" id="password_login" name="password_login" placeholder="Password" required><br>
				<input type="submit" style="width: 100%" value="Submit">
				<div style="color:red">
					<?php
					if (!$_SESSION['password']) {
						echo "Wrong email or password";
					}
					?>
					<!-- This link allows the user to create an account if they don't already have one -->
					<a href="<?= site_url('MyAccount'); ?>" style="font-size: small">No account ?</a>
				</div>
			</form>
		</div>
	<?php } else { ?>
		<!-- If the user is logged in, their account menu is displayed with options to view their orders and log out -->
		<div class="navbar_button showhim nav_right"><?= $_SESSION['login']; ?>
			<div class="showme">
				<!-- Display "My orders" button -->
				<a href="<?= site_url("MyOrders"); ?>">
					<button>My orders</button>
				</a>
				<!-- Display "Log out" button -->
				<a href="<?= site_url("Navbar/disconnect_user"); ?>">
					<button>Log out</button>
				</a>
			</div>
		</div>
	<?php } ?>
</div>
</body>
</html>
