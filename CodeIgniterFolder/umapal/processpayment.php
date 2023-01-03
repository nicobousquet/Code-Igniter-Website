<!DOCTYPE html>
<html>
<head>
	<style>
		body {
			width: 90%;
			margin: 0 auto;
			font-family: Arial, Helvetica, sans-serif;
			border: solid 1px;
		}

		header {
			text-align: center;
			text-decoration: bold;
			color: blue;
		}
	</style>
</head>
<!-- This is a PHP file that handles the acceptance or refusal of a payment by the user -->
<body>
<div>
	<!-- UMAPAL is the name of the website -->
	<header><h1>UMAPAL</h1></header>
	<div class="parametros">
		<!-- This section displays the information received from the payment service -->
		<h3>Received information:</h3>
		<ul>
			<?php
			// Unserialize and decode the user's cart from base64 encoding
			$user_cart = unserialize(base64_decode($_POST['user_cart']));
			// Remove the user's cart from the POST data
			unset($_POST['user_cart']);
			// Print the user's cart
			print("<li> User cart:");
			print_r($user_cart);
			// Iterate through the remaining POST data and print it
			foreach ($_POST as $key => $value) {
				print "<li>" . $key . ":" . htmlspecialchars($value) . "</li>";
			}
			?>
		</ul>
	</div>
	<div class="redireccion">
		<!-- This section provides the user with the option to accept or refuse the payment -->
		<h3>Operation:</h3>
		<h4>Accept payment:</h4>
		<!-- This form submits the acceptance of the payment to the specified return URL -->
		<form name="umapal_return" action="<?php echo $_POST["return"]; ?>" method="post">
			<!-- Include the cart ID in the POST data -->
			<input type="hidden" name="cartID" value="<?php echo $_POST["cartID"]; ?>">
			<!-- Include the serialized and base64-encoded user cart in the POST data -->
			<input type="hidden" name="user_cart" value="<?php echo base64_encode(serialize($user_cart)); ?>">
			<!-- Submit the form -->
			<input type="submit" value="Accept payment"/>
		</form>
		<h4>Refuse payment:</h4>
		<!-- This form allows the user to cancel the payment and redirects them to the cancel_return URL specified in
		the POST request -->
		<form name="umapal_cancelreturn" action="<?php echo $_POST["cancel_return"]; ?>" method="post">
			<!-- Hidden input field that contains the cartID -->
			<input type="hidden" name="cartID" value="<?php echo $_POST["cartID"]; ?>">
			<!-- Submit button to cancel the payment -->
			<input type="submit" value="Cancel payment"/>
		</form>
	</div>
</div>
</body>

</html>
