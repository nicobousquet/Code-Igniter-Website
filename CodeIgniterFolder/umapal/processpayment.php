<!DOCTYPE hmtl>
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
<body>
<div>
	<header><h1>UMAPAL</h1></header>
	<div class="parametros">
		<h3>Received information:</h3>
		<ul>
			<?php
			$user_cart = unserialize(base64_decode($_POST['user_cart']));
			unset($_POST['user_cart']);
			print("<li> User cart:");
			print_r($user_cart);
			foreach($_POST as $key => $value)
			{
				print "<li>" . $key . ":" . htmlspecialchars($value) . "</li>";
			}
			?>
		</ul>
	</div>
	<div class="redireccion">
		<h3>Operation:</h3>
		<h4>Accept payment:</h4>
		<form name="umapal_return" action="<?php echo $_POST["return"]; ?>" method="post">
			<input type="hidden" name="cartID" value="<?php echo $_POST["cartID"]; ?>">
			<input type="hidden" name="user_cart" value="<?php echo base64_encode(serialize($user_cart)); ?>">
			<input type="submit" value="Accept payment" />
		</form>
		<h4>Refuse payment:</h4>
		<form name="umapal_cancelreturn" action="<?php echo $_POST["cancel_return"]; ?>" method="post">
			<input type="hidden" name="cartID" value="<?php echo $_POST["cartID"]; ?>">

			<input type="submit" value="Cancel payment" />
		</form>
	</div>
</div>
</body>

</html>
