<html>
<head>
	<title>Connecting to UMAPal</title>
</head>
<!-- This file processes a payment through UMAPal -->

<!-- The form is submitted via the body's onload event -->
<body onload="document.umapal.submit()">

<!-- The form is submitted to the processpayment.php file on the server -->
<form name="umapal" action="<?php echo base_url() . 'umapal/processpayment.php' ?>" method="post">

	<!-- Hidden form fields contain information about the payment and the user -->
	<input type="hidden" name="cmd" value="_xclick">
	<input type="hidden" name="business" value="<?php echo $user_cart[0]->email_user ?>">
	<input type="hidden" name="user_cart" value="<?php echo base64_encode(serialize($user_cart)) ?>">
	<input type="hidden" name="address_override" value="1">
	<input type="hidden" name="first_name" value="<?php echo $_POST['fname']; ?>">
	<input type="hidden" name="last_name" value="<?php echo $_POST['lname']; ?>">
	<input type="hidden" name="address1" value="<?php echo $_POST['address']; ?>">
	<input type="hidden" name="city" value="<?php echo $_POST['city']; ?>">
	<input type="hidden" name="zip" value="<?php echo $_POST['postal_code']; ?>">
	<input type="hidden" name="country" value="<?php echo $_POST['country']; ?>">
	<input type="hidden" name="return" value="<?php echo site_url('PaymentSuccess')?>">
	<input type="hidden" name="cancel_return" value="<?php echo site_url('PaymentCancel') ?>">
	<input type="hidden" name="cartID" value="<?php echo $actual_request; ?>">

	<!-- Submit button to send the form to UMAPal -->
	<input type="submit" value="Send to UMAPal"/>
</form>

</body>

</html>
