<html>
<head>
	<title>Connecting to UMAPal</title>
</head>
<body onload="document.umapal.submit()">
<!-- <body onload="document.forms['member_signup'].submit()"> -->

<h3>Connecting to UMAPal...</h3>

<!-- Ver https://developer.paypal.com/api/nvp-soap/paypal-payments-standard/integration-guide/formbasics/ -->
<form name="umapal" action="<?php echo base_url() . 'umapal/processpayment.php' ?>" method="post">
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="<?php echo $user_cart[0]->email_user ?>">
	<!-- Indicamos que la direccion viene dada por la web -->
	<input type="hidden" name="user_cart" value="<?php echo base64_encode(serialize($user_cart)) ?>">
	<input type="hidden" name="address_override" value="1">
	<input type="hidden" name="first_name" value="Juan">
	<input type="hidden" name="last_name" value="Nadie">
	<input type="hidden" name="address1" value="<?php echo $_POST['address']; ?>">
	<input type="hidden" name="city" value="<?php echo $_POST['city']; ?>">
	<input type="hidden" name="zip" value="<?php echo $_POST['postal_code']; ?>">
	<input type="hidden" name="country" value="<?php echo $_POST['country']; ?>">
	<input type="hidden" name="return" value="<?php echo site_url('PaymentSuccess')?>">
	<input type="hidden" name="cancel_return" value="<?php echo site_url('PaymentCancel') ?>">
	<!-- Este valor no existe en paypal, pero nos ayudara a la hora de simular peticiones unicas -->
	<input type="hidden" name="cartID" value="<?php echo $actual_request; ?>">
	<input type="submit" value="Send to UMAPal"/>
</form>

</body>
</html>
